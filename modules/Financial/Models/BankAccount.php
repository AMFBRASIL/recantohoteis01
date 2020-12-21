<?php

namespace Modules\Financial\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends BaseModel
{
    use SoftDeletes;

    protected $table = 'bravo_financial_bank_accounts';

    protected $fillable = [
        'bank',
        'agency',
        'account',
        'type_account',
        'status',
    ];

    protected $slugField = 'slug';

    protected $slugFromField = 'bank';

    protected $seo_type = 'financial_bank_accounts';

    public static function getModelName()
    {
        return __("New Bank Account");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function getDetailUrl($locale = false)
    {
        return route('financial.bank.account.detail', ['slug' => $this->slug]);
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('financial.admin.bank.account.edit', ['id' => $this->id, "lang" => $lang]);
    }
}
