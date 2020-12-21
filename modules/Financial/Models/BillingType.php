<?php

namespace Modules\Financial\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingType extends BaseModel
{
    use SoftDeletes;

    protected $table = 'bravo_financial_billing_type';

    protected $fillable = [
        'name',
        'status',
    ];

    protected $slugField = 'slug';

    protected $slugFromField = 'name';

    protected $seo_type = 'financial_billing_type';

    public static function getModelName()
    {
        return __("News Billing");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function getDetailUrl($locale = false)
    {
        return route('financial.billingType.detail', ['slug' => $this->slug]);
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('financial.admin.billingType.edit', ['id' => $this->id, "lang" => $lang]);
    }
}
