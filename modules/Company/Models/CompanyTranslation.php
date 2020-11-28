<?php

namespace Modules\Company\Models;

class CompanyTranslation extends Company
{
    protected $table = 'bravo_company_translations';

    protected $fillable = [
        'title',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_company_translation';
}
