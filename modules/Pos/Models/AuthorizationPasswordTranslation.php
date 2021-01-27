<?php

namespace Modules\Pos\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class AuthorizationPasswordTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_pos_authorization_password_translations';

    protected $fillable = ['password'];

    protected $seo_type = 'pos_authorization_password_translations';

    public $type = 'pos_authorization_password_translations';
}
