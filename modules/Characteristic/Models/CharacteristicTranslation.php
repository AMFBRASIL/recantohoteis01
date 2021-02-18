<?php

namespace Modules\Characteristic\Models;

class CharacteristicTranslation extends Characteristic
{
    protected $table = 'bravo_characteristic_table_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_characteristic_translation';
}
