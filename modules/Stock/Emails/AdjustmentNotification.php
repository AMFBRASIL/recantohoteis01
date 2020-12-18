<?php
namespace Modules\Stock\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdjustmentNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $stockAdjusmentId = null;
    protected $stockData = null;

    public function __construct($id, $stockData)
    {
        $this->stockAdjusmentId = $id;
        $this->stockData = $stockData;
    }

    public function build()
    {
        $subject = __('[:site_name] Novo Ajuste de Estoque',['site_name' => env('APP_NAME')]);

        return $this->subject($subject)
            ->view('Stock::emails.stock_adjustment_notification')
            ->with(['id' => $this->stockAdjusmentId,  'stock_data' => $this->stockData]);
    }
}
