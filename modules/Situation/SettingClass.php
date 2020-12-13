<?php
namespace  Modules\Situation;

use Modules\Core\Abstracts\BaseSettingsClass;

class SettingClass extends BaseSettingsClass
{

    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'situation',
                'title' => __("Situação Geral"),
                'position' => 92,
                'view'=>"Situation::admin.situation.index",
                'url_module'=> route('situation.admin.index'),
                "keys"=>[],
                'html_keys'=>[]
            ]
        ];
    }
}
