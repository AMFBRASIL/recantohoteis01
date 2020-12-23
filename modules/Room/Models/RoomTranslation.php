<?php

namespace Modules\Room\Models;

class RoomTranslation extends Room
{
    protected $table = 'bravo_room_translations';

    protected $fillable = [
        'room',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_room_translation';
}
