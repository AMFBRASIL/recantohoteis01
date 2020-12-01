<?php

namespace Modules\Governance\Models;

use Modules\Base\Models\Model;

class CleaningChecklist extends Model
{
    public $type = 'cleaning_checklist';
    protected $table = 'bravo_cleaning_checklist';
    protected $modelName = CleaningChecklist::class;
    protected $transClass = CleaningChecklistTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
        'content',
        'governance',
        'main',
        'required',
    ];

    public function getStatusFormattedAttribute()
    {
        return $this->status == "publish" ? 'AUTORIZADA' : 'BLOQUEADA';
    }
}
