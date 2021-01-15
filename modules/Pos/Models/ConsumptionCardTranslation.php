<?php

namespace Modules\Pos\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class ConsumptionCardTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_pos_consumption_card_translations';

    protected $fillable = ['card_number'];

    protected $seo_type = 'pos_consumption_card_translations';

    public $type = 'pos_consumption_card_translations';
}
