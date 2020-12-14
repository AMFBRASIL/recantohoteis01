<?php

namespace Modules\Template\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Template\Models\ContentTemplate;

class ContentTemplateController extends CrudController
{
    protected $modelName = ContentTemplate::class;

    public function __construct()
    {
        $this->setActiveMenu('admin/module/core/settings/index/general');
    }

    protected $titleList = [
        'index'     => 'Templates',
        'page'      => 'Templates',
        'create'    => 'Template',
        'edit'      => 'Template'
    ];

    protected $permissionList = [
        'index'     => 'content_template_view',
        'manage'    => 'content_template_manage_others',
        'create'    => 'content_template_create',
        'update'    => 'content_template_update',
        'delete'    => 'content_template_delete',
    ];

    protected $routeList = [
        'index'     => 'content_template.admin.index',
        'create'    => 'content_template.admin.create',
        'edit'      => 'content_template.admin.edit',
        'store'     => 'content_template.admin.store',
        'bulk'      => 'content_template.admin.bulkEdit',
        'recovery'  => 'content_template.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Template::admin.content_template.index',
        'edit'      => 'Template::admin.content_template.edit',
    ];

    protected $fieldSearchList = [
        'title'
    ];
}
