<?php

namespace Modules\Room\Models;

use Modules\Base\Models\Model;
use Modules\Hotel\Models\Building;
use Modules\Hotel\Models\BuildingFloor;
use Modules\Stock\Models\Stock;

class Room extends Model
{
    public $type = 'room';
    protected $table = 'bravo_room';
    protected $modelName = Room::class;
    protected $transClass = RoomTranslation::class;
    protected $fieldClone = "number";

    protected $fillable = [
        'number',
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
