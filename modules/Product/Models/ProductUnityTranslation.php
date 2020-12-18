<?php

namespace Modules\Product\Models;

use App\BaseModel;

class ProductUnityTranslation extends Product
{
    protected $table = 'bravo_product_unity_translations';

    protected $fillable = [
        'title',
        'acronym',
    ];

    protected $slugField     = false;
    protected $seo_type = 'product_unity_translation';

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
