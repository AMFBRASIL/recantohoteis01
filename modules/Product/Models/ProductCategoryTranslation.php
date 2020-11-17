<?php

namespace Modules\Product\Models;

use App\BaseModel;

class ProductCategoryTranslation extends Product
{
    protected $table = 'bravo_product_category_translations';

    protected $fillable = [
        'description',
    ];

    protected $slugField     = false;
    protected $seo_type = 'product_category_translation';

    public function getSeoType(){
        return $this->seo_type;
    }

    public static function boot() {
		parent::boot();
		static::saving(function($table)  {
			unset($table->extra_price);
			unset($table->price);
			unset($table->sale_price);
		});
	}
}
