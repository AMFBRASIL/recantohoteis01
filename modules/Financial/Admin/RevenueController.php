<?php

namespace Modules\Financial\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\PaymentMethod;
use Modules\Financial\Models\Revenue;
use Modules\Financial\Models\RevenueTranslation;

class RevenueController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/financial');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('revenue_view');

        $revenueList = new Revenue();
        $revenueList = $revenueList::all();

        $revenue = new Revenue();
        $revenue->issue_date = new Carbon();

        $data = [
            'rows' => $revenueList,
            'row' => $revenue,
            'breadcrumbs' => [
                [
                    'name' => __('Financial'),
                    'url' => 'admin/module/financial'
                ],
            ],
            'translation' => new RevenueTranslation()
        ];

        return view('Financial::admin.revenue.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('revenue_create');
        $row = new Revenue();
        $row->issue_date = new Carbon();
        $row->fill([
            'status' => 'publish'
        ]);
        $data = [
            'row' => $row,
            'translation' => new RevenueTranslation(),
            'breadcrumbs' => [
                [
                    'name' => __('Financial'),
                    'url' => 'admin/module/financial'
                ],
                [
                    'name' => __('Add Hotel'),
                    'class' => 'active'
                ],
            ],
            'page_title' => __("Receitas"),
            'bankAccountList' => BankAccount::all(),
            'costCenterList' => CostCenter::all(),
            'paymentMethodList' => PaymentMethod::all(),
        ];
        return view('Financial::admin.revenue.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('revenue_update');
        $row = Revenue::query()->find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('financial.admin.revenue.index');
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
        return view('Financial::admin.revenue.detail', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('revenue_update');
            $row = Revenue::query()->find($id);
            if (empty($row)) {
                return redirect(route('financial.admin.revenue.index'));
            }
        } else {
            $this->checkPermission('revenue_create');
            $row = new Revenue();
            $row->status = "publish";
        }
        $row->issue_date = new Carbon();
        $row->fill($request->input());

        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if ($id > 0) {
                return back()->with('success', __('Revenue Updated'));
            } else {
                return redirect(route('financial.admin.revenue.index'))->with('success', __('Revenue created'));
            }
        }
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('revenue_update');
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
                $this->checkPermission('revenue_delete');
                $query = Revenue::query()->where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        } else if ($action == "clone") {
            $this->checkPermission('revenue_create');
            foreach ($ids as $id) {
                (new Revenue)->saveCloneByID($id);
            }
        } else {
            foreach ($ids as $id) {
                $query = Revenue::query()->where("id", $id);
                if (!$this->hasPermission('revenue_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('revenue_update');
                }
                $query->update(['status' => $action]);
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }
}
