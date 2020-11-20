<?php

namespace Modules\Hotel\Models;

class BuildingFloorTranslation extends Building
{
    protected $table = 'bravo_building_floor_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'building_floor_translation';
}
