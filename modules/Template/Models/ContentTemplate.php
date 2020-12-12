<?php

namespace Modules\Template\Models;

use Modules\Base\Models\Model;

class ContentTemplate extends Model
{
    public $type = 'content_template';
    protected $table = 'bravo_content_templates';
    protected $modelName = ContentTemplate::class;
    protected $transClass = ContentTemplateTranslation::class;
    protected $fieldClone = "title";

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

    public function getCodeGeneratedAttribute()
    {
        return strtoupper(substr(uniqid('RC'), 0 , 9));
    }

    public function __toString()
    {
        return $this->title;
    }
}
