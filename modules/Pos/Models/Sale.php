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

class Sale extends Model
{
    use SoftDeletes;

    public $type = 'Sale';
    protected $table = 'bravo_pos_sale';
    protected $modelName = Sale::class;
    protected $transClass = SaleTranslation::class;
    protected $fieldClone = "card_number";

    protected $fillable = [
        'card_number',
        'user_id',
        'apartment_id',
        'point_sales_id',
        'situation_id',
        'payment_method_id',
        'card_transaction_number',
        'internal_observations',
        'point_sales_id',
        'total_value',
        'discounts_value',
        'received_value',
        'room_id',
        'day_user',

        //products
        'product_composition',

        // Config
        'is_control_inventory',
        'is_send_email_detail',
        'is_issue_note',
    ];

    protected $dates = [
        'sales_date',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'product_composition' => 'array',
    ];

    public function setTotalValueAttribute($value)
    {
        $this->attributes['total_value'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function getTotalValueFormattedAttribute()
    {
        $value = '0,00';
        if ($this->total_value) {
            $value = number_format($this->total_value, 2, ',', '.');
        }
        return $value;
    }

    public function setDiscountsValueAttribute($value)
    {
        $this->attributes['discounts_value'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function getDiscountsValueFormattedAttribute()
    {
        $value = '0,00';
        if ($this->discounts_value) {
            $value = number_format($this->discounts_value, 2, ',', '.');
        }
        return $value;
    }

    public function setReceivedValueAttribute($value)
    {
        $this->attributes['received_value'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function getReceivedValueFormattedAttribute()
    {
        $value = '0,00';
        if ($this->received_value) {
            $value = number_format($this->received_value, 2, ',', '.');
        }
        return $value;
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function pointSales(){
        return $this->belongsTo(PointOfSale::class, 'point_sales_id');
    }

/*    public function Apartment(){
        return $this->belongsTo(::class, 'apartment_id');
    }*/

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class, 'situation_id');
    }

    public function consumerCard(){
        return ConsumptionCard::query()->where('card_number', '=', $this->card_number)->first();
    }

    public function productName($id){
        return Product::query()->where('id', '=', $id)->get('title')->first()->title;
    }
}
