<?php
defined('BASEPATH') or exit('No direct script access allowed');

define('MOM_MODULE_NAME', 'mom');

register_module([
    'name'           => 'Minutes of Meeting',
    'description'    => 'Manage minutes of meeting (MOM) per project and share public link with clients.',
    'version'        => '1.0.0',
    'author'         => 'Codex',
    'requires_at_least' => '2.9.*',
]);

register_activation_hook(MOM_MODULE_NAME, 'mom_module_install');
register_uninstall_hook(MOM_MODULE_NAME, 'mom_module_uninstall');

function mom_module_install()
{
    require_once __DIR__ . '/install.php';
}

function mom_module_uninstall()
{
    require_once __DIR__ . '/uninstall.php';
}

hooks()->add_filter('project_tabs_admin', 'mom_project_tab', 10, 2);
function mom_project_tab($tabs, $project_id)
{
    if (!has_permission('mom', '', 'view')) {
        return $tabs;
    }
    $tabs[] = [
        'name'     => _l('mom_module'),
        'view'     => 'mom',
        'url'      => admin_url('mom/index/' . $project_id),
        'position' => 50,
        'icon'     => 'fa fa-handshake-o',
    ];
    return $tabs;
}
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
