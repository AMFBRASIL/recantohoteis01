<?php

namespace Modules\Booking\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;
use Modules\Garage\Models\Garage;


class BookingVehicles extends Model
{
    use SoftDeletes;

    public $type = 'booking_vehicles';
    protected $table = 'bravo_booking_vehicles';
    protected $modelName = BookingVehicles::class;

    protected $fillable = [
        'booking_id',
        'garage_id',
        'plaque',
        'color',
        'model',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function garage(){
        return $this->hasOne(Garage::class);
    }

    public function Booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
