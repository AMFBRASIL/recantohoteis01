<?php

return [
    'financial_route_prefix' => env("FINANCIAL_ROUTER_PREFIX", "financial"),
    'financial_billing_type_route_prefix' => env("FINANCIAL_BILLING_TYPE_ROUTER_PREFIX", "billingType"),
    'financial_payment_methods_route_prefix' => env("FINANCIAL_PAYMENT_METHODS_ROUTER_PREFIX", "paymentMethod"),
    'financial_bank_accounts_route_prefix' => env("FINANCIAL_BANK_ACCOUNTS_ROUTER_PREFIX", "bankAccount"),
    'financial_card_machine_account_route_prefix' => env("FINANCIAL_CARD_MACHINE_ACCOUNTS_ROUTER_PREFIX", "cardMachineAccount"),
];
