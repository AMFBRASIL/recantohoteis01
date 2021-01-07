<?php

namespace Modules\Financial\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostCenter extends BaseModel
{
    use SoftDeletes;

    protected $table = 'bravo_financial_cost_center';

    protected $fillable = [
        'name',
        'status',
    ];

    protected $slugField = 'slug';

    protected $slugFromField = 'name';

    protected $seo_type = 'financial_cost_center';

    public static function getModelName()
    {
        return __("News Cost Center");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function getDetailUrl($locale = false)
    {
        return route('financial.cost.center.detail', ['slug' => $this->slug]);
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('financial.admin.cost.center.edit', ['id' => $this->id, "lang" => $lang]);
    }
}
