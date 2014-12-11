<?php

//Regsiter Settings
function admin_init_sharify() {
	register_setting('sharify', 'display_button_facebook');
	register_setting('sharify', 'display_button_linkedin');
	register_setting('sharify', 'display_button_twitter');
	register_setting('sharify', 'display_button_reddit');
	register_setting('sharify', 'display_button_google');
	register_setting('sharify', 'display_button_pocket');
	register_setting('sharify', 'display_button_pinterest');
	register_setting('sharify', 'display_button_vk');
	register_setting('sharify', 'display_buttons_under_post');
	register_setting('sharify', 'load_google_fonts');
}

//Add Options Page
function admin_menu_sharify() {
  add_options_page(
		'Sharify',
		'Sharify Settings',
		'manage_options',
		'sharify',
		'options_page_sharify');
}

function options_page_sharify() {
  include( 'admin_options.php' );  
}

if (is_admin()) {
  add_action('admin_init', 'admin_init_sharify');
  add_action('admin_menu', 'admin_menu_sharify');
}

?>