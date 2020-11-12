<?php
namespace Custom\Space;

class CustomSettingsPage {
    public function customSettings($array) {
        $custom = [
            'space_contract',
            'space_contract_title',
            'space_inspection_term',
            'space_inspection_term_title',
            'space_internal_regime',
            'space_internal_regime_title'
        ];

        $array = array_merge($array, $custom);
        return $array;
    }

}
?>
