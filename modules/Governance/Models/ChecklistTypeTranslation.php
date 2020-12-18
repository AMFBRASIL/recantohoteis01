<?php

namespace Modules\Governance\Models;

class ChecklistTypeTranslation extends ChecklistType
{
    protected $table = 'bravo_checklist_type_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'checklist_type_translations';
}
