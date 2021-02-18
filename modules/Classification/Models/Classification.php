<?php

namespace Modules\Classification\Models;

use Modules\Base\Models\Model;

class Classification extends Model
{
    public $type = 'Classification';
    protected $table = 'bravo_classification';
    protected $modelName = Classification::class;
    protected $transClass = ClassificationTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
    ];
}
