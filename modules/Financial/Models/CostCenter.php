<?php

namespace Modules\Financial\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;

class CostCenter extends Model
{
    use SoftDeletes;

    public $type = 'costCenter';
    protected $table = 'bravo_financial_cost_center';
    protected $modelName = CostCenter::class;
    protected $transClass = CostCenterTranslation::class;
    protected $fieldClone = "name";


    protected $fillable = [
        'name',
        'status',
    ];


    public function getDetailUrl($locale = false)
    {
        return route('financial.cost.center.detail', ['slug' => $this->slug]);
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('financial.admin.cost.center.edit', ['id' => $this->id, "lang" => $lang]);
    }


    public function sub()
    {
        return $this->hasMany(SubCostCenter::class, 'cost_center_id', 'id');
    }
}
