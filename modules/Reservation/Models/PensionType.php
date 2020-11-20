<?php

namespace Modules\Reservation\Models;

use Modules\Base\Models\Model;

class PensionType extends Model
{
    public $type = 'pension_type';
    protected $table = 'bravo_pension_types';
    protected $modelName = PensionType::class;
    protected $transClass = PensionTypeTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
    ];
}
