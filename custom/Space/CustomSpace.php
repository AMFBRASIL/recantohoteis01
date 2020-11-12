<?php
namespace Custom\Space;

use Modules\Booking\Models\Bookable;

class CustomSpace extends Bookable {
    public    $space_inspection_term = 'Space::frontend/booking/inspection-term-modal';
    public    $space_contract = 'Space::frontend/booking/contract-modal';
    public    $space_internal_regime = 'Space::frontend/booking/internal-regimel-modal';
}

?>
