<?php

namespace Modules\Pos\Admin;

use Illuminate\Http\Request;
use Modules\Base\Admin\CrudController;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\PaymentMethod;
use Modules\Pos\Models\ConsumptionCard;
use Modules\Pos\Models\HistoricalConsumerCard;
use Modules\Situation\Models\Situation;
use Modules\User\Models\User;

class HistoricalConsumerCardController extends CrudController
{
    protected $modelName = HistoricalConsumerCard::class;
    protected $parentName = ConsumptionCard::class;
    protected $parentField = 'consumption_card_id';

    protected $titleList = [
        'index' => 'Historical Consumer Cards',
        'page' => 'Historical Consumer Cards',
        'create' => 'Historical Consumer Card',
        'edit' => 'Historical Consumer Card',
        'closed' => 'Fechamento de Consumo',
    ];

    protected $permissionList = [
        'index' => 'history_consumptionCard_view',
        'manage' => 'history_consumptionCard_manage_others',
        'create' => 'history_consumptionCard_create',
        'update' => 'history_consumptionCard_update',
        'delete' => 'history_consumptionCard_delete',
    ];

    protected $routeList = [
        'index' => 'pos.admin.historical.consumer.card.index',
        'create' => 'pos.admin.historical.consumer.card.create',
        'edit' => 'pos.admin.historical.consumer.card.edit',
        'store' => 'pos.admin.historical.consumer.card.store',
        'bulk' => 'pos.admin.historical.consumer.card.bulkEdit',
    ];

    protected $viewList = [
        'index' => 'Pos::admin.historicalConsumerCard.index',
        'edit' => 'Pos::admin.historicalConsumerCard.edit',
        'closed' => 'Pos::admin.historicalConsumerCard.closed'
    ];

    protected $fieldSearchList = [
        'situation'
    ];

    public function indexWithParent(Request $request, $parent_id)
    {
        $this->checkPermission($this->permissionList['create']);
        $parent = $this->parentName::findOrFail($parent_id);

        $parent->card_transaction_number = null;

        $query = $this->modelName::query();
        $query->orderBy('id', 'desc');
        $query->where($this->parentField, $parent_id);

        if ($search = $request->input('s')) {
            $query->whereHas('situation', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }

        $data = [
            'parent' => $parent,
            'rows' => $query->paginate(20),
            'route_list' => $this->routeList,
            'breadcrumbs' => [
                [
                    'name' => __("{$this->titleList['page']}"),
                    'class' => 'active'
                ],
            ],
            'bankAccountList' => BankAccount::all(),
            'paymentMethodList' => PaymentMethod::all(),
            'costCenterList' => CostCenter::all(),
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%CARTAO DE CONSUMO%');
            })->get()
        ];

        return view($this->viewList['index'], $data);
    }

    public function closed(Request $request, $parent_id)
    {
        $this->checkPermission($this->permissionList['update']);
        $parent = $this->parentName::findOrFail($parent_id);

        $parent->card_transaction_number = null;

        $query = $this->modelName::query();
        $query->orderBy('id', 'desc');
        $query->where($this->parentField, $parent_id);

        if (!empty($s = $request->input('s'))) {
            foreach ($this->fieldSearchList as $field) {
                $query->where($field, 'LIKE', '%' . $s . '%');
            }
        }

        $data = [
            'parent' => $parent,
            'rows' => $query->paginate(20),
            'route_list' => $this->routeList,
            'breadcrumbs' => [
                [
                    'name' => __("{$this->titleList['page']}"),
                    'class' => 'active'
                ],
            ],
            'situationClosed' => ConsumptionCard::getClosedSituation()
        ];

        return view($this->viewList['closed'], $data);
    }

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index'], $model->cost_center_id);
    }

    public function findHistoricalCard(Request $request)
    {
        $historicalCard = HistoricalConsumerCard::query()->where('id', '=', $request->id)->first();
        $user = User::query()->find($historicalCard->user_id);

        return response()->json([
            'success' => true,
            'historicalData' => [
                'historicalCard' => $historicalCard,
                'situation' => $historicalCard->situation->name,
                'user' => $user,
            ]
        ], 200);
    }
}
