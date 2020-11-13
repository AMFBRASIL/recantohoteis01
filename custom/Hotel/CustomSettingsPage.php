<?php
namespace Custom\Hotel;

class CustomSettingsPage {
    public function customSettings($array) {
        $custom = [
            'hotel_contract',
            'hotel_contract_title',
            'hotel_inspection_term',
            'hotel_inspection_term_title',
            'hotel_internal_regime',
            'hotel_internal_regime_title'
        ];

        $array = array_merge($array, $custom);
        return $array;
    }

}
?>
