<?php

namespace Modules\Product\Models;

use Illuminate\Support\Facades\DB;
use Modules\Booking\Models\Bookable;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_product_category';
    public $type = 'product_category';
    protected $slugField     = false;

    protected $fillable = [
        'category_id',
        'description',
    ];

    public static function getModelName()
    {
        return __("ProductCategory");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function subCategory()
    {
        $this->hasMany(ProductSubCategory::class, 'id', 'category_id');
    }

    public function fill(array $attributes)
    {
        if (!empty($attributes)) {
            foreach ($this->fillable as $item) {
                $attributes[$item] = $attributes[$item] ?? null;
            }
        }
        return parent::fill($attributes); // TODO: Change the autogenerated stub
    }

    public static function getForSelect2Query($q)
    {
        $query =  static::query()->select(
            'id', DB::raw('description as text'))
            ->Where("description", 'like', '%' . $q . '%');

        return $query;
    }

    public function getDisplayName()
    {
        return sprintf('%s', $this->description);
    }
}
