<?php

namespace Modules\Financial\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Financial\Models\BillingType;
use Modules\Financial\Models\PaymentMethod;
use Modules\Financial\Models\PaymentMethodTranslation;

class PaymentMethodController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/financial');
        parent::__construct();
    }

    public function index(Request $request)
    {
         $this->checkPermission('payment_methods_view');

        $paymentMethodList = new PaymentMethod();
        if ($paymentMethodName = $request->query('s')) {
            $paymentMethodList = $paymentMethodList->where('name', 'LIKE', '%' . $paymentMethodName . '%');
        }
        $paymentMethodList = $paymentMethodList->orderby('name', 'asc');

        $data = [
            'rows' => $paymentMethodList->paginate(20),
            'row' => new PaymentMethod(),
            'breadcrumbs' => [
                [
                    'name' => __('Financial'),
                    'url' => 'admin/module/financial'
                ],
            ],
            'translation' => new PaymentMethodTranslation()
        ];

        return view('Financial::admin.paymentMethods.index', $data);
    }

    public function edit(Request $request, $id)
    {
       $this->checkPermission('payment_methods_update');
        $row = PaymentMethod::find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('financial.admin.payment.method.index');
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
        return view('Financial::admin.paymentMethods.detail', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('payment_methods_update');
            $row = PaymentMethod::find($id);
            if (empty($row)) {
                return redirect(route('financial.admin.payment.method.index'));
            }
        } else {
            $this->checkPermission('payment_methods_create');
            $row = new PaymentMethod();
            $row->status = "publish";
        }

        $row->fill($request->input());

        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if ($id > 0) {
                return back()->with('success', __('Payment Updated'));
            } else {
                return redirect(route('financial.admin.payment.method.index'))->with('success', __('Payment created'));
            }
        }
    }

    public function bulkEdit(Request $request)
    {

        $this->checkPermission('payment_methods_update');
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
                $this->checkPermission('payment_methods_delete');
                $query = PaymentMethod::where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }
}
