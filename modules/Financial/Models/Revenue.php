<?php

namespace Modules\Financial\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;

class Revenue extends Model
{
    use SoftDeletes;

    public $type = 'revenue';
    protected $table = 'bravo_financial_revenue';
    protected $modelName = Revenue::class;
    protected $transClass = RevenueTranslation::class;
    protected $fieldClone = "name";


    protected $fillable = [
        'bank_account_id',
        'cost_center_id',
        'payment_method_id',
        'fine_value',
        'interest_value',
        'total_value',
        'historical',
        'competency_date',
        'status',
    ];

    protected $dates = [
        'issue_date',
        'competency_date',
        'created_at',
        'updated_at',
    ];

    public function setFineValueAttribute($value)
    {
        $this->attributes['fine_value'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function getFineValueFormattedAttribute()
    {
        $value = '0,00';
        if ($this->fine_value) {
            $value = number_format($this->fine_value, 2, ',', '.');
        }
        return $value;
    }

    public function setInterestValueAttribute($value)
    {
        $this->attributes['interest_value'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function getInterestValueFormattedAttribute()
    {
        $value = '0,00';
        if ($this->interest_value) {
            $value = number_format($this->interest_value, 2, ',', '.');
        }
        return $value;
    }

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

    public function getDetailUrl($locale = false)
    {
        return route('financial.revenue.detail', ['slug' => $this->slug]);
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('financial.admin.revenue.edit', ['id' => $this->id, "lang" => $lang]);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class, 'cost_center_id');
    }
}
