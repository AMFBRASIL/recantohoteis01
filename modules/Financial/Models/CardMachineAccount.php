<?php

namespace Modules\Financial\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardMachineAccount extends BaseModel
{
    use SoftDeletes;

    protected $table = 'bravo_financial_card_machine_accounts';

    protected $fillable = [
        'name',
        'bank_account_id',
        'payment_method_id',
        'rate',
        'days',
        'phone_support',
        'email_support',
    ];

    protected $slugField = 'slug';

    protected $slugFromField = 'name';

    protected $seo_type = 'financial_card_machine_accounts';

    public static function getModelName()
    {
        return __("New Card Machine");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function getDetailUrl($locale = false)
    {
        return route('financial.card.machine.account.detail', ['slug' => $this->slug]);
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('financial.admin.card.machine.account.edit', ['id' => $this->id, "lang" => $lang]);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class,'bank_account_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
