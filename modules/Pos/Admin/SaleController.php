<?php

namespace Modules\Pos\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Financial\Models\PaymentMethod;
use Modules\PointOfSale\Models\PointOfSale;
use Modules\Pos\Models\AuthorizationPassword;
use Modules\Pos\Models\ConsumptionCard;
use Modules\Pos\Models\Sale;
use Modules\Pos\Models\SaleTranslation;
use Modules\Product\Models\Product;
use Modules\Situation\Models\Situation;

class SaleController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/pos');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('newSale_view');

        $modelList = new Sale();

        $modelList = $modelList::query();

        if ($search = $request->query('s')) {
            $modelList->whereHas('user', function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%');;
            })->get();
        }

        $modelList = $modelList->orderby('id', 'asc');

        $data = [
            'rows' => $modelList->paginate(20),
            'row' => new Sale(),
            'breadcrumbs' => [
                [
                    'name' => __('Pos'),
                    'url' => 'admin/module/pos'
                ],
            ],
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%vendas%');
            })->get()
        ];

        return view('Pos::admin.sale.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('newSale_create');
        $row = new Sale();
        $row->fill([
            'status' => 'publish'
        ]);
        $data = [
            'row' => $row,
            'translation' => new SaleTranslation(),
            'breadcrumbs' => [
                [
                    'name' => __('Hotels'),
                    'url' => 'admin/module/hotel'
                ],
                [
                    'name' => __('Add Hotel'),
                    'class' => 'active'
                ],
            ],
            'pointSalesList' => PointOfSale::all(),
            'paymentMethodList' => PaymentMethod::all(),
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%Vendas%');
            })->get()
        ];
        return view('Pos::admin.sale.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('newSale_update');
        $row = Sale::query()->find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('pos.admin.sale.index');
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
            'enable_multi_lang' => true,
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%SENHAS%');
            })->get()
        ];
        return view('Pos::admin.sale.detail', $data);
    }

    public function store(Request $request, $id)
    {
        if ($id > 0) {
            $this->checkPermission('newSale_update');
            $row = Sale::query()->find($id);
            if (empty($row)) {
                return redirect(route('pos.admin.sale.index'));
            }
        } else {
            $this->checkPermission('newSale_create');
            $row = new Sale();
            $row->status = "publish";
        }

        $row->fill($request->input());

        $this->updateCarConsumer($row->card_number, $request->input('value_card'),$request->input('value_consumed'));
        $this->updateProduct($row->product_composition);

        $row->sales_date = new Carbon();
        $row->discounts_value = str_replace('.', ',',$row->discounts_value);
        $row->received_value = str_replace('.', ',',$row->received_value);
        $row->total_value = str_replace('.', ',',$row->total_value);

        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if ($id > 0) {
                return back()->with('success', __('Sale Updated'));
            } else {
                return redirect(route('pos.admin.sale.index'))->with('success', __('Sale Created'));
            }
        }
    }

    function updateCarConsumer($card_number, $value_card, $value_consumed){
        $card = ConsumptionCard::query()->where('card_number', '=', $card_number)->first();

        $card->value_card = str_replace('.', ',',$value_card);
        $card-> value_consumed = str_replace('.', ',',$value_consumed);

        $card->saveOriginOrTranslation();
    }

    function updateProduct($products){
        foreach ($products as $item){
            $product = Product::query()->find($item['product_id']);
            $product->available_stock = $product->available_stock - $item['quantity'];
            $product->saveOriginOrTranslation();
        }
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('newSale_update');
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
                $this->checkPermission('newSale_delete');
                $query = AuthorizationPassword::query()->where("id", $id)->first();
                if (!empty($query)) {
                    $query->delete();
                }
            }
        } else if ($action == "clone") {
            $this->checkPermission('newSale_create');
            foreach ($ids as $id) {
                (new AuthorizationPassword)->saveCloneByID($id);
            }
        } else {
            foreach ($ids as $id) {
                $query = AuthorizationPassword::query()->where("id", $id);
                if (!$this->hasPermission('newSale_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('newSale_update');
                }
                $query->update(['status' => $action]);
            }
        }

        return redirect()->back()->with('success', __('Update success!'));
    }

    public function getSales(Request $request)
    {
        $sale = Sale::query()->find($request->id);
        $card = ConsumptionCard::query()->where('card_number', '=', $sale->card_number)->first();

        return response()->json([
            'sale' => $sale,
            'card' => $card,
            'created_at' => $sale->created_at->format('d/m/y h:m:s')
        ]);
    }

    public function getSalesCard(Request $request)
    {
        $card = ConsumptionCard::query()->find($request->id);
        $sale = Sale::query()->where('card_number', '=', $card->card_number)->orderBy('created_at','DESC')->first();
        return response()->json([
            'sale' => $sale,
            'card' => $card,
            'created_at' => $sale->created_at->format('d/m/y h:m:s')
        ]);
    }

}
