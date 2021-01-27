<?php

namespace Modules\Financial\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class RevenueTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_financial_revenue_translations';

    protected $fillable = ['number'];

    protected $seo_type = 'financial_revenue_translations';

    public $type = 'financial_revenue_translations';
}
