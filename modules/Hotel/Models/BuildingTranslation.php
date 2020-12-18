<?php

namespace Modules\Hotel\Models;

class BuildingTranslation extends Building
{
    protected $table = 'bravo_building_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'building_translation';
}
