<?php

namespace Modules\Supplier\Models;

use App\BaseModel;

class SupplierTranslation extends Supplier
{
    protected $table = 'bravo_supplier_translations';

    protected $fillable = [
        'title',
        'content',
    ];

    protected $slugField     = false;
    protected $seo_type = 'supplier_translation';

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
