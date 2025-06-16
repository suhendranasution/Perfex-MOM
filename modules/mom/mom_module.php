<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Module Name: MOM Notes
 * Module Description: Manage minutes of meeting (MOM) per project and share public link with clients.
 * Version: 1.0.0
 * Requires at least: 2.9.*
 */

register_language_files('mom', ['mom']);

hooks()->add_action('app_admin_head', function(){
    echo '<link href="'.module_dir_url('mom', 'assets/mom.css').'" rel="stylesheet" type="text/css" />';
});

hooks()->add_action('admin_init', 'mom_module_init_menu_items');
function mom_module_init_menu_items()
{
    if (is_admin()) {
        $CI = &get_instance();
        $CI->app_menu->add_sidebar_menu_item('mom', [
            'name' => _l('mom_module'),
            'href' => admin_url('mom'),
            'icon' => 'fa fa-handshake-o',
            'position' => 40,
        ]);
    }
}

hooks()->add_action('admin_init', 'mom_permissions');
function mom_permissions()
{
    $capabilities = [];
    $capabilities['capabilities'] = [
        'view'   => _l('permission_view'),
        'create' => _l('permission_create'),
        'edit'   => _l('permission_edit'),
        'delete' => _l('permission_delete'),
    ];
    register_staff_capabilities('mom', $capabilities, _l('mom_module'));
}
