<?php

namespace Modules\Pos\Models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\PaymentMethod;
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
    ];

    protected $dates = [
        'transaction_date',
        'date_closing',
        'created_at',
        'updated_at',
    ];


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

    public function lastValueCard(){
        return $this->historical()->orderByDesc('created_at')->first()->value_card;
    }

    public static function getClosedSituation(){
        $situation = Situation::query()
            ->where('name', 'like', '%fechada%')
            ->whereHas('section', function ($query) {
                $query->where('name', 'like', '%CARTAO DE CONSUMO%');
            });

        return $situation->first();
    }
}
