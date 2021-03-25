<?php

namespace Modules\Age\Models;

use Modules\Base\Models\Model;

class Age extends Model
{
    public $type = 'room';
    protected $table = 'bravo_age';
    protected $modelName = Age::class;
    protected $transClass = AgeTranslation::class;
    protected $fieldClone = "description";

    protected $fillable = [
        'description',
        'initial_age',
        'final_age',
    ];
}
