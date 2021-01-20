<?php

namespace Modules\Pos\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class SaleTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_pos_sale_translations';

    protected $fillable = ['card_number'];

    protected $seo_type = 'pos_sale_translations';

    public $type = 'pos_sale_translations';
}
