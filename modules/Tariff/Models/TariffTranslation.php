<?php

namespace Modules\Tariff\Models;

class TariffTranslation extends Tariff
{
    protected $table = 'bravo_tariff_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_tariff_translation';
}
