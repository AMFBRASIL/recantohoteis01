<?php
namespace Modules\Stock\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendBudgetNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $budgetId = null;
    protected $budgetData = null;

    public function __construct($id, $budgetData)
    {
        $this->budgetId = $id;
        $this->budgetData = $budgetData;
    }

    public function build()
    {
        $subject = __('[:site_name] Nova Cotação',['site_name' => env('APP_NAME')]);

        return $this->subject($subject)
            ->view('Stock::emails.send_budget_notification')
            ->with(['id' => $this->budgetId,  'budget_data' => $this->budgetData]);
    }
}
