<?php

namespace Modules\Stock\Models;

class BudgetTranslation extends Budget
{
    protected $table = 'bravo_budget_translations';

    protected $fillable = [
        'supplier_content',
        'internal_content',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_budget_translation';
}
