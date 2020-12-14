<?php

namespace Modules\Situation\Models;

use Illuminate\Support\Facades\DB;
use Modules\Base\Models\Model;

class Section extends Model
{
    public $type = 'section';
    protected $table = 'bravo_section';
    protected $modelName = Section::class;
    protected $transClass = SectionTranslation::class;
    protected $fieldClone = "title";

    protected $fillable = [
        'name',
    ];

    public function __toString()
    {
        return $this->name;
    }

    public function getDisplayName()
    {
        return $this->name;
    }

    public static function getForSelect2Query($q)
    {
        $query =  static::query()->select(
            'id', DB::raw('name as text'))
            ->Where("name", 'like', '%' . $q . '%');

        return $query;
    }
}
