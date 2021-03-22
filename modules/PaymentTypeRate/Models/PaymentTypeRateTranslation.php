<?php

namespace Modules\PaymentTypeRate\Models;

class PaymentTypeRateTranslation extends PaymentTypeRate
{
    protected $table = 'bravo_payment_type_rate_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_payment_type_rate_translation';
}
