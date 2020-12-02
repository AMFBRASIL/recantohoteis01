<?php

namespace Modules\Profession\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class ProfessionsTranslation extends Bookable
{
    use SoftDeletes;

    protected $table = 'bravo_professions_translations';

    protected $fillable = ['name'];

    protected $seo_type = 'professions_translations';

    public $type = 'professions_translations';
}
