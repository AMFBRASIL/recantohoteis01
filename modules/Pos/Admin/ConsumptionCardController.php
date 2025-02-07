<?php

namespace Modules\Pos\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Financial\Models\BankAccount;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\PaymentMethod;
use Modules\Pos\Models\ConsumptionCard;
use Modules\Pos\Models\ConsumptionCardTranslation;
use Modules\Situation\Models\Situation;
use Modules\User\Models\User;

class ConsumptionCardController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/pos');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('consumptionCard_view');

        $consumptionCardList = new ConsumptionCard();

        $consumptionCardList = $consumptionCardList::query();

        if ($search = $request->query('s')) {
            $consumptionCardList->whereHas('user', function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%');;
            })->get();
        }

        $consumptionCardList = $consumptionCardList->orderby('situation_id', 'asc');

        $consumptionCard = new ConsumptionCard();
        $consumptionCard->transaction_date = new Carbon();

        $data = [
            'rows' => $consumptionCardList->paginate(20),
            'cost_center_others' => $this->hasPermission('cost_center_others'),
            'row' => $consumptionCard,
            'breadcrumbs' => [
                [
                    'name' => __('Pos'),
                    'url' => 'admin/module/pos'
                ],
            ],
            'translation' => new ConsumptionCardTranslation(),
            'bankAccountList' => BankAccount::all(),
            'paymentMethodList' => PaymentMethod::all(),
            'costCenterList' => CostCenter::all(),
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%CARTAO CONSUMO%');
            })->get(),
        ];

        return view('Pos::admin.consumptionCard.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('consumptionCard_update');
        $row = ConsumptionCard::query()->find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('post.admin.consumption.card.index');
        }
        $data = [
            'row' => $row,
            'translation' => $translation,
            'breadcrumbs' => [
                [
                    'name' => __('Pos'),
                    'url' => 'admin/module/pos'
                ],
            ],
            'enable_multi_lang' => true
        ];
        return view('Pos::admin.consumptionCard.detail', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('consumptionCard_update');
            $row = ConsumptionCard::query()->find($id);

            $situationClosed = ConsumptionCard::getClosedSituation();

            if (empty($row)) {
                return redirect(route('pos.admin.consumption.card.index'));
            } else {
                $row->transaction_date = new Carbon();
                $row->fill($request->input());

                $historical = $row->historical()->orderByDesc('created_at')->first();
                $historical->situation_id = $situationClosed->id;
                $historical->date_closing = new Carbon();
                $historical->saveOriginOrTranslation($request->input('lang'));

                if ($situationClosed->id != $row->situation_id) {

                    $valueCard = $row->value_card + floatval($request->input('priceAdd'));

                    $row->value_card = number_format($valueCard, 2, ',', '.');
                    $row->saveOriginOrTranslation();

                    $row->createHistory($row);
                    $row->createRevenue($row);
                } else {
                    $row->date_closing = new Carbon();
                    $row->saveOriginOrTranslation($request->input('lang'));
                    return redirect(route('pos.admin.consumption.card.index'))->with('success', __('Consumption Card Closed'));
                }

                return back()->with('success', __('Consumption Card Updated'));
            }
        } else {
            $this->checkPermission('consumptionCard_create');
            $row = new ConsumptionCard();
            $row->transaction_date = new Carbon();
            $row->fill($request->input());
            $row->status = "publish";

            $row->saveOriginOrTranslation($request->input('lang'));

            $row->createHistory($row);
            $row->createRevenue($row);

            return redirect(route('pos.admin.consumption.card.index'))->with('success', __('Consumption Card Created'));
        }
    }


    public function bulkEdit(Request $request)
    {

        $this->checkPermission('consumptionCard_update');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $this->checkPermission('consumptionCard_delete');
                $query = ConsumptionCard::query()->where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        } else if ($action == "clone") {
            $this->checkPermission('cost_center_create');
            foreach ($ids as $id) {
                (new ConsumptionCard)->saveCloneByID($id);
            }
        } else {
            foreach ($ids as $id) {
                $query = ConsumptionCard::query()->where("id", $id);
                if (!$this->hasPermission('consumptionCard_manage_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('news_update');
                }
                $query->update(['status' => $action]);
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }

    public function historyConsumerCard(Request $request, $id)
    {
        return redirect(route('pos.admin.history.consumption.card.index'));
    }

    public function findCard(Request $request)
    {
        $card_number = $request->card_number;

        if (!is_null($card_number)) {

            $card = ConsumptionCard::query()->where('card_number', '=', $card_number)->first();
            $user = User::query()->find($card->user_id);
            $cash_payment = PaymentMethod::query()
                ->where('name','like', '%dinheiro%')->get('id')->first();
            if (!empty($card)) {
                return response()->json([
                    'success' => true,
                    'cardData' => [
                        'card' => $card,
                        'user' => $user,
                        'cash_payment' => $cash_payment->id,
                        'situation' => $card->situation->name,
                    ]
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "número de cartao não encontrado"
                ], 200);
            }
        }

        return response()->json([
            'success' => false,
            'message' => "número do cartao não Informada!"
        ], 200);
    }
}
