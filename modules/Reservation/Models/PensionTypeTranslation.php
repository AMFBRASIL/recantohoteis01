<?php

namespace Modules\Reservation\Models;

class PensionTypeTranslation extends PensionType
{
    protected $table = 'bravo_pension_type_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'pension_type_translation';
}
