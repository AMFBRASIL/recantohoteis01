<?php

namespace Modules\PaymentTypeRate\Models;

use Modules\Base\Models\Model;
use Modules\Hotel\Models\Building;
use Modules\Hotel\Models\BuildingFloor;
use Modules\Stock\Models\Stock;

class PaymentTypeRate extends Model
{
    public $type = 'payment_type_rate';
    protected $table = 'bravo_payment_type_rate';
    protected $modelName = PaymentTypeRate::class;
    protected $transClass = PaymentTypeRateTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
    ];
}
