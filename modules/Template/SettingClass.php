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
                "keys"=>[
                    'email_driver',
                    'email_host',
                    'email_port',
                    'email_encryption',
                    'email_username',
                    'email_password',
                    'email_mailgun_domain',
                    'email_mailgun_secret',
                    'email_mailgun_endpoint',
                    'email_postmark_token',
                    'email_ses_key',
                    'email_ses_secret',
                    'email_ses_region',
                    'email_sparkpost_secret',
                    'email_footer',
                    'email_header',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
