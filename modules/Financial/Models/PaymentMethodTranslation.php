<?php

namespace Modules\Financial\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class PaymentMethodTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_financial_payment_methods_translations';

    protected $fillable = ['name'];

    protected $seo_type = 'financial_payment_methods_translations';

    public $type = 'financial_payment_methods_translations';
}
