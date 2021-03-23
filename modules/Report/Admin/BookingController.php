<?php

namespace Modules\Report\Admin;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Booking\Emails\NewBookingEmail;
use Modules\Booking\Events\BookingUpdatedEvent;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\BookingPaymentHistory;
use Modules\Financial\Models\PaymentMethod;
use Modules\PaymentTypeRate\Models\PaymentTypeRate;
use Modules\Situation\Models\Situation;

class BookingController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/report/booking');
    }

    public function index(Request $request)
    {
        $this->checkPermission('booking_view');
        $query = Booking::where('status', '!=', 'draft');
        if (!empty($request->s)) {
            if (is_numeric($request->s)) {
                $query->Where('id', '=', $request->s);
            } else {
                $query->where(function ($query) use ($request) {
                    $query->where('first_name', 'like', '%' . $request->s . '%')
                        ->orWhere('last_name', 'like', '%' . $request->s . '%')
                        ->orWhere('email', 'like', '%' . $request->s . '%')
                        ->orWhere('phone', 'like', '%' . $request->s . '%')
                        ->orWhere('address', 'like', '%' . $request->s . '%')
                        ->orWhere('address2', 'like', '%' . $request->s . '%');
                });
            }
        }

        if ($search = $request->query('situation_id')) {
            $query->where('situation_id', $search)->get();
        }

        if ($this->hasPermission('booking_manage_others')) {
            if (!empty($request->vendor_id)) {
                $query->where('vendor_id', $request->vendor_id);
            }
        } else {
            $query->where('vendor_id', Auth::id());
        }
        $query->whereIn('object_model', array_keys(get_bookable_services()));
        $query->orderBy('id', 'desc');
        $data = [
            'rows' => $query->paginate(20),
            'page_title' => __("All Bookings"),
            'booking_manage_others' => $this->hasPermission('booking_manage_others'),
            'booking_update' => $this->hasPermission('booking_update'),
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%Reservas%');
            })->get(),
            'paymentMethodList' => PaymentMethod::all(),
            'paymentTypeRateList' => PaymentTypeRate::all(),
        ];
        return view('Report::admin.booking.index', $data);
    }

    public function saveValidation(Request $request)
    {

        $booking = Booking::query()->find($request->booking_id);

        if (!empty($booking)) {
            $booking->is_contract = boolval($request->input('is_contract'));
            $booking->is_signature = boolval($request->input('is_signature'));
            $booking->is_commission = boolval($request->input('is_commission'));

            if ($booking->is_contract) {
                $booking->contract_name = $request->input('contract_name');
                $booking->contract_date = new DateTime();
            }

            if ($booking->is_signature) {
                $booking->signature_name = $request->input('signature_name');
                $booking->signature_date = new DateTime();
            }

            if ($booking->is_commission) {
                $booking->commission = floatval(str_replace('.', ',', $request->input('commission')));
                $booking->commission_date = new DateTime();
            }
        }

        $res = $booking->saveOriginOrTranslation();

        if ($res) {
            return response()->json([
                'success' => true,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Falha ao salvar Validação!"
            ], 200);
        }
    }

    public function saveValidationIndex()
    {
        return redirect(route('report.admin.booking'))->with('success', __('Validação Atualizada'));
    }

    public function savePaymentHistory(Request $request)
    {
        $booking = Booking::query()->find($request->booking_id);

        if (!$request->input('payment_value')) {
            return response()->json([
                'success' => false,
                'message' => "Favor Informa o valor!"
            ], 200);
        }

        if (!$request->input('payment_method')) {
            return response()->json([
                'success' => false,
                'message' => "Favor Informa o metodo de pagamento!"
            ], 200);
        }

        if (!$request->input('payment_type_rate')) {
            return response()->json([
                'success' => false,
                'message' => "Favor Informa o tipo de pagamento!"
            ], 200);
        }

        if (!empty($booking)) {
            $valueTotal = floatval($booking->total);
            $payment_value = floatval(str_replace('.', ',', $request->input('payment_value')));

            $booking->paid = $valueTotal - $payment_value;

            $res = $booking->saveOriginOrTranslation();

            if ($res) {
                $bookingPaymentHistory = new BookingPaymentHistory();
                $bookingPaymentHistory->booking_id = $booking->id;
                $bookingPaymentHistory->payment_value = $payment_value;
                $bookingPaymentHistory->payment_method_id = $request->input('payment_method');
                $bookingPaymentHistory->transaction_number = $request->input('transaction_number');;
                $bookingPaymentHistory->payment_type_rate_id = $request->input('payment_type_rate');
                $bookingPaymentHistory->status = "publish";

                $res2 = $bookingPaymentHistory->saveOriginOrTranslation();

                if ($res2) {
                    return response()->json([
                        'success' => true,
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => "Falha ao salvar pagamento!"
                    ], 200);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Falha ao salvar pagamento!"
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => "Falha ao localizar reserva!"
            ], 200);
        }
    }

    public function savePaymentHistoryIndex()
    {
        return redirect(route('report.admin.booking'))->with('success', __('Pagamento Atualizado'));
    }

    public function bulkEdit(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select action'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = Booking::where("id", $id);
                if (!$this->hasPermission('booking_manage_others')) {
                    $query->where("vendor_id", Auth::id());
                }
                $row = $query->first();
                if (!empty($row)) {
                    $row->delete();
                    event(new BookingUpdatedEvent($row));

                }
            }
        } else {
            foreach ($ids as $id) {
                $query = Booking::where("id", $id);
                if (!$this->hasPermission('booking_manage_others')) {
                    $query->where("vendor_id", Auth::id());
                    $this->checkPermission('booking_update');
                }
                $item = $query->first();
                if (!empty($item)) {
                    $item->status = $action;
                    $item->save();

                    if ($action == Booking::CANCELLED) $item->tryRefundToWallet();
                    event(new BookingUpdatedEvent($item));
                }
            }
        }
        return redirect()->back()->with('success', __('Update success'));
    }

    public function bulkSituation(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select action'));
        }

        foreach ($ids as $id) {
            $query = Booking::query()->where("id", $id);
            if (!$this->hasPermission('booking_manage_others')) {
                $query->where("vendor_id", Auth::id());
                $this->checkPermission('booking_update');
            }
            $item = $query->first();
            if (!empty($item)) {
                $item->situation_id = $action;
                $item->save();

                $cancelled = Situation::query()
                    ->whereHas('section', function ($query) {
                        $query->where('name', 'like', '%Reservas%');
                    })
                    ->where('name', 'like', '%Cancelada%')->get()->first();

                if ($action == $cancelled->id) $item->tryRefundToWallet();
                event(new BookingUpdatedEvent($item));
            }
        }

        return redirect()->back()->with('success', __('Update success'));
    }

    public function email_preview(Request $request, $id)
    {
        $booking = Booking::find($id);
        return (new NewBookingEmail($booking))->render();
    }
}
