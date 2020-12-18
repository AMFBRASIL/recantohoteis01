<?php

namespace Modules\Situation\Models;

class SectionTranslation extends Situation
{
    protected $table = 'bravo_section_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_section_translation';
}
