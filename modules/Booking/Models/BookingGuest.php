<?php

namespace Modules\Booking\Models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;


class BookingGuest extends Model
{
    use SoftDeletes;

    public $type = 'booking_guests';
    protected $table = 'bravo_booking_guests';
    protected $modelName = BookingGuest::class;

    protected $fillable = [
        'booking_id',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function Booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
