<?php

namespace Modules\Tariff\Models;

use Modules\Base\Models\Model;
use Modules\Characteristic\Models\Characteristic;
use Modules\Classification\Models\Classification;
use Modules\Hotel\Models\Building;
use Modules\Hotel\Models\BuildingFloor;
use Modules\Room\Models\Room;
use Modules\Situation\Models\Situation;
use Modules\Stock\Models\Stock;

class Tariff extends Model
{
    public $type = 'tariff';
    protected $table = 'bravo_tariff';
    protected $modelName = Tariff::class;
    protected $transClass = TariffTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
        'tariff_start',
        'tariff_end',
        'percentage_tariff',
        'guest_category',
        'classification_id',
        'characteristic_id',
        'situation_id',
        'is_monday',
        'is_tuesday',
        'is_wednesday',
        'is_thursday',
        'is_friday',
        'is_saturday',
        'is_sunday',
    ];

    public function situation()
    {
        return $this->belongsTo(Situation::class, 'situation_id');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id');
    }

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id');
    }
}
