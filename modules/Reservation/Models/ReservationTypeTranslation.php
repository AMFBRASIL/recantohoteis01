<?php

namespace Modules\Reservation\Models;

class ReservationTypeTranslation extends PensionType
{
    protected $table = 'bravo_reservation_type_translations';

    protected $fillable = [
        'name',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_reservation_type_translation';
}
