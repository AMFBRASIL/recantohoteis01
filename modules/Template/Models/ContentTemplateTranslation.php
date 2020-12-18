<?php

namespace Modules\Template\Models;

class ContentTemplateTranslation extends ContentTemplate
{
    protected $table = 'bravo_content_template_translations';

    protected $fillable = [
        'title',
        'subject',
        'code',
        'content',
        'use_system',
        'use_email',
        'use_whatsapp',
        'use_sms',
    ];

    protected $slugField     = false;
    protected $seo_type = 'bravo_content_template_translation';
}
