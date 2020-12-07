<?php

namespace Modules\Product\Models;

use App\Currency;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Booking\Models\Bookable;
use Modules\Booking\Models\Booking;
use Modules\Core\Models\SEO;
use Modules\Media\Helpers\FileHelper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Supplier\Models\Supplier;

class Product extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_products';
    public $type = 'product';

    protected $casts = [
        'product_composition' => 'array',
    ];

    protected $fillable = [
        //Info
        'title',
        'slug',
        'product_code',
        'product_barcode',
        'content',
        //Price
        'price',
        'sale_price',
        'unit_price',
        // Weight
        'net_weight',
        'gross_weight',
        // Media
        'image_id',
        'gallery',
        'banner_image_id',
        // Composition
        'product_composition',
        // Stock
        'available_stock',
        'min_stock',
        'max_stock',
        'stock_id',
        // Unit/Category
        'product_unity_id',
        'product_category_id',
        'product_subcategory_id',
        // Supplier
        'supplier_id',
        // NCM / CEST
        'ncm_id',
        'cest_id',
        // CFOP
        'cfop_internal_id',
        'cfop_external_id',
        'origin_code',
        // CST
        'csosn_code',
        'csosn_value',
        'cst_pis_id',
        'cst_pis_value',
        'cst_cofins_id',
        'cst_cofins_value',
        'cst_ipi_id',
        'cst_ipi_value',
        // Config
        'control_stock',
        'enable_pos',
        'enable_nf',
        'show_in_menu',
        'use_balance',
        'loan_object',
        'input_product',
        'is_service',
        'facilities',
        // Role configs
        'status',
    ];
    protected $slugField = 'slug';
    protected $slugFromField = 'title';

    protected $productTranslationClass;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->productTranslationClass = ProductTranslation::class;
    }

    public static function getModelName()
    {
        return __("Product");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    public function getEditUrl()
    {
        return url(route('product.admin.edit', ['id' => $this->id]));
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(',', '.', str_replace('.', '', $value));
    }

    public function setSalePriceAttribute($value)
    {
        $this->attributes['sale_price'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function setUnitPriceAttribute($value)
    {
        $this->attributes['unit_price'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function getPriceFormattedAttribute()
    {
        $value = '0,00';
        if ($this->price) {
            $value = number_format($this->price, 2, ',', '.');
        }

        return $value;
    }

    public function getSalePriceFormattedAttribute()
    {
        $value = '0,00';
        if ($this->sale_price) {
            $value = number_format($this->sale_price, 2, ',', '.');
        }

        return 'R$ ' . $value;
    }

    public static function getConditionalFormattedAttribute($value)
    {
        if (! $value) {
            return __('Não');
        }

        return __('Sim');
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

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'title as name');
        if (strlen($q)) {

            $query->where('title', 'like', "%" . $q . "%");
        }
        $a = $query->limit(10)->get();
        return $a;
    }

    public function saveCloneByID($clone_id)
    {
        $old = parent::find($clone_id);
        if (empty($old)) return false;
        $old->title = $old->title . " - Copy";
        $new = $old->replicate();
        $new->save();

        //Language
        $langs = $this->productTranslationClass::where("origin_id", $old->id)->get();
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

    public static function getServiceIconFeatured()
    {
        return "icofont-ticket";
    }

    public static function isEnable()
    {
        return setting_item('event_disable') == false;
    }

    public static function getForSelect2Query($q, $toJson = false)
    {
        $query =  static::query()->select(
            'id', DB::raw('title as text'), 'available_stock', 'price')
            ->Where("title", 'like', '%' . $q . '%');

        if (! $toJson) {
            return $query;
        }

        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return json_encode([
            'results' => $res
        ]);
    }

    public function getDisplayName()
    {
        return sprintf('%s', $this->title);
    }

    public function isWishList()
    {
        return '';
    }
}
