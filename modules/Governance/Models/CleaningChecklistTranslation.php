<?php

namespace Modules\Governance\Models;

class CleaningChecklistTranslation extends CleaningChecklist
{
    protected $table = 'bravo_cleaning_checklist_translations';

    protected $fillable = [
        'name',
        'content',
    ];

    protected $slugField     = false;
    protected $seo_type = 'cleaning_checklist_translation';
}
