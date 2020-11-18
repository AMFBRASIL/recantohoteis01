<?php

namespace Modules\Financial\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Financial\Models\BillingType;
use Modules\Financial\Models\BillingTypeTranslation;

class BillingTypeController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/financial');
        parent::__construct();
    }

    public function index(Request $request)
    {
         $this->checkPermission('billing_view');

        $billingTypelist = new BillingType();
        if ($billingTypename = $request->query('s')) {
            $billingTypelist = $billingTypelist->where('name', 'LIKE', '%' . $billingTypename . '%');
        }
        $billingTypelist = $billingTypelist->orderby('name', 'asc');

        $data = [
            'rows' => $billingTypelist->paginate(20),
            'row' => new BillingType(),
            'breadcrumbs' => [
                [
                    'name' => __('Financial'),
                    'url' => 'admin/module/financial'
                ],
            ],
            'translation' => new BillingTypeTranslation()
        ];

        return view('Financial::admin.billingType.index', $data);
    }

    public function edit(Request $request, $id)
    {
       $this->checkPermission('billing_update');
        $row = BillingType::find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('financial.admin.billingType.index');
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
        return view('Financial::admin.billingType.detail', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('billing_update');
            $row = BillingType::find($id);
            if (empty($row)) {
                return redirect(route('financial.admin.billingType.index'));
            }
        } else {
            $this->checkPermission('billing_create');
            $row = new BillingType();
            $row->status = "publish";
        }

        $row->fill($request->input());

        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if ($id > 0) {
                return back()->with('success', __('Billing Updated'));
            } else {
                return redirect(route('financial.admin.billingType.index'))->with('success', __('Billing created'));
            }
        }
    }

    public function bulkEdit(Request $request)
    {

        $this->checkPermission('billing_update');
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
                $this->checkPermission('billing_delete');
                $query = BillingType::where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }
}
