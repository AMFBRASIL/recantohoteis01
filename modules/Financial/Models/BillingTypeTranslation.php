<?php

namespace Modules\Financial\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class BillingTypeTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_financial_billing_type_translations';

    protected $fillable = ['name'];

    protected $seo_type = 'financial_billing_type_translations';

    public $type = 'financial_billing_type_translations';
}
