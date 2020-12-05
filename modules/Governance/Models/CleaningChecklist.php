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
        'checklist_type_id',
        'sequence',
        'content',
        'governance',
        'main',
        'required',
    ];

    public function checklistType()
    {
        return $this->belongsTo(ChecklistType::class, 'checklist_type_id', 'id')->withDefault();
    }

    public function getStatusFormattedAttribute()
    {
        return $this->status == "publish" ? 'AUTORIZADA' : 'BLOQUEADA';
    }
}
