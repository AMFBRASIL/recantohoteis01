<?php

namespace Modules\Base\Models;

use Modules\Booking\Models\Bookable;
use Modules\Core\Models\SEO;

class Model extends Bookable
{
    public $type = '';
    protected $table = '';
    protected $modelName = '';
    protected $transClass = '';
    protected $fieldClone = '';

    public static function getConditionalFormattedAttribute($value)
    {
        if (! $value) {
            return __('Não');
        }

        return __('Sim');
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function saveCloneByID($clone_id)
    {
        $old = $this->modelName::find($clone_id);
        if (empty($old)) {
            return false;
        }

        $new = $old->replicate();
        if (!empty($this->fieldClone)) {
            $field = $this->fieldClone;
            $new->$field = $old->$field . " - Copy";
        }
        $new->save();

        //Language
        $langs = $this->transClass::where("origin_id", $old->id)->get();
        if (empty($langs)) {
            return;
        }

        foreach ($langs as $lang) {
            $langNew = $lang->replicate();
            $langNew->origin_id = $new->id;
            $langNew->save();
            $langSeo = SEO::where('object_id', $lang->id)
                ->where('object_model', $lang->getSeoType() . "_" . $lang->locale)
                ->first();

            if (!empty($langSeo)) {
                $langSeoNew = $langSeo->replicate();
                $langSeoNew->object_id = $langNew->id;
                $langSeoNew->save();
            }
        }
    }

    public function __toString()
    {
        return '#';
    }
}
