<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Report
        Permission::findOrCreate('report_view');

        // Contact Submissions
        Permission::findOrCreate('contact_manage');

        //Newslettercheck_availability_view
        Permission::findOrCreate('newsletter_manage');

        // Language
        Permission::findOrCreate('language_manage');
        Permission::findOrCreate('language_translation');


        // Booking
        Permission::findOrCreate('booking_view');
        Permission::findOrCreate('booking_update');
        Permission::findOrCreate('booking_manage_others');

        // Booking
        Permission::findOrCreate('enquiry_view');
        Permission::findOrCreate('enquiry_update');
        Permission::findOrCreate('enquiry_manage_others');


        // Templates
        Permission::findOrCreate('template_view');
        Permission::findOrCreate('template_create');
        Permission::findOrCreate('template_update');
        Permission::findOrCreate('template_delete');

        // News
        Permission::findOrCreate('news_view');
        Permission::findOrCreate('news_create');
        Permission::findOrCreate('news_update');
        Permission::findOrCreate('news_delete');
        Permission::findOrCreate('news_manage_others');

        // Stock Adjustment
        Permission::findOrCreate('stock_adjustment_view');
        Permission::findOrCreate('stock_adjustment_create');
        Permission::findOrCreate('stock_adjustment_update');
        Permission::findOrCreate('stock_adjustment_delete');
        Permission::findOrCreate('stock_adjustment_manage_others');

        // Budget
        Permission::findOrCreate('budget_view');
        Permission::findOrCreate('budget_create');
        Permission::findOrCreate('budget_update');
        Permission::findOrCreate('budget_delete');
        Permission::findOrCreate('budget_manage_others');

        //paymentTypeRate
        Permission::findOrCreate('paymentTypeRate_view');
        Permission::findOrCreate('paymentTypeRate_create');
        Permission::findOrCreate('paymentTypeRate_update');
        Permission::findOrCreate('paymentTypeRate_delete');
        Permission::findOrCreate('paymentTypeRate_manage_others');

        // Reservation
        Permission::findOrCreate('reservation_view');

        // Pension Type
        Permission::findOrCreate('pension_type_view');
        Permission::findOrCreate('pension_type_create');
        Permission::findOrCreate('pension_type_update');
        Permission::findOrCreate('pension_type_delete');
        Permission::findOrCreate('pension_type_manage_others');

        // Point Of sale
        Permission::findOrCreate('point_of_sale_view');
        Permission::findOrCreate('point_of_sale_create');
        Permission::findOrCreate('point_of_sale_update');
        Permission::findOrCreate('point_of_sale_delete');
        Permission::findOrCreate('point_of_sale_manage_others');

        // Reservation Type
        Permission::findOrCreate('reservation_type_view');
        Permission::findOrCreate('reservation_type_create');
        Permission::findOrCreate('reservation_type_update');
        Permission::findOrCreate('reservation_type_delete');
        Permission::findOrCreate('reservation_type_manage_others');

        // Content Template
        Permission::findOrCreate('content_template_view');
        Permission::findOrCreate('content_template_create');
        Permission::findOrCreate('content_template_update');
        Permission::findOrCreate('content_template_delete');
        Permission::findOrCreate('content_template_manage_others');

        // Check Availability
        Permission::findOrCreate('check_availability_view');
        Permission::findOrCreate('check_availability_create');
        Permission::findOrCreate('check_availability_update');
        Permission::findOrCreate('check_availability_delete');
        Permission::findOrCreate('check_availability_manage_others');

        //Map Available
        Permission::findOrCreate('map_available_view');

        // Company
        Permission::findOrCreate('company_view');
        Permission::findOrCreate('company_create');
        Permission::findOrCreate('company_update');
        Permission::findOrCreate('company_delete');
        Permission::findOrCreate('company_manage_others');

        // CheckList Limpeza
        Permission::findOrCreate('cleaning_checklist_view');
        Permission::findOrCreate('cleaning_checklist_manage_others');
        Permission::findOrCreate('cleaning_checklist_create');
        Permission::findOrCreate('cleaning_checklist_update');
        Permission::findOrCreate('cleaning_checklist_delete');

        // Situation
        Permission::findOrCreate('situation_view');
        Permission::findOrCreate('situation_manage_others');
        Permission::findOrCreate('situation_create');
        Permission::findOrCreate('situation_update');
        Permission::findOrCreate('situation_delete');

        // Section
        Permission::findOrCreate('section_view');
        Permission::findOrCreate('section_manage_others');
        Permission::findOrCreate('section_create');
        Permission::findOrCreate('section_update');
        Permission::findOrCreate('section_delete');

        // Billing
        Permission::findOrCreate('billing_view');
        Permission::findOrCreate('billing_create');
        Permission::findOrCreate('billing_update');
        Permission::findOrCreate('billing_delete');

        //Payment Methods
        Permission::findOrCreate('payment_methods_view');
        Permission::findOrCreate('payment_methods_create');
        Permission::findOrCreate('payment_methods_update');
        Permission::findOrCreate('payment_methods_delete');

        //Bank Accounts
        Permission::findOrCreate('bank_account_view');
        Permission::findOrCreate('bank_account_create');
        Permission::findOrCreate('bank_account_update');
        Permission::findOrCreate('bank_account_delete');

        //Card Machine Account
        Permission::findOrCreate('card_machine_account_view');
        Permission::findOrCreate('card_machine_account_create');
        Permission::findOrCreate('card_machine_account_update');
        Permission::findOrCreate('card_machine_account_delete');

        //Cost Center
        Permission::findOrCreate('cost_center_view');
        Permission::findOrCreate('cost_center_create');
        Permission::findOrCreate('cost_center_update');
        Permission::findOrCreate('cost_center_delete');
        Permission::findOrCreate('cost_center_others');

        //Cost Center
        Permission::findOrCreate('sub_cost_view');
        Permission::findOrCreate('sub_cost_create');
        Permission::findOrCreate('sub_cost_update');
        Permission::findOrCreate('sub_cost_delete');
        Permission::findOrCreate('sub_cost_manage_others');

        Permission::findOrCreate('consumptionCard_view');
        Permission::findOrCreate('consumptionCard_create');
        Permission::findOrCreate('consumptionCard_update');
        Permission::findOrCreate('consumptionCard_delete');
        Permission::findOrCreate('consumptionCard_manage_others');

        Permission::findOrCreate('revenue_view');
        Permission::findOrCreate('revenue_create');
        Permission::findOrCreate('revenue_update');
        Permission::findOrCreate('revenue_delete');
        Permission::findOrCreate('revenue_manage_others');

        Permission::findOrCreate('history_consumptionCard_view');
        Permission::findOrCreate('history_consumptionCard_create');
        Permission::findOrCreate('history_consumptionCard_update');
        Permission::findOrCreate('history_consumptionCard_delete');
        Permission::findOrCreate('history_consumptionCard_manage_others');

        Permission::findOrCreate('authorizationPasswords_view');
        Permission::findOrCreate('authorizationPasswords_create');
        Permission::findOrCreate('authorizationPasswords_update');
        Permission::findOrCreate('authorizationPasswords_delete');
        Permission::findOrCreate('authorizationPasswords_manage_others');

        Permission::findOrCreate('newSale_view');
        Permission::findOrCreate('newSale_create');
        Permission::findOrCreate('newSale_update');
        Permission::findOrCreate('newSale_delete');
        Permission::findOrCreate('newSale_others');

        // Roles
        Permission::findOrCreate('role_view');
        Permission::findOrCreate('role_create');
        Permission::findOrCreate('role_update');
        Permission::findOrCreate('role_delete');

        Permission::findOrCreate('permission_view');
        Permission::findOrCreate('permission_create');
        Permission::findOrCreate('permission_update');
        Permission::findOrCreate('permission_delete');

        // Dashboard
        Permission::findOrCreate('dashboard_access');
        Permission::findOrCreate('dashboard_vendor_access');

        // Settings
        Permission::findOrCreate('setting_update');


        // Menus
        Permission::findOrCreate('menu_view');
        Permission::findOrCreate('menu_create');
        Permission::findOrCreate('menu_update');
        Permission::findOrCreate('menu_delete');


        // create permissions
        Permission::findOrCreate('user_view');
        Permission::findOrCreate('user_create');
        Permission::findOrCreate('user_update');
        Permission::findOrCreate('user_delete');

        Permission::findOrCreate('page_view');
        Permission::findOrCreate('page_create');
        Permission::findOrCreate('page_update');
        Permission::findOrCreate('page_delete');
        Permission::findOrCreate('page_manage_others');

        Permission::findOrCreate('setting_view');
        Permission::findOrCreate('setting_update');

        // Media
        Permission::findOrCreate('media_upload');
        Permission::findOrCreate('media_manage');

        // Tour
        Permission::findOrCreate('tour_view');
        Permission::findOrCreate('tour_create');
        Permission::findOrCreate('tour_update');
        Permission::findOrCreate('tour_delete');
        Permission::findOrCreate('tour_manage_others');
        Permission::findOrCreate('tour_manage_attributes');

        // Location
        Permission::findOrCreate('location_view');
        Permission::findOrCreate('location_create');
        Permission::findOrCreate('location_update');
        Permission::findOrCreate('location_delete');
        Permission::findOrCreate('location_manage_others');

        //Review
        Permission::findOrCreate('review_manage_others');

        // Other System Permissions

        Permission::findOrCreate('system_log_view');


        // Space
        Permission::findOrCreate('space_view');
        Permission::findOrCreate('space_create');
        Permission::findOrCreate('space_update');
        Permission::findOrCreate('space_delete');
        Permission::findOrCreate('space_manage_others');
        Permission::findOrCreate('space_manage_attributes');

        // Hotel
        Permission::findOrCreate('hotel_view');
        Permission::findOrCreate('hotel_create');
        Permission::findOrCreate('hotel_update');
        Permission::findOrCreate('hotel_delete');
        Permission::findOrCreate('hotel_manage_others');
        Permission::findOrCreate('hotel_manage_attributes');

        // Building
        Permission::findOrCreate('building_view');
        Permission::findOrCreate('building_create');
        Permission::findOrCreate('building_update');
        Permission::findOrCreate('building_delete');
        Permission::findOrCreate('building_manage_others');

        // Profession
        Permission::findOrCreate('profession_view');
        Permission::findOrCreate('profession_create');
        Permission::findOrCreate('profession_update');
        Permission::findOrCreate('profession_delete');

        // Building Floor
        Permission::findOrCreate('building_floor_view');
        Permission::findOrCreate('building_floor_create');
        Permission::findOrCreate('building_floor_update');
        Permission::findOrCreate('building_floor_delete');
        Permission::findOrCreate('building_floor_manage_others');

        // Room Number
        Permission::findOrCreate('room_view');
        Permission::findOrCreate('room_create');
        Permission::findOrCreate('room_update');
        Permission::findOrCreate('room_delete');
        Permission::findOrCreate('room_manage_others');

        // Age
        Permission::findOrCreate('age_view');
        Permission::findOrCreate('age_create');
        Permission::findOrCreate('age_update');
        Permission::findOrCreate('age_delete');
        Permission::findOrCreate('age_manage_others');

        // Room Number
        Permission::findOrCreate('classification_view');
        Permission::findOrCreate('classification_create');
        Permission::findOrCreate('classification_update');
        Permission::findOrCreate('classification_delete');
        Permission::findOrCreate('classification_manage_others');

        // Room Number
        Permission::findOrCreate('characteristic_view');
        Permission::findOrCreate('characteristic_create');
        Permission::findOrCreate('characteristic_update');
        Permission::findOrCreate('characteristic_delete');
        Permission::findOrCreate('characteristic_manage_others');

        // Car
        Permission::findOrCreate('car_view');
        Permission::findOrCreate('car_create');
        Permission::findOrCreate('car_update');
        Permission::findOrCreate('car_delete');
        Permission::findOrCreate('car_manage_others');
        Permission::findOrCreate('car_manage_attributes');

        // Event
        Permission::findOrCreate('event_view');
        Permission::findOrCreate('event_create');
        Permission::findOrCreate('event_update');
        Permission::findOrCreate('event_delete');
        Permission::findOrCreate('event_manage_others');
        Permission::findOrCreate('event_manage_attributes');

        // Social
        Permission::findOrCreate('social_manage_forum');

        // Plugin
        Permission::findOrCreate('plugin_manage');

        // Vendor
        Permission::findOrCreate('vendor_payout_view');
        Permission::findOrCreate('vendor_payout_manage');


        // this can be done as separate statements
        $this->initVendor();

        // this can be done as separate statements
        $customer = Role::findOrCreate('customer');

        $role = Role::findOrCreate('administrator');

        $role->givePermissionTo(Permission::all());
    }

    public function initVendor(){

        $vendor = Role::findOrCreate('vendor');

        $vendor->givePermissionTo('media_upload');
        $vendor->givePermissionTo('tour_view');
        $vendor->givePermissionTo('tour_create');
        $vendor->givePermissionTo('tour_update');
        $vendor->givePermissionTo('tour_delete');
        $vendor->givePermissionTo('dashboard_vendor_access');

        $vendor->givePermissionTo('space_view');
        $vendor->givePermissionTo('space_create');
        $vendor->givePermissionTo('space_update');
        $vendor->givePermissionTo('space_delete');

        $vendor->givePermissionTo('hotel_view');
        $vendor->givePermissionTo('hotel_create');
        $vendor->givePermissionTo('hotel_update');
        $vendor->givePermissionTo('hotel_delete');

        $vendor->givePermissionTo('car_view');
        $vendor->givePermissionTo('car_create');
        $vendor->givePermissionTo('car_update');
        $vendor->givePermissionTo('car_delete');

        $vendor->givePermissionTo('event_view');
        $vendor->givePermissionTo('event_create');
        $vendor->givePermissionTo('event_update');
        $vendor->givePermissionTo('event_delete');
    }
}
