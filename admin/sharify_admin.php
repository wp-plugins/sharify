<?php

//Regsiter Settings
function admin_init_sharify() {
	register_setting('sharify', 'display_button_facebook');
	register_setting('sharify', 'display_button_linkedin');
	register_setting('sharify', 'display_button_twitter');
	register_setting('sharify', 'display_button_email');
	register_setting('sharify', 'display_button_reddit');
	register_setting('sharify', 'display_button_google');
	register_setting('sharify', 'display_button_pocket');
	register_setting('sharify', 'display_button_pinterest');
	register_setting('sharify', 'display_button_vk');
	register_setting('sharify', 'display_buttons_under_post');
	register_setting('sharify', 'sharify_twitter_btn_size');
	register_setting('sharify', 'sharify_facebook_btn_size');
	register_setting('sharify', 'sharify_gplus_btn_size');
	register_setting('sharify', 'sharify_reddit_btn_size');
	register_setting('sharify', 'sharify_pocket_btn_size');
	register_setting('sharify', 'sharify_pinterest_btn_size');
	register_setting('sharify', 'sharify_linkedin_btn_size');
	register_setting('sharify', 'sharify_email_btn_size');
	register_setting('sharify', 'sharify_vk_btn_size');
	register_setting('sharify', 'sharify_use_gfont');
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

//Include Sharify options
function options_page_sharify() {
  include( 'sharify_options.php' );  
}

//Check if its admin
if (is_admin()) {
  add_action('admin_init', 'admin_init_sharify');
  add_action('admin_menu', 'admin_menu_sharify');
}

?>