<?php
namespace  Modules\Template;

use Modules\Core\Abstracts\BaseSettingsClass;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'content_template',
                'title' => __("Content Templates"),
                'position'=>91,
                'view'=>"Template::admin.content_template.index",
                'url_module'=> route('content_template.admin.index'),
                "keys"=>[],
                'html_keys'=>[]
            ]
        ];
    }
}
