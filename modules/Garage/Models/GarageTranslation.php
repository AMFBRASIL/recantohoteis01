<?php

namespace Modules\Garage\Models;

class GarageTranslation extends Garage
{
    protected $table = 'bravo_garage_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_garage_translations';
}
