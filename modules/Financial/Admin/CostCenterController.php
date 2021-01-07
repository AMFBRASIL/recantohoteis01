<?php

namespace Modules\Financial\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\CostCenterTranslation;

class CostCenterController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/financial');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('cost_center_view');

        $costCenterList = new CostCenter();

        $costCenterList = $costCenterList::query() ;

        if ($costCenterName = $request->query('s')) {
            $costCenterList->where('name', 'LIKE', '%' . $costCenterName . '%');
        }

        if ($this->hasPermission('cost_center_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $costCenterList->where('create_user', $author);
            }
        } else {
            $costCenterList->where('create_user', Auth::id());
        }

        $costCenterList = $costCenterList->orderby('name', 'asc');

        $data = [
            'rows' => $costCenterList->with(['author'])->paginate(20),
            'cost_center_others' => $this->hasPermission('cost_center_others'),
            'row' => new CostCenter(),
            'breadcrumbs' => [
                [
                    'name' => __('Financial'),
                    'url' => 'admin/module/financial'
                ],
            ],
            'translation' => new CostCenterTranslation()
        ];

        return view('Financial::admin.costCenter.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('cost_center_update');
        $row = CostCenter::query()->find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('financial.admin.cost.center.index');
        }
        $data = [
            'row' => $row,
            'translation' => $translation,
            'breadcrumbs' => [
                [
                    'name' => __('Financial'),
                    'url' => 'admin/module/financial'
                ],
            ],
            'enable_multi_lang' => true
        ];
        return view('Financial::admin.costCenter.detail', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('cost_center_update');
            $row = CostCenter::query()->find($id);
            if (empty($row)) {
                return redirect(route('financial.admin.cost.center.index'));
            }
        } else {
            $this->checkPermission('cost_center_create');
            $row = new CostCenter();
            $row->status = "publish";
        }

        $row->fill($request->input());

        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if ($id > 0) {
                return back()->with('success', __('Cost Center Updated'));
            } else {
                return redirect(route('financial.admin.cost.center.index'))->with('success', __('Cost Center created'));
            }
        }
    }

    public function bulkEdit(Request $request)
    {

        $this->checkPermission('cost_center_update');
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
                $this->checkPermission('cost_center_delete');
                $query = CostCenter::query()->where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                $query = CostCenter::query()->where("id", $id);
                if (!$this->hasPermission('cost_center_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('news_update');
                }
                $query->update(['status' => $action]);
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }

    public function subCost(Request $request, $id)
    {
        return redirect(route('financial.admin.cost.center.index'));
    }
}
