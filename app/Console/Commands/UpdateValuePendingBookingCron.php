<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Booking\Models\Booking;

class UpdateValuePendingBookingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateValuePendingBooking:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Update values Pending Bookingw';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");

        $bookings = Booking::all();

        foreach ($bookings as $b){
            $totalPending = floatval($b->total) - floatval($b->paid);
            $b->total_pending = $totalPending;
            $b->save();
        }

        $this->info('updateValuePendingBooking:Cron Cummand Run successfully!');
    }
}
