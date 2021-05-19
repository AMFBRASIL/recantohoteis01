<?php

namespace Modules\Reservation\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Reservation\Models\ReservationType;

class ReservationTypeController extends CrudController
{
    protected $modelName = ReservationType::class;

    public function __construct()
    {
        $this->setActiveMenu(route('reservation.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Canais de Venda',
        'page'      => 'Canais de Venda',
        'create'    => 'Canal de Venda',
        'edit'      => 'Canal de Venda'
    ];

    protected $permissionList = [
        'index'     => 'reservation_type_view',
        'manage'    => 'reservation_type_manage_others',
        'create'    => 'reservation_type_create',
        'update'    => 'reservation_type_update',
        'delete'    => 'reservation_type_delete',
    ];

    protected $routeList = [
        'index'     => 'reservation_type.admin.index',
        'create'    => 'reservation_type.admin.create',
        'edit'      => 'reservation_type.admin.edit',
        'store'     => 'reservation_type.admin.store',
        'bulk'      => 'reservation_type.admin.bulkEdit',
        'recovery'  => 'reservation_type.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Reservation::admin.reservation_type.index',
        'edit'      => 'Reservation::admin.reservation_type.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index'], $model->id);
    }


    public function reservationType(){
        return ReservationType::all();
    }
}
