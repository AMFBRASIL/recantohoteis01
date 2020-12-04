<?php

namespace Modules\PointOfSale\Models;

use Modules\Base\Models\Model;
use Modules\Stock\Models\Stock;

class PointOfSale extends Model
{
    public $type = 'point_of_sale';
    protected $table = 'bravo_point_of_sale';
    protected $modelName = PointOfSale::class;
    protected $transClass = PointOfSaleTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
        'stock_id'
    ];

    public function stock()
    {
        return $this->hasOne(Stock::class, 'id', 'stock_id');
    }
}
