<?php

namespace Modules\Product\Models;

use Illuminate\Support\Facades\DB;
use Modules\Booking\Models\Bookable;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSubCategory extends Bookable
{
    protected $table = 'bravo_product_subcategory';
    public $type = 'product_subcategory';
    protected $slugField     = false;

    protected $fillable = [
        'category_id',
        'description',
        'class_icon'
    ];

    protected $productSubCategoryTranslationClass;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->productSubCategoryTranslationClass = ProductSubCategoryTranslation::class;
    }

    public static function getModelName()
    {
        return __("ProductSubCategory");
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function saveCloneByID($clone_id)
    {
        $old = parent::find($clone_id);
        if (empty($old)) return false;
        $old->title = $old->title . " - Copy";
        $new = $old->replicate();
        $new->save();

        //Language
        $langs = $this->productSubCategoryTranslationClass::where("origin_id", $old->id)->get();
        if (!empty($langs)) {
            foreach ($langs as $lang) {
                $langNew = $lang->replicate();
                $langNew->origin_id = $new->id;
                $langNew->save();
                $langSeo = SEO::where('object_id', $lang->id)->where('object_model', $lang->getSeoType() . "_" . $lang->locale)->first();
                if (!empty($langSeo)) {
                    $langSeoNew = $langSeo->replicate();
                    $langSeoNew->object_id = $langNew->id;
                    $langSeoNew->save();
                }
            }
        }
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
