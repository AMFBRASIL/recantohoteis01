<?php

namespace Modules\Financial\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Financial\Models\Bank;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\BankAccountTranslation;


class BankAccountController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/financial');
        parent::__construct();
    }

    public function index(Request $request)
    {
         $this->checkPermission('bank_account_view');

        $bankAccountList = new BankAccount();
        if ($bankAccountName = $request->query('s')) {
            $bankAccountList = $bankAccountList->where('bank', 'LIKE', '%' . $bankAccountName . '%');
        }
        $bankAccountList = $bankAccountList->orderby('bank', 'asc');

        $data = [
            'rows' => $bankAccountList->paginate(20),
            'row' => new BankAccount(),
            'breadcrumbs' => [
                [
                    'name' => __('Financial'),
                    'url' => 'admin/module/financial'
                ],
            ],
            'translation' => new BankAccountTranslation(),
            'bankList' => Bank::all()->sortBy('nome_reduzido'),
            'optionAccount' => [
                'CONTA CORRENTE',
                'CONTA POUPANCA',
                'CONTA DIFERENCIADA'
            ]
        ];

        return view('Financial::admin.bankAccounts.index', $data);
    }

    public function edit(Request $request, $id)
    {
       $this->checkPermission('bank_account_update');
        $row = BankAccount::find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('financial.admin.bank.account.index');
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
            'bankList' => Bank::all()->sortBy('nome_reduzido'),
            'optionAccount' => [
                'CONTA CORRENTE',
                'CONTA POUPANCA',
                'CONTA DIFERENCIADA'
            ]
        ];
        return view('Financial::admin.bankAccounts.detail', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('bank_account_update');
            $row = BankAccount::find($id);

            if (empty($row)) {
                return redirect(route('financial.admin.bank.account.index'));
            }
        } else {
            $this->checkPermission('bank_account_create');
            $row = new BankAccount();
            $row->status = "publish";
        }

        if (isset($request['bank'])){
            $request['bank'] =  mb_strtoupper($request['bank']);
        }

        if (isset($request['agency'])){
            $request['agency'] =  preg_replace('/[^A-Za-z0-9]/', '', $request['agency']);
        }

        if (isset($request['account'])){
            $request['account'] =  preg_replace('/[^A-Za-z0-9]/', '', $request['account']);
        }

        $row->fill($request->input());

        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if ($id > 0) {
                return back()->with('success', __('Bank Account Updated'));
            } else {
                return redirect(route('financial.admin.bank.account.index'))->with('success', __('Bank Account created'));
            }
        }
    }

    public function bulkEdit(Request $request)
    {

        $this->checkPermission('bank_account_update');
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
                $this->checkPermission('bank_account_delete');
                $query = BankAccount::where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }
}
