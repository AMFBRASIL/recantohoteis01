<?php

namespace Modules\Room\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Room\Models\Room;

class RoomController extends CrudController
{
    protected $modelName = Room::class;

    public function __construct()
    {
        $this->setActiveMenu(route('supplier.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Numeração UH',
        'page'      => 'Numeração UH',
        'create'    => 'Numeração UH',
        'edit'      => 'Numeração UH'
    ];

    protected $permissionList = [
        'index'     => 'room_view',
        'manage'    => 'room_manage_others',
        'create'    => 'room_create',
        'update'    => 'room_update',
        'delete'    => 'room_delete',
    ];

    protected $routeList = [
        'index'     => 'room.admin.index',
        'create'    => 'room.admin.create',
        'edit'      => 'room.admin.edit',
        'store'     => 'room.admin.store',
        'bulk'      => 'room.admin.bulkEdit',
        'recovery'  => 'room.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Room::admin.room.index',
        'edit'      => 'Room::admin.room.edit',
    ];

    protected $fieldSearchList = [
        'number'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }


}
