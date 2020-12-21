<?php

namespace Modules\Profession\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Financial\Models\PaymentMethod;
use Modules\Profession\Models\Professions;
use Modules\Profession\Models\ProfessionsTranslation;

class ProfessionController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu(route('profession.admin.index'));
    }

    public function index(Request $request)
    {
        $this->checkPermission('profession_view');

        $professionList = new Professions();
        if ($professionName = $request->query('s')) {
            $professionList = $professionList->where('name', 'LIKE', '%' . $professionName . '%');
        }
        $professionList = $professionList->orderby('name', 'asc');

        $data = [
            'rows' => $professionList->paginate(20),
            'row' => new Professions(),
            'breadcrumbs' => [
                [
                    'name' => __('Profession'),
                    'url' => 'admin/module/profession'
                ],
            ],
            [
                'name' => __('All'),
                'class' => 'active'
            ],
            'translation' => new ProfessionsTranslation()
        ];

        return view('Profession::admin.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('profession_update');
        $row = Professions::find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('profession.admin.index');
        }
        $data = [
            'row' => $row,
            'translation' => $translation,
            'breadcrumbs' => [
                [
                    'name' => __('Profession'),
                    'url' => 'admin/module/profession'
                ],
                [
                    'name' => __('Editar Profissões'),
                    'class' => 'active'
                ],
            ],
            'enable_multi_lang' => true
        ];
        return view('Profession::admin.detail', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('profession_update');
            $row = Professions::find($id);
            if (empty($row)) {
                return redirect(route('profession.admin.index'));
            }
        } else {
            $this->checkPermission('profession_create');
            $row = new Professions();
            $row->status = "publish";
        }

        $row->fill($request->input());

        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if ($id > 0) {
                return back()->with('success', __('Profession Updated'));
            } else {
                return redirect(route('profession.admin.index'))->with('success', __('Profession created'));
            }
        }
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('profession_update');
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
                $this->checkPermission('profession_delete');
                $query = Professions::where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }
}
