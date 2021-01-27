<?php

namespace Modules\Pos\Models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\PaymentMethod;
use Modules\PointOfSale\Models\PointOfSale;
use Modules\Product\Models\Product;
use Modules\Situation\Models\Situation;

class SaleProducts extends Model
{
    use SoftDeletes;

    public $type = 'SaleProducts';
    protected $table = 'bravo_pos_sale_products';
    protected $modelName = SaleProducts::class;

    protected $fillable = [
        'sales_id',
        'product_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
