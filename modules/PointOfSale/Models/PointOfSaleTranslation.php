<?php

namespace Modules\PointOfSale\Models;

class PointOfSaleTranslation extends PointOfSale
{
    protected $table = 'bravo_point_of_sale_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_point_of_sale_translation';
}
