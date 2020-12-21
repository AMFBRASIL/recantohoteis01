<?php

namespace Modules\Financial\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class CardMachineAccountTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_financial_bank_account_translations';

    protected $fillable = [
        'name',
        'bank_account_id',
        'payment_method_id',
        'rate',
        'days',
        'phone_support',
        'email_support',
    ];

    protected $seo_type = 'financial_bank_account_translations';

    public $type = 'financial_bank_account_translations';
}
