<?php

namespace Modules\Stock\Admin;

use DemeterChain\A;
use Modules\Stock\Jobs\AdjustmentStock;
use Illuminate\Http\Request;
use Modules\Base\Admin\CrudController;
use Modules\Product\Models\Product;
use Modules\Stock\Models\StockAdjustment;

class StockAdjustmentController extends CrudController
{
    protected $modelName = StockAdjustment::class;

    public function __construct()
    {
        $this->setActiveMenu(route('stock.admin.create'));
    }

    protected $titleList = [
        'index'     => 'Ajustes',
        'page'      => 'Ajustes',
        'create'    => 'Ajuste',
        'edit'      => 'Ajuste'
    ];

    protected $permissionList = [
        'index'     => 'stock_adjustment_view',
        'manage'    => 'stock_adjustment_manage_others',
        'create'    => 'stock_adjustment_create',
        'update'    => 'stock_adjustment_update',
        'delete'    => 'stock_adjustment_delete',
    ];

    protected $routeList = [
        'index'     => 'stock_adjustment.admin.index',
        'create'    => 'stock_adjustment.admin.create',
        'edit'      => 'stock_adjustment.admin.edit',
        'store'     => 'stock_adjustment.admin.store',
        'bulk'      => 'stock_adjustment.admin.bulkEdit',
        'recovery'  => 'stock_adjustment.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Stock::admin.adjustment.index',
        'edit'      => 'Stock::admin.adjustment.edit',
    ];

    protected $fieldSearchList = [
        'content'
    ];

    public function getComposition($id)
    {
        $product = StockAdjustment::find($id);
        if (! $product->product_composition) {
            return response()->json([]);
        }

        $data = [];
        foreach ($product->product_composition as $values) {
            $product = Product::find($values['product_id']);
            $data[] = [
                'product'  => $product->title,
                'quantity' => $values['quantity'],
                'price' => $values['price'],
            ];
        }

        return response()->json($data);
    }

    protected function afterSaveModel($model)
    {
        AdjustmentStock::dispatch($model);
    }
}
