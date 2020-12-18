<?php

namespace Modules\Product\Models;

use App\BaseModel;

class ProductTranslation extends Product
{
    protected $table = 'bravo_product_translations';

    protected $fillable = [
        'title',
        'content',
    ];

    protected $slugField     = false;
    protected $seo_type = 'product_translation';

    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'faqs'  => 'array',
    ];

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
