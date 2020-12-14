<?php

namespace Modules\Situation\Models;

class SituationTranslation extends Situation
{
    protected $table = 'bravo_situation_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_situation_translation';
}
