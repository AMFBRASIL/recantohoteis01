<?php

namespace Modules\Reservation\Models;

use Modules\Base\Models\Model;

class ReservationType extends Model
{
    public $type = 'reservation_type';
    protected $table = 'bravo_reservation_type';
    protected $modelName = ReservationType::class;
    protected $transClass = ReservationTypeTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
    ];
}
