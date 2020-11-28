<?php

namespace Modules\Reservation\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Reservation\Models\ReservationType;

class CheckAvailabilityController extends CrudController
{
    protected $modelName = ReservationType::class;

    public function __construct()
    {
        $this->setActiveMenu(route('reservation.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Verificar disponibilidades',
        'page'      => 'Verificar disponibilidades',
        'create'    => 'Verificar disponibilidade',
        'edit'      => 'Verificar disponibilidade'
    ];

    protected $permissionList = [
        'index'     => 'check_availability_view',
        'manage'    => 'check_availability_manage_others',
        'create'    => 'check_availability_create',
        'update'    => 'check_availability_update',
        'delete'    => 'check_availability_delete',
    ];

    protected $routeList = [
        'index'     => 'check_availability.admin.index',
        'create'    => 'check_availability.admin.create',
        'edit'      => 'check_availability.admin.edit',
        'store'     => 'check_availability.admin.store',
        'bulk'      => 'check_availability.admin.bulkEdit',
        'recovery'  => 'check_availability.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Reservation::admin.check_availability.index',
        'edit'      => 'Reservation::admin.check_availability.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index'], $model->id);
    }


}
