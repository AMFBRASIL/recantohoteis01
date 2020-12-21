<?php

namespace Modules\Financial\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\CardMachineAccount;
use Modules\Financial\Models\CardMachineAccountTranslation;
use Modules\Financial\Models\PaymentMethod;


class CardMachineAccountController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/financial');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('card_machine_account_view');

        $machineAccountList = new CardMachineAccount();
        if ($machineAccountName = $request->query('s')) {
            $machineAccountList = $machineAccountList->where('name', 'LIKE', '%' . $machineAccountName . '%');
        }
        $machineAccountList = $machineAccountList->orderby('name', 'asc');

        $data = [
            'rows' => $machineAccountList->paginate(20),
            'row' => new BankAccount(),
            'breadcrumbs' => [
                [
                    'name' => __('Financial'),
                    'url' => 'admin/module/financial'
                ],
            ],
            'translation' => new CardMachineAccountTranslation(),
            'bankAccountList' => BankAccount::all(),
            'paymentMethodList' => PaymentMethod::all(),
        ];

        return view('Financial::admin.cardMachineAccounts.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('card_machine_account_update');
        $row = CardMachineAccount::find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('financial.admin.card.machine.account.index');
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
            'enable_multi_lang' => true,
            'bankAccountList' => BankAccount::all(),
            'paymentMethodList' => PaymentMethod::all(),
        ];
        return view('Financial::admin.cardMachineAccounts.detail', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('card_machine_account_update');
            $row = CardMachineAccount::find($id);

            if (empty($row)) {
                return redirect(route('financial.admin.card.machine.account.index'));
            }
        } else {
            $this->checkPermission('card_machine_account_create');
            $row = new CardMachineAccount();
            $row->status = "publish";
        }

        if (isset($request['name'])) {
            $request['name'] = mb_strtoupper($request['name']);
        }

        $row->fill($request->input());

        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if ($id > 0) {
                return back()->with('success', __('Card Machine Updated'));
            } else {
                return redirect(route('financial.admin.card.machine.account.index'))->with('success', __('Card Machine Created'));
            }
        }
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('card_machine_account_update');
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
                $this->checkPermission('card_machine_account_delete');
                $query = CardMachineAccount::where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }
}
