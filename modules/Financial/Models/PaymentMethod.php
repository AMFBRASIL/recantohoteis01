<?php

namespace Modules\Financial\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends BaseModel
{
    use SoftDeletes;

    protected $table = 'bravo_financial_payment_methods';

    protected $fillable = [
        'name',
        'status',
    ];

    protected $slugField = 'slug';

    protected $slugFromField = 'name';

    protected $seo_type = 'financial_payment_methods';

    public static function getModelName()
    {
        return __("News Payment");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function getDetailUrl($locale = false)
    {
        return route('financial.payment.method.detail', ['slug' => $this->slug]);
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('financial.admin.payment.method.edit', ['id' => $this->id, "lang" => $lang]);
    }
}
