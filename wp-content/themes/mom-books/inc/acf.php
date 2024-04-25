<?php
$acf_json_path = fn() => get_stylesheet_directory() . '/inc/acf-json/';
add_filter( 'acf/settings/save_json', $acf_json_path );
add_filter( 'acf/settings/load_json', $acf_json_path );

// if (!preg_match('/USER_EMAIL_HERE/', wp_get_current_user()->user_email)) {
// add_filter('acf/settings/show_admin', '__return_false');
// }
