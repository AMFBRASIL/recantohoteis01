<?php

namespace Modules\Situation\Models;

use Modules\Base\Models\Model;

class Situation extends Model
{
    public $type = 'situation';
    protected $table = 'bravo_situation';
    protected $modelName = Situation::class;
    protected $transClass = SituationTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
        'section_id',
        'label',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id')->withDefault();
    }

    public function __toString()
    {
        return $this->name;
    }
}
