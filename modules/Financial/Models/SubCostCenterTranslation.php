<?php

namespace Modules\Financial\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class SubCostCenterTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_financial_sub_cost_center_translations';

    protected $fillable = ['name'];

    protected $seo_type = 'financial_sub_cost_center_translations';

    public $type = 'financial_sub_cost_center_translations';
}
