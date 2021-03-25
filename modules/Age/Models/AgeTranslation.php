<?php

namespace Modules\Age\Models;

class AgeTranslation extends Age
{
    protected $table = 'bravo_room_translations';

    protected $fillable = [
        'description',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_age_translation';
}
