<?php

namespace Modules\Pos\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\Model;
use Modules\Situation\Models\Situation;

class AuthorizationPassword extends Model
{
    use SoftDeletes;

    public $type = 'AuthorizationPassword';
    protected $table = 'bravo_pos_authorization_password';
    protected $modelName = AuthorizationPassword::class;
    protected $transClass = AuthorizationPasswordTranslation::class;
    protected $fieldClone = "card_number";

    protected $fillable = [
        'password',
        'situation_id',
        'internal_observations',
    ];

    protected $dates = [
        'expiration_date',
        'created_at',
        'updated_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class, 'situation_id');
    }


    public static function getExpirationSituation()
    {
        $situation = Situation::query()
            ->where('name', 'like', '%EXPIRADA%')
            ->whereHas('section', function ($query) {
                $query->where('name', 'like', '%Senhas%');
            });
        return $situation->first();
    }

    public static function getAuthorizedSituation()
    {
        $situation = Situation::query()
            ->where('name', 'like', '%Autorizada%')
            ->whereHas('section', function ($query) {
                $query->where('name', 'like', '%Senhas%');
            });
        return $situation->first();
    }

    public function validExpirationDate()
    {
        $expiration = $this->attributes['expiration_date'];

        return $expiration <= Carbon::now() ? false : true;

    }

    public static function check($password)
    {
        $authorizationPassword = AuthorizationPassword::query()->where('password', $password)
            ->whereHas('situation', function ($query) {
                $query->where('name', 'like', '%Autorizada%')
                    ->whereHas('section', function ($query) {
                        $query->where('name', 'like', '%Senhas%');
                    });
             })
            ->first();

        if (!empty($authorizationPassword)){
            if ($authorizationPassword->validExpirationDate()){
                return true;
            }
            $authorizationPassword->situation_id = AuthorizationPassword::getExpirationSituation()->id;
            $authorizationPassword->save();
            return false;
        }
        return false;
    }
}
