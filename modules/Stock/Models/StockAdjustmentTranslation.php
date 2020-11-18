<?php

namespace Modules\Stock\Models;

use App\BaseModel;

class StockAdjustmentTranslation extends Stock
{
    protected $table = 'bravo_stock_adjustment_translations';

    protected $fillable = [
        'content',
    ];

    protected $slugField     = false;
    protected $seo_type = 'stock_adjustment_translation';

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
