<?php

namespace Modules\Garage\Models;

use Modules\Base\Models\Model;
use Modules\Hotel\Models\Building;
use Modules\Hotel\Models\BuildingFloor;

class Garage extends Model
{
    public $type = 'garage';
    protected $table = 'bravo_garage';
    protected $modelName = Garage::class;
    protected $transClass = GarageTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
        'building_id',
        'building_floor_id',
    ];

    public function building()
    {
        return $this->hasOne(Building::class, 'id', 'building_id')->withDefault();
    }

    public function buildingFloor()
    {
        return $this->hasOne(BuildingFloor::class, 'id', 'building_floor_id')->withDefault();
    }
}
