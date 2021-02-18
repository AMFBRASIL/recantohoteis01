<?php

namespace Modules\Characteristic\Models;

use Modules\Base\Models\Model;

class Characteristic extends Model
{
    public $type = 'Characteristic';
    protected $table = 'bravo_characteristic';
    protected $modelName = Characteristic::class;
    protected $transClass = CharacteristicTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
    ];
}
