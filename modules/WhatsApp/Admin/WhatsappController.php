<?php

namespace Modules\WhatsApp\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\WhatsApp\Core\Facade\Whatsapp;
use Propaganistas\LaravelPhone\PhoneNumber;

class WhatsappController extends AdminController
{
    public function testWhatsApp(Request $request)
    {
        $to = $request->to;
        $message = $request->message;
        $this->validate($request, [
            'to' => 'required',
            'message' => 'required',
            'country' => 'required',
        ]);
        try {
            $to = (string)PhoneNumber::make($to)->ofCountry($request->country);
            Whatsapp::to($to)->content($message)->send();
            return response()->json(['error' => false], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'messages' => $e->getMessage()], 200);
        }
    }
}
