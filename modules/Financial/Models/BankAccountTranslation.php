<?php

namespace Modules\Financial\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class BankAccountTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_financial_bank_account_translations';

    protected $fillable = [
        'bank',
        'agency',
        'account',
        'type_account',
    ];

    protected $seo_type = 'financial_bank_account_translations';

    public $type = 'financial_bank_account_translations';
}
