<?php

namespace Modules\Product\Models;

use Illuminate\Support\Facades\DB;
use Modules\Booking\Models\Bookable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Models\SEO;

class ProductUnity extends Bookable
{

    protected $table = 'bravo_product_unity';
    public $type = 'product_unity';
    protected $slugField     = false;

    protected $fillable = [
        //Info
        'acronym',
        'description',
    ];

    protected $productUnityTranslationClass;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->productUnityTranslationClass = ProductUnityTranslation::class;
    }

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

    public function saveCloneByID($clone_id)
    {
        $old = parent::find($clone_id);
        if (empty($old)) return false;
        $old->title = $old->title . " - Copy";
        $new = $old->replicate();
        $new->save();

        //Language
        $langs = $this->productUnityTranslationClass::where("origin_id", $old->id)->get();
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
