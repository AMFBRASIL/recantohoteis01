<?php

namespace Modules\Pos\Models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\PaymentMethod;
use Modules\Situation\Models\Situation;

class HistoricalConsumerCard extends Model
{
    use SoftDeletes;

    public $type = 'HistoricalConsumerCard';
    protected $table = 'bravo_pos_historical_consumer_card';
    protected $modelName = HistoricalConsumerCard::class;
    protected $transClass = HistoricalConsumerCardTranslation::class;
    protected $fieldClone = "card_number";

    protected $fillable = [
        'consumption_card_id',
        'card_number',
        'user_id',
        'value_card',
        'value_consumed',
        'situation_id',
        'payment_method_id',
        'card_transaction_number',
        'internal_observations',
        'cost_center_id',
        'bank_account_id',
    ];

    protected $dates = [
        'transaction_date',
        'created_at',
        'updated_at',
    ];

    public function setValueCardAttribute($value)
    {
        $this->attributes['value_card'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function getValueCardFormattedAttribute()
    {
        $value = '0,00';
        if ($this->value_card) {
            $value = number_format($this->value_card, 2, ',', '.');
        }
        return $value;
    }

    public function setValueAddAttribute($value)
    {
        $this->attributes['value_add'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function getValueAddFormattedAttribute()
    {
        $value = '0,00';
        if ($this->value_add) {
            $value = number_format($this->value_add, 2, ',', '.');
        }
        return $value;
    }

    public function setValueConsumedAttribute($value)
    {
        $this->attributes['value_consumed'] = str_replace(',', '.', str_replace('.','', $value));
    }

    public function getValueConsumedFormattedAttribute()
    {
        $value = '0,00';
        if ($this->value_consumed) {
            $value = number_format($this->value_consumed, 2, ',', '.');
        }
        return $value;
    }

    public function ConsumptionCard()
    {
        return $this->belongsTo(ConsumptionCard::class, 'consumption_card_id', 'id');
    }

    public function historical()
    {
        return $this->hasMany(HistoricalConsumerCard::class, 'consumption_card_id', 'id');
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class, 'cost_center_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class, 'situation_id');
    }
}
