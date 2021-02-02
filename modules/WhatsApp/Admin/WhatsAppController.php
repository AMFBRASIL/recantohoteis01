<?php

namespace Modules\WhatsApp\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\WhatsApp\Core\Facade\WhatsApp;
use Propaganistas\LaravelPhone\PhoneNumber;

class WhatsAppController extends AdminController
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
            WhatsApp::to($to)->content($message)->send();
            return response()->json(['error' => false], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'messages' => $e->getMessage()], 200);
        }
    }
}
