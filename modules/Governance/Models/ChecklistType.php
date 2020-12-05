<?php

namespace Modules\Governance\Models;

use Modules\Base\Models\Model;

class ChecklistType extends Model
{
    public $type = 'checklist_type';
    protected $table = 'bravo_checklist_type';
    protected $modelName = ChecklistType::class;
    protected $transClass = ChecklistTypeTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
    ];

    public static function getForSelect2Query($q)
    {
        $query =  static::query()->select('id', 'name as text')
            ->where("name", 'like', '%' . $q . '%');

        return $query;
    }

    public function getDisplayName()
    {
        return sprintf('%s', $this->name);
    }
}
