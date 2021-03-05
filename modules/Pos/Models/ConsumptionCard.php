<?php

namespace Modules\Pos\Models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\PaymentMethod;
use Modules\Financial\Models\Revenue;
use Modules\Room\Models\Room;
use Modules\Situation\Models\Situation;

class ConsumptionCard extends Model
{
    use SoftDeletes;

    public $type = 'ConsumptionCard';
    protected $table = 'bravo_pos_consumption_card';
    protected $modelName = ConsumptionCard::class;
    protected $transClass = ConsumptionCardTranslation::class;
    protected $fieldClone = "card_number";

    protected $fillable = [
        'card_number',
        'user_id',
        'value_card',
        'value_add',
        'value_consumed',
        'situation_id',
        'payment_method_id',
        'card_transaction_number',
        'internal_observations',
        'cost_center_id',
        'bank_account_id',
        'room_id',
        'day_user',
    ];

    protected $dates = [
        'transaction_date',
        'date_closing',
        'created_at',
        'updated_at',
    ];

    public function setValueCardAttribute($value)
    {
        $this->attributes['value_card'] = str_replace(',', '.', str_replace('.', '', $value));
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
        $this->attributes['value_add'] = str_replace(',', '.', str_replace('.', '', $value));
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
        $this->attributes['value_consumed'] = str_replace(',', '.', str_replace('.', '', $value));
    }

    public function getValueConsumedFormattedAttribute()
    {
        $value = '0,00';
        if ($this->value_consumed) {
            $value = number_format($this->value_consumed, 2, ',', '.');
        }
        return $value;
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

    public function room()
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public static function getClosedSituation()
    {
        $situation = Situation::query()
            ->where('name', 'like', '%FECHADO%')
            ->whereHas('section', function ($query) {
                $query->where('name', 'like', '%CARTAO CONSUMO%');
            });

        return $situation->first();
    }

    public function createHistory($card)
    {
        $parent = new HistoricalConsumerCard();
        $parent->consumption_card_id = $card->id;
        $parent->card_number = $card->card_number;
        $parent->user_id = $card->user_id;
        $parent->value_card = $card->value_card_formatted;
        $parent->value_add = $card->value_add_formatted;
        $parent->value_consumed = $card->value_consumed_formatted;
        $parent->situation_id = $card->situation_id;
        $parent->payment_method_id = $card->payment_method_id;
        $parent->card_transaction_number = $card->card_transaction_number;
        $parent->internal_observations = $card->internal_observations;
        $parent->cost_center_id = $card->cost_center_id;
        $parent->bank_account_id = $card->bank_account_id;
        $parent->transaction_date = $card->transaction_date;
        $parent->date_closing = $card->date_closing;
        $parent->status = "publish";

        $parent->saveOriginOrTranslation();
    }

    public function createRevenue($card)
    {
        $revenue = new Revenue();

        $revenue->bank_account_id = $card->bank_account_id;
        $revenue->cost_center_id = $card->cost_center_id;
        $revenue->payment_method_id = $card->payment_method_id;
        $revenue->total_value = $card->value_card_formatted;
        $revenue->issue_date = $card->transaction_date;
        $revenue->competency_date = $card->transaction_date;
        $revenue->status = "publish";

        $revenue->saveOriginOrTranslation();
    }
}
