<?php

namespace Modules\Stock\Admin;

use Illuminate\Http\Request;
use Modules\Stock\Jobs\SendBudget;
use Modules\Base\Admin\CrudController;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductUnity;
use Modules\Stock\Models\Budget;
use Modules\Supplier\Models\Supplier;

class BudgetController extends CrudController
{
    protected $modelName = Budget::class;

    public function __construct()
    {
        $this->setActiveMenu(route('stock.admin.create'));
    }

    protected $titleList = [
        'index'     => 'Cotações',
        'page'      => 'Cotações',
        'create'    => 'Cotação',
        'edit'      => 'Cotação'
    ];

    protected $permissionList = [
        'index'     => 'budget_view',
        'manage'    => 'budget_manage_others',
        'create'    => 'budget_create',
        'update'    => 'budget_update',
        'delete'    => 'budget_delete',
    ];

    protected $routeList = [
        'index'     => 'budget.admin.index',
        'create'    => 'budget.admin.create',
        'edit'      => 'budget.admin.edit',
        'store'     => 'budget.admin.store',
        'bulk'      => 'budget.admin.bulkEdit',
        'recovery'  => 'budget.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Stock::admin.budget.index',
        'edit'      => 'Stock::admin.budget.edit',
    ];

    protected $fieldSearchList = [
        'internal_content'
    ];

    public function getProductComposition($id)
    {
        $product = Budget::find($id);
        if (! $product->product_composition) {
            return response()->json([]);
        }

        $data = [];
        foreach ($product->product_composition as $values) {
            $product = Product::find($values['product_id']);
            $unity = ProductUnity::find($values['unity']);
            $data[] = [
                'product'  => $product->title,
                'quantity' => $values['quantity'],
                'unity' => $unity->acronym,
                'price' => $values['price'],
            ];
        }

        return response()->json($data);
    }

    public function getSupplierComposition($id)
    {
        $supplier = Budget::find($id);
        if (! $supplier->supplier_composition) {
            return response()->json([]);
        }

        $data = [];
        foreach ($supplier->supplier_composition as $values) {
            $supplier = Supplier::find($values['supplier_id']);
            $data[] = [
                'name'  => $supplier->title,
                'email'  => $supplier->email ?? ' ',
            ];
        }

        return response()->json($data);
    }

    public function bulkEdit(Request $request)
    {
        $ids = $request->input('ids');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }

        $action = $request->input('action');
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }

        switch ($action){
            case "delete":
                $this->checkPermission($this->permissionList['delete']);
                $this->bulkDelete($ids);

                return redirect()->back()->with('success', __('Registro removido com sucesso.'));
                break;
            case "in_progress":
            case "aborted":
            case "autorized":
                // Change budget status
                foreach ($ids as $id) {
                    $query = $this->modelName::where("id", $id);
                    $query->update(['budget_status' => $action]);
                }

                return redirect()->back()->with('success', __('Registro atualizado com sucesso'));
                break;
            default:
                $this->checkPermission($this->permissionList['update']);
                $this->bulkUpdate($ids, $action);

                return redirect()->back()->with('success', __('Registro atualizado com sucesso'));
                break;
        }
    }

    protected function afterSaveModel($model)
    {
        SendBudget::dispatch($model);
    }
}
