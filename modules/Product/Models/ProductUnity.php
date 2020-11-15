<?php

namespace Modules\Product\Models;

use Illuminate\Support\Facades\DB;
use Modules\Booking\Models\Bookable;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductUnity extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_product_unity';
    public $type = 'product_unity';
    protected $slugField     = false;

    protected $fillable = [
        //Info
        'acronym',
        'description',
    ];

    public static function getModelName()
    {
        return __("ProductUnity");
    }

    public static function getTableName()
    {
        return with(new static)->table;
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
            'id', DB::raw('CONCAT(IFNULL(acronym, ""),": ",IFNULL(description, "")) as text'))
            ->orWhere("acronym", 'like', '%' . $q . '%')
            ->orWhere("description", 'like', '%' . $q . '%');

        return $query;
    }

    public function getDisplayName()
    {
        return sprintf('%s: %s', $this->acronym, $this->description);
    }
}
