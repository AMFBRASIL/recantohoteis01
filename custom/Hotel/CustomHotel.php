<?php
namespace Custom\Hotel;

use Modules\Booking\Models\Bookable;

class CustomHotel extends Bookable {
    public    $hotel_inspection_term = 'Hotel::frontend/booking/inspection-term-modal';
    public    $hotel_contract = 'Hotel::frontend/booking/contract-modal';
    public    $hotel_internal_regime = 'Hotel::frontend/booking/internal-regimel-modal';
}

?>
