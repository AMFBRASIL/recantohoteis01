<?php

namespace Modules\Pos\Admin;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Pos\Models\AuthorizationPassword;
use Modules\Pos\Models\AuthorizationPasswordTranslation;
use Modules\Situation\Models\Situation;

class AuthorizationPasswordController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/pos');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('consumptionCard_view');

        $modelList = new AuthorizationPassword();

        $modelList = $modelList::query();

        if ($search = $request->input('s')) {
            $modelList->whereHas('situation', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }

        $modelList = $modelList->orderby('situation_id', 'asc');

        $model = new AuthorizationPassword();
        $expiration = new DateTime(' +30 days');
        $model->expiration_date = $expiration;

        $data = [
            'rows' => $modelList->paginate(20),
            'row' => $model,
            'breadcrumbs' => [
                [
                    'name' => __('Pos'),
                    'url' => 'admin/module/pos'
                ],
            ],
            'translation' => new AuthorizationPasswordTranslation(),
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%SENHAS%');
            })->get()
        ];

        return view('Pos::admin.authorizationPassword.index', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('authorizationPasswords_update');
            $row = AuthorizationPassword::query()->find($id);
            if (empty($row)) {
                return redirect(route('pos.admin.authorization.password.index'));
            }
        } else {
            $this->checkPermission('authorizationPasswords_create');
            $row = new AuthorizationPassword();
            $row->expiration_date = new DateTime(' +30 days');
            $row->status = "publish";;
        }

        $row->fill($request->input());
        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if ($id > 0) {
                return back()->with('success', __('Authorization Password Updated'));
            } else {
                return redirect(route('pos.admin.authorization.password.index'))->with('success', __('Authorization Password Created'));
            }
        }
    }

    public function bulkEdit(Request $request)
    {

        $this->checkPermission('authorizationPasswords_update');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $this->checkPermission('authorizationPasswords_delete');
                $query = AuthorizationPassword::query()->where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        } else if ($action == "clone") {
            $this->checkPermission('authorizationPasswords_create');
            foreach ($ids as $id) {
                (new AuthorizationPassword)->saveCloneByID($id);
            }
        } else {
            foreach ($ids as $id) {
                $query = AuthorizationPassword::query()->where("id", $id);
                if (!$this->hasPermission('authorizationPasswords_manage_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('authorizationPasswords_update');
                }
                $query->update(['status' => $action]);
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }

    public function expiration(Request $request)
    {
        $this->checkPermission('authorizationPasswords_update');

        $row = AuthorizationPassword::query()->find($request->id);
        $row->situation_id = AuthorizationPassword::getExpirationSituation()->id;
        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            return back()->with('success', __('Authorization Password Updated'));
        }
    }

    public function renovation(Request $request)
    {
        $this->checkPermission('authorizationPasswords_update');

        $row = AuthorizationPassword::query()->find($request->id);
        $row->expiration_date = new DateTime(' +10 days');
        $row->situation_id = AuthorizationPassword::getAuthorizedSituation()->id;
        $res = $row->saveOriginOrTranslation();

        if ($res) {
            return back()->with('success', __('Authorization Password Updated'));
        }
    }

    public function check(Request $request)
    {
        $password = $request->password;

        if (!is_null($password)) {

            $authorization = AuthorizationPassword::check($password);

            if ($authorization) {
                return response()->json([
                    'success' => true,
                    'message' => "Autorizado o uso do Cartao!"
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => "Senha Não Autorizada!"
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => "Senha Não Informada!"
        ], 200);
    }
}
