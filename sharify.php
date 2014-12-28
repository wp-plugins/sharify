<?php
/**
 * Plugin Name: Sharify
 * Plugin URI: https://wordpress.org/plugins/sharify/
 * Description: Sharify is a fast and simple plugin for sharing buttons on WordPress. The plugin lets you display responsive sharing 
 * buttons on your WordPress website!
 * Version: 1.7.1
 * Author: imehedidip
 * Author URI: http://twitter.com/mehedih_
 * Text Domain: sharify
 * License: GPL2

 * Copyright 2015  Mehedi  (email : mehedi.dip@outlook.com)
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

include_once ('admin/sharify_admin.php'); //Get Admin Settings
include_once ('admin/sharify_count.php'); //Get Share Count

//Enqueue Styles
function sharify_css() {
    wp_register_style( 'sharify', plugins_url( 'sharify.css', __FILE__ ), false, NULL, 'all' );
    wp_register_style( 'sharify-icon', plugins_url( 'icon/css/sharify.css', __FILE__ ), false, NULL, 'all' );
    wp_register_style( 'sharify-font', 'https://fonts.googleapis.com/css?family=Roboto:300', false, NULL, 'all' );
    if (is_single()) {
    	wp_enqueue_style('sharify');
    	wp_enqueue_style('sharify-icon');
    	wp_enqueue_style('sharify-font');
    }
}

add_action( 'wp_enqueue_scripts', 'sharify_css' );

//Activate Sharify options
function activate_sharify() {	
	add_option('display_button_facebook'	, 1);
	add_option('display_button_linkedin'	, 1);
	add_option('display_button_twitter'		, 1);
	add_option('display_button_email'		, 0);
	add_option('display_button_reddit'		, 1);
	add_option('display_button_google'	    , 1);
	add_option('display_buttons_under_post'	, 1);
	add_option('display_button_pocket'		, 1);
	add_option('display_button_vkt'		    , 0);
	add_option('load_google_fonts'			, 1);
}

//Deactivate Sharify options
function deactive_sharify() {  
	delete_option('display_button_facebook');
	delete_option('display_button_linkedin');
	delete_option('display_button_twitter');
	delete_option('display_button_email');
	delete_option('display_button_reddit');
	delete_option('display_button_google');
	delete_option('display_button_pocket');
	delete_option('display_button_vk');
	delete_option('display_buttons_under_post');
	delete_option('load_google_fonts');
}

register_activation_hook(__FILE__, 'activate_sharify');
register_deactivation_hook(__FILE__, 'deactive_sharify');


//Add Sharify Buttons shortcode
function sharify_show_buttons_shortcode()
{
	return sharify_display_button_buttons();
}
add_shortcode('sharify', 'sharify_show_buttons_shortcode');

//Function for getting the image
function sharify_catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];


  return $first_img;
}

//Sharify buttons
function sharify_display_button_buttons($sharify_buttons = "")
{
	$sharify_buttons .= '<div class="sharify-container">';
	$sharify_buttons .= '<ul>';

	if ( 1 == get_option('display_button_twitter') ) 
		$sharify_buttons .='<li class="sharify-btn-twitter">
								<a title="Tweet on Twitter" href="https://twitter.com/intent/tweet?text='.get_the_title().' - '.get_permalink().'" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
									<span class="sharify-icon"><i class="sharify sharify-twitter"></i></span>
									<span class="sharify-title">Tweet</span>
									<span class="sharify-count">'.sharify_tweet_count().'</span>
								</a>
							</li>';
	if ( 1 == get_option('display_button_facebook') ) 
		$sharify_buttons .='<li class="sharify-btn-facebook">
								<a title="Share on Facebook" href="http://www.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
									<span class="sharify-icon"><i class="sharify sharify-facebook"></i></span>
									<span class="sharify-title">Share</span>
									<span class="sharify-count">'.sharify_share_count().'</span>
								</a>
							</li>';
	if ( 1 == get_option('display_button_google') ) 
		$sharify_buttons .= '<li class="sharify-btn-gplus">
								<a title="Share on Google+" href="http://plus.google.com/share?url=' . get_permalink() . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
									<span class="sharify-icon"><i class="sharify sharify-gplus"></i></span>
									<span class="sharify-title">+1</span>
									<span class="sharify-count">'.sharify_plus_count().'</span>
								</a>
							</li>';
	if ( 1 == get_option('display_button_reddit') ) 
		$sharify_buttons .= '<li class="sharify-btn-reddit sharify-btn-sec">
								<a title="Submit to Reddit" href="http://reddit.com/submit?url=' . get_permalink() . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=950,height=450,toolbar=0\'); return false;">
									<span><i class="sharify sharify-reddit"></i></span>
								</a>
							</li>';
	if ( 1 == get_option('display_button_pocket') ) 
		$sharify_buttons .= '<li class="sharify-btn-pocket sharify-btn-sec">
								<a title="Save to read later on Pocket" href="https://getpocket.com/save?url=' . urlencode(get_permalink()) . '&media=' . sharify_catch_that_image() . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
									<span><i class="sharify sharify-pocket"></i></span>
								</a>
							</li>';
	if ( 1 == get_option('display_button_pinterest') ) 
		$sharify_buttons .= '<li class="sharify-btn-pinterest sharify-btn-sec">
								<a title="Share on Pinterest" href="http://pinterest.com/pin/create/button/?url=' . get_permalink() . '&media=' . sharify_catch_that_image() . '' . '&description='. get_the_title() .' - ' . get_permalink(). '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
									<span><i class="sharify sharify-pinterest"></i></span>
								</a>
							</li>';
	if ( 1 == get_option('display_button_linkedin') ) 
		$sharify_buttons .= '<li class="sharify-btn-linkedin sharify-btn-sec">
								<a title="Share on Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink() . '&title='. get_the_title() .'" onclick="if(!document.getElementById(\'td_social_networks_buttons\')){window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;}" >
									<span><i class="sharify sharify-linkedin"></i></span>
								</a>
							</li>';
	if ( 1 == get_option('display_button_email') ) 
		$sharify_buttons .= '<li class="sharify-btn-email sharify-btn-sec">
								<a title="Share via mail" href="mailto:?subject='.get_the_title().'&body=Hey, checkout this great article: '.get_permalink().'">							
									<span><i class="sharify sharify-mail"></i></span>
								</a>
							</li>';
	if ( 1 == get_option('display_button_vk') ) 
		$sharify_buttons .= '<li class="sharify-btn-vk sharify-btn-sec">
								<a title="Share on Vkontake" href="http://vkontakte.ru/share.php?url=' . get_permalink() . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=950,height=450,toolbar=0\'); return false;">
									<span><i class="sharify sharify-vk"></i></span>
								</a>
							</li>';
					
	$sharify_buttons .= '</ul>';
    $sharify_buttons .= '</div>';
	return $sharify_buttons;
}

//Add Sharify buttons automatically
function sharify_show_buttons_on_single($sharify_buttons)
{
    if ( is_single() && ( 1 == get_option('display_buttons_under_post') )  ) {
		$sharify_buttons = sharify_display_button_buttons($sharify_buttons);
	}
	return $sharify_buttons;
}
add_filter('the_content', 'sharify_show_buttons_on_single');

//Load Admin Styles
function load_sharify_wp_admin_style() {
        wp_register_style('sharify_admin_css', plugin_dir_url( __FILE__ ) . 'admin/sharify-admin.css' );
        wp_enqueue_style( 'sharify_admin_css' );
        wp_register_style('sharify_icon', plugin_dir_url( __FILE__ ) . 'icon/css/sharify.css' );
        wp_enqueue_style( 'sharify_icon' );
}
add_action( 'admin_enqueue_scripts', 'load_sharify_wp_admin_style' );

?>