<?php

namespace Modules\Booking\Models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\PaymentMethod;
use Modules\PaymentTypeRate\Models\PaymentTypeRate;
use Modules\PointOfSale\Models\PointOfSale;
use Modules\Product\Models\Product;
use Modules\Room\Models\Room;
use Modules\Situation\Models\Situation;

class BookingPaymentHistory extends Model
{
    use SoftDeletes;

    public $type = 'BookingPaymentHistory';
    protected $table = 'bravo_booking_payment_history';
    protected $modelName = BookingPaymentHistory::class;

    protected $fillable = [
        'booking_id',
        'payment_method_id',
        'transaction_number',
        'payment_type_rate_id',
        'payment_value',
        'status',
        'create_user',
        'update_user',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function paymentTypeRate(){
        return $this->belongsTo(PaymentTypeRate::class, 'payment_type_rate_id');
    }
}
