<?php

namespace Modules\Reservation\Models;

use Modules\Base\Models\Model;

class PensionType extends Model
{
    public $type = 'pension_type';
    protected $table = 'bravo_pension_types';
    protected $modelName = PensionType::class;
    protected $transClass = PensionTypeTranslation::class;
    protected $fieldClone = "name";

    protected $fillable = [
        'name',
        'daily_rate_40',
        'daily_rate_100',
        'start_time',
        'end_date'
    ];

    public function setDailyRate40Attribute($value)
    {
        $this->attributes['daily_rate_40'] = str_replace(',', '.', str_replace('.', '', $value));
    }

    public function getDailyRate40FormattedAttribute()
    {
        $value = '0,00';
        if ($this->daily_rate_40) {
            $value = number_format($this->daily_rate_40, 2, ',', '.');
        }
        return $value;
    }

    public function setDailyRate100Attribute($value)
    {
        $this->attributes['daily_rate_100'] = str_replace(',', '.', str_replace('.', '', $value));
    }

    public function getDailyRate100FormattedAttribute()
    {
        $value = '0,00';
        if ($this->daily_rate_100) {
            $value = number_format($this->daily_rate_100, 2, ',', '.');
        }
        return $value;
    }
}
