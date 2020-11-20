<?php

namespace Modules\Hotel\Models;

use Modules\Base\Models\Model;

class BuildingFloor extends Model
{
    public $type = 'building';
    protected $table = 'bravo_building_floor';
    protected $modelName = BuildingFloor::class;
    protected $transClass = BuildingFloorTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
    ];

    public function __toString()
    {
        return sprintf('%s', $this->name ?: '');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }
}
