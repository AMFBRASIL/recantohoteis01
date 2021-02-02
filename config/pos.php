<?php

return [
    'pos_route_prefix' => env("POS_ROUTER_PREFIX", "pos"),
    'pos_consumption_card_route_prefix' => env("POS_CONSUMPTION_CARD_ROUTER_PREFIX", "consumptionCard"),
    'pos_authorization_password_route_prefix' => env("POS_AUTHORIZATION_PASSWORD_ROUTER_PREFIX", "authorizationPassword"),
    'pos_sale_route_prefix' => env("POS_SALE_ROUTER_PREFIX", "sale"),
];
