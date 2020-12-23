<?php

namespace Modules\Hotel\Models;

use Illuminate\Support\Facades\DB;
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

    public static function getForSelect2Query($q, $building)
    {
        $query =  static::query()->select('id', DB::raw('name as text'))
            ->Where("name", 'like', '%' . $q . '%')
            ->Where('building_id', $building);

        return $query;
    }

    public function getDisplayName()
    {
        return sprintf('%s', $this->name);
    }
}
