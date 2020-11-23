<?php

namespace Modules\Stock\Jobs;

use Modules\Product\Models\Product;
use Modules\Stock\Emails\AdjustmentNotification;
use Modules\Stock\Models\StockAdjustment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AdjustmentStock implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $adjustment = null;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(StockAdjustment $adjustment)
    {
        $this->adjustment = $adjustment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mailData = [];
        foreach ($this->adjustment->product_composition as $key => $composition) {
            $product = Product::find($composition['product_id']);
            $newStock = $this->adjustment->getStockUpdatedFromValue($composition['quantity'], $product->available_stock);
            $mailData[$key] = [
                'product' => $product->title,
                'old_stock' => $product->available_stock,
                'old_price' => $product->price,
                'new_stock' => $newStock,
                'new_price' => $composition['price']
            ];

            $product->available_stock = $newStock;
            $product->price = $composition['price'];
            $product->save();
        }

        $mailList = [];
        if ($this->adjustment->send_section_mail) {
            $mailList[] = env("EMAIL_ADMINISTRATIVO");
        }

        if ($this->adjustment->send_supplier_mail) {
            $mailList[] = env("EMAIL_ESTOQUE");
        }

        foreach($mailList as $recipient) {
            Mail::to($recipient)
                ->send(new AdjustmentNotification($this->adjustment->id, $mailData));
        }
    }
}
