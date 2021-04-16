<?php

namespace Modules\Tariff\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Base\Admin\CrudController;
use Modules\Characteristic\Models\Characteristic;
use Modules\Classification\Models\Classification;
use Modules\Situation\Models\Situation;
use Modules\Tariff\Models\Tariff;

class TariffController extends CrudController
{
    protected $modelName = Tariff::class;

    public function __construct()
    {
        $this->setActiveMenu(route('supplier.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Tarifador do Hotel por Lotação',
        'page'      => 'Tarifador do Hotel por Lotação',
        'create'    => 'Edit',
        'edit'      => 'Edit'
    ];

    protected $permissionList = [
        'index'     => 'tariff_view',
        'manage'    => 'tariff_manage_others',
        'create'    => 'tariff_create',
        'update'    => 'tariff_update',
        'delete'    => 'tariff_delete',
    ];

    protected $routeList = [
        'index'     => 'tariff.admin.index',
        'create'    => 'tariff.admin.create',
        'edit'      => 'tariff.admin.edit',
        'store'     => 'tariff.admin.store',
        'bulk'      => 'tariff.admin.bulkEdit',
        'recovery'  => 'tariff.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Tariff::admin.tariff.index',
        'edit'      => 'Tariff::admin.tariff.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }


    public function index(Request $request)
    {
        $this->checkPermission($this->permissionList['create']);

        $query = $this->modelName::query();
        $query->orderBy('id', 'desc');

        if (!empty($s = $request->input('s'))) {
            foreach ($this->fieldSearchList as $field) {
                $query->where($field, 'LIKE', '%' . $s . '%');
            }
        }

        if ($this->hasPermission($this->permissionList['manage'])) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('create_user', $author);
            }
        } else {
            $query->where('create_user', Auth::id());
        }

        $data = [
            'row'               => new Tariff(),
            'rows'              => $query->with(['author'])->paginate(20),
            'permission_manage' => $this->hasPermission($this->permissionList['manage']),
            'page_title'        => $this->titleList['page'],
            'route_list'        => $this->routeList,
            'breadcrumbs'       => [
                [
                    'name'  => __("{$this->titleList['page']}"),
                    'class' => 'active'
                ],
            ],
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%Tarifador%');
            })->get(),
            'classificationList' => Classification::all(),
            'characteristicList' => Characteristic::all(),
        ];

        return view($this->viewList['index'], $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission($this->permissionList['update']);
        $model = $this->modelName::find($id);
        if (empty($model)) {
            return redirect(route($this->routeList['index']));
        }

        $translation = $model->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission($this->permissionList['manage'])) {
            if ($model->create_user != Auth::id()) {
                return redirect(route($this->routeList['index']));
            }
        }

        $data = [
            'row'               => $model,
            'translation'       => $translation,
            'enable_multi_lang' => true,
            'route_list'        => $this->routeList,
            'breadcrumbs'       => [
                [
                    'name'  => __("{$this->titleList['page']}"),
                    'url'   => route($this->routeList['index'])
                ],
                [
                    'name'  => __("{$this->titleList['create']}"),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("{$this->titleList['edit']}"),
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%Tarifador%');
            })->get(),
            'classificationList' => Classification::all(),
            'characteristicList' => Characteristic::all(),
        ];

        return view($this->viewList['edit'], $data);
    }

}
