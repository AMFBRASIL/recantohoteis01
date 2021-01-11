<?php

namespace Modules\Financial\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Modules\Base\Models\Model;

class SubCostCenter extends Model
{
    use SoftDeletes;

    public $type = 'subCostCenter';
    protected $table = 'bravo_financial_sub_cost_center';
    protected $modelName = SubCostCenter::class;
    protected $transClass = SubCostCenterTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
        'status',
    ];

    public static function getForSelect2Query($q, $costCenter)
    {
        $query = static::query()->select('id', DB::raw('name as text'))
            ->Where("name", 'like', '%' . $q . '%')
            ->Where('cost_center_id', $costCenter);

        return $query;
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class, 'cost_center_id', 'id');
    }

    public function getDetailUrl($locale = false)
    {
        return route('financial.sub.cost.detail', ['slug' => $this->name]);
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('financial.admin.sub.cost.edit', ['id' => $this->id, "lang" => $lang]);
    }
}
