<?php

namespace Modules\Classification\Models;

class ClassificationTranslation extends Classification
{
    protected $table = 'bravo_classification_table_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_classification_translation';
}
