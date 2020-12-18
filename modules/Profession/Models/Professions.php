<?php

namespace Modules\Profession\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professions extends BaseModel
{
    use SoftDeletes;

    protected $table = 'bravo_professions';

    protected $fillable = [
        'name',
        'status',
    ];

    protected $slugField = 'slug';

    protected $slugFromField = 'name';

    protected $seo_type = 'professions';

    public static function getModelName()
    {
        return __("News System Profession");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function getDetailUrl($locale = false)
    {
        return route('profession.detail', ['slug' => $this->slug]);
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('profession.admin.edit', ['id' => $this->id, "lang" => $lang]);
    }
}
