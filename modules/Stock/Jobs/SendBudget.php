<?php

namespace Modules\Stock\Jobs;

use Modules\Base\Jobs\Middleware\InitConfigsFromDatabase;
use Modules\Core\Models\Settings;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductUnity;
use Modules\Stock\Emails\SendBudgetNotification;
use Modules\Stock\Models\Budget;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Supplier\Models\Supplier;

class SendBudget implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $budget = null;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Budget $budget)
    {
        $this->budget = $budget;
    }

    public function middleware()
    {
        return [new InitConfigsFromDatabase];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mailData = [];
        foreach ($this->budget->product_composition as $key => $composition) {
            $product = Product::find($composition['product_id'] ?? '');
            $unity = ProductUnity::find($composition['unity'] ?? '');
            $mailData[$key] = [
                'product' => $product->title ?? '',
                'quantity' => $composition['quantity'],
                'unity' => $unity->acronym ?? '',
                'price' => $composition['price']
            ];
        }

        $mailList = [];
        if ($this->budget->send_adm_mail) {
            $mailList[] = Settings::item('email_adm');
        }

        if ($this->budget->send_stock_mail) {
            $mailList[] = Settings::item('email_estoque');
        }

        if ($this->budget->send_manager_mail) {
            $mailList[] = Settings::item('email_manager');
        }

        if ($this->budget->send_suppliers_mail) {
            foreach ($this->budget->supplier_composition as $composition) {
                $supplier = Supplier::find($composition['supplier_id']);
                if ($supplier->email) {
                    $mailList[] = $supplier->email;
                }
            }
        }

        foreach($mailList as $recipient) {
            Mail::to($recipient)
                ->send(new SendBudgetNotification($this->budget->id, $mailData));
        }
    }
}
