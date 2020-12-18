<?php

namespace Modules\Base\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;

class CrudController extends AdminController
{
    protected $modelName = null;
    protected $parentName = '';
    protected $parentField = '';

    protected $titleList = [
        'index'     => '',
        'page'      => '',
        'create'    => '',
        'edit'      => ''
    ];

    protected $permissionList = [
        'index'     => '',
        'manage'    => '',
        'create'    => '',
        'update'    => '',
        'delete'    => '',
    ];

    protected $routeList = [
        'index'     => '',
        'create'    => '',
        'edit'      => '',
        'store'     => '',
        'bulk'      => '',
        'recovery'  => '',
    ];

    protected $viewList = [
        'index'     => '',
        'edit'      => '',
    ];

    protected $fieldSearchList = [
        'content'
    ];

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
        ];

        return view($this->viewList['index'], $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission($this->permissionList['create']);
        $model = new $this->modelName();
        $translation = $model->translateOrOrigin($request->query('lang'));
        $model->fill(['status' => 'publish']);
        $data = [
            'row'           => $model,
            'page_title'    =>__("{$this->titleList['create']}"),
            'route_list'    => $this->routeList,
            'translation'   => $translation,
            'breadcrumbs'   => [
                [
                    'name'  => __("{$this->titleList['page']}"),
                    'url'   => route($this->routeList['index'])
                ],
                [
                    'name'  => __("{$this->titleList['create']}"),
                    'class' => 'active'
                ],
            ],
        ];

        return view($this->viewList['edit'], $data);
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
            'page_title'=>__("{$this->titleList['edit']}")
        ];

        return view($this->viewList['edit'], $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission($this->permissionList['update']);
            $model = $this->modelName::find($id);
            if (empty($model)) {
                return redirect(route($this->routeList['index']));
            }

            if ($model->create_user != Auth::id() and !$this->hasPermission($this->permissionList['change'])) {
                return redirect(route($this->routeList['index']));
            }

        } else {
            $this->checkPermission($this->permissionList['create']);
            $model = new $this->modelName();
            $model->status = 'publish';
        }

        $model->fill($request->input());
        if($this->hasPermission($this->permissionList['manage'])){
            $model->create_user = $request->input('create_user');
        }

        $this->beforeSaveModel($model);
        $res = $model->saveOriginOrTranslation($request->input('lang'),true);
        if ($res) {
            if($id > 0 ){
                $this->afterSaveModel($model);
                return back()->with('success',  __('Registro Atualizado.') );
            } else {
                $this->afterSaveModel($model);
                return redirect($this->redirectUrlAfterStore($model))
                    ->with('success', __('Registro Criado.') );
            }
        }

        return back()->with('error',  __('Erro ao salvar') );
    }

    protected function beforeSaveModel($model)
    {
        // @todo
    }

    protected function afterSaveModel($model)
    {
        // @todo
    }

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['edit'], $model->id);
    }

    protected function bulkDelete($ids)
    {
        foreach ($ids as $id) {
            $query = $this->modelName::where("id", $id);
            if (!$this->hasPermission($this->permissionList['manage'])) {
                $query->where("create_user", Auth::id());
            }

            $query->first();
            if (!empty($query)) {
                $query->get()->first()->delete();
            }
        }
    }

    protected function bulkRecovery($ids)
    {
        foreach ($ids as $id) {
            $query = $this->modelName::where("id", $id);
            if (!$this->hasPermission($this->permissionList['manage'])) {
                $query->where("create_user", Auth::id());
            }

            $query->first();
            if (!empty($query)) {
                $query->restore();
            }
        }
    }

    protected function bulkClone($ids)
    {
        foreach ($ids as $id) {
            (new $this->modelName())->saveCloneByID($id);
        }
    }

    protected function bulkUpdate($ids, $action)
    {
        // Change status
        foreach ($ids as $id) {
            $query = $this->modelName::where("id", $id);
            if (!$this->hasPermission($this->permissionList['change'])) {
                $query->where("create_user", Auth::id());
            }
            $query->update(['status' => $action]);
        }
    }

    public function bulkEdit(Request $request)
    {
        $ids = $request->input('ids');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }

        $action = $request->input('action');
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }

        switch ($action){
            case "delete":
                $this->checkPermission($this->permissionList['delete']);
                $this->bulkDelete($ids);

                return redirect()->back()->with('success', __('Registro removido com sucesso.'));
                break;
            case "recovery":
                $this->checkPermission($this->permissionList['delete']);
                $this->bulkRecovery($ids);

                return redirect()->back()->with('success', __('Registro recuperado com sucesso.'));
                break;
            case "clone":
                $this->checkPermission($this->permissionList['create']);
                $this->bulkClone($ids);

                return redirect()->back()->with('success', __('Registro clonado com sucesso.'));
                break;
            default:
                $this->checkPermission($this->permissionList['update']);
                $this->bulkUpdate($ids, $action);

                return redirect()->back()->with('success', __('Registro atualizado com sucesso'));
                break;
        }
    }

    public function indexWithParent(Request $request, $parent_id)
    {
        $this->checkPermission($this->permissionList['create']);

        $parent = $this->parentName::findOrFail($parent_id);

        $query = $this->modelName::query();
        $query->orderBy('id', 'desc');
        $query->where($this->parentField, $parent_id);

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
            'parent'            => $parent,
            'rows'              => $query->with(['author'])->paginate(20),
            'permission_manage' => $this->hasPermission($this->permissionList['manage']),
            'page_title'        => sprintf('%s: %s', __('Empreendimento'), $parent->name),
            'route_list'        => $this->routeList,
            'breadcrumbs'       => [
                [
                    'name'  => __("{$this->titleList['page']}"),
                    'class' => 'active'
                ],
            ],
        ];

        return view($this->viewList['index'], $data);
    }

    public function editWithParent(Request $request, $parent_id, $id)
    {
        $this->checkPermission($this->permissionList['update']);

        $parent = $this->parentName::findOrFail($parent_id);
        $model = $this->modelName::find($id);
        if (empty($model)) {
            return redirect(route($this->routeList['index'], $parent_id));
        }

        $translation = $model->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission($this->permissionList['manage'])) {
            if ($model->create_user != Auth::id()) {
                return redirect(route($this->routeList['index']));
            }
        }

        $data = [
            'parent'            => $parent,
            'row'               => $model,
            'translation'       => $translation,
            'enable_multi_lang' => true,
            'route_list'        => $this->routeList,
            'breadcrumbs'       => [
                [
                    'name'  => __("{$this->titleList['page']}"),
                    'url'   => route($this->routeList['index'], $parent_id)
                ],
                [
                    'name'  => __("{$this->titleList['create']}"),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("{$this->titleList['edit']}")
        ];

        return view($this->viewList['edit'], $data);
    }

    public function storeWithParent(Request $request, $parent_id, $id = 0)
    {
        $parent = $this->parentName::findOrFail($parent_id);
        if ($id > 0) {
            $this->checkPermission($this->permissionList['update']);
            $model = $this->modelName::find($id);
            if (empty($model)) {
                return redirect(route($this->routeList['index'], $parent_id));
            }

            if ($model->create_user != Auth::id() and !$this->hasPermission($this->permissionList['change'])) {
                return redirect(route($this->routeList['index'], $parent_id));
            }

        } else {
            $this->checkPermission($this->permissionList['create']);
            $model = new $this->modelName();
            $model->status = 'publish';
        }

        $model->fill($request->input());
        $parentField = $this->parentField;
        $model->$parentField = $parent->id;
        if($this->hasPermission($this->permissionList['manage'])){
            $model->create_user = $request->input('create_user');
        }

        $res = $model->saveOriginOrTranslation($request->input('lang'),true);
        if ($res) {
            if($id > 0 ){
                return back()->with('success',  __('Registro Atualizado.') );
            } else {
                return redirect($this->redirectUrlAfterStore($model))
                    ->with('success', __('Registro Criado.') );
            }
        }

        return back()->with('error',  __('Erro ao salvar') );
    }
}
