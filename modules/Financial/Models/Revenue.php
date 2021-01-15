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
        'status',
    ];

    protected $dates = [
        'issue_date',
        'competency_date',
        'created_at',
        'updated_at',
    ];


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
