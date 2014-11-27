<?php
/*
Plugin Name: Sharify
Plugin URL: http://dip223.com/sharify
Description: Just another sharing buttons plugin. Simple but awesome.
Version: 1.3
Author: imehedidip
Author URI: http://twitter.com/mehedih_

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

Thanks for using my plugin!

 =====================================
 =========BROUGHT TO YOU BY===========
 =====================================
 ==    _______     __    _______    ==
 ==   /\  ___ \   /\ \  /\  ___ \   ==
 ==   \ \ \  \ \  \ \ \ \ \ \_/ /   ==
 ==    \ \ \__\ \  \ \ \ \ \  _/    ==
 ==     \ \______\  \ \_\ \ \_\     ==
 ==      \/______/   \/_/  \/_/     ==
 ==                                 ==
 =====================================
 ==============@MEHEDIH_==============
 =====================================

*/

//Load the CSS
function sharify_css()
{
    wp_register_style('sharify_stylesheet', plugins_url('includes/css/sharify.css', __FILE__));
    wp_enqueue_style('sharify_stylesheet');
	
    wp_register_style('icons_stylesheet', plugins_url('includes/icons/css/sharify.css', __FILE__));
    wp_enqueue_style('icons_stylesheet');
}
add_action('wp_enqueue_scripts', 'sharify_css' );

//Add Admin Panel
include('gdgt_admin.php');

//Get Share Counts
include('includes/share_count.php');

//Activate Sharify options
function activate_sharify() {	
	add_option('display_button_facebook', 1);
	add_option('display_button_linkedin', 1);
	add_option('display_button_twitter'	, 1);
	add_option('display_button_reddit'	, 1);
	add_option('display_button_google'	, 1);
	add_option('display_button_pocket'	, 1);
}

//Deactivate Sharify options
function deactive_sharify() {  
	delete_option('display_button_facebook');
	delete_option('display_button_linkedin');
	delete_option('display_button_twitter');
	delete_option('display_button_reddit');
	delete_option('display_button_google');
	delete_option('display_button_pocket');
}

register_activation_hook(__FILE__, 'activate_sharify');
register_deactivation_hook(__FILE__, 'deactive_sharify');


//Add Sharify Buttons shortcode
function sharify_show_buttons_shortcode()
{
	return sharify_display_button_buttons();
}
add_shortcode('sharify', 'sharify_show_buttons_shortcode');

//Get Permalink
$sharify_url = get_permalink();

//Sharify Buttons
function sharify_display_button_buttons($sharify_buttons = "")
{
	$sharify_buttons .= '
		<div class="si-share-box">';

	if ( 1 == get_option('display_button_twitter') ) 
		$sharify_buttons .= '<a href="https://twitter.com/intent/tweet?text=' . $title . ' - ' . $sharify_url . '" onclick="window.open(this.href, \'mywin\',
		    \'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button si-button-twitter" title="Tweet on Twitter">
				<div class="si-share-main">
					<i class="sharify-twitter sharify"></i>
					<p class="si-share-text">Tweet</p>
				</div>
				<div class="si-share-counter"><p class="si-share-count-text">' . sharesCounter('', false, false, true, false, false, false). '</p></div>
			</div>
			</a>';
	if ( 1 == get_option('display_button_facebook') ) 
		$sharify_buttons .= '<a href="http://www.facebook.com/sharer.php?u=' . urlencode($sharify_url) . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button si-button-facebook" title="Share link on Facebook">
				<div class="si-share-main">
					<i class="sharify-facebook sharify"></i>
					<p class="si-share-text">Share</p>
				</div>
				<div class="si-share-counter"><p class="si-share-count-text">' . sharesCounter('', false, true, false, false, false, false) . '</p></div>
			</div>
			</a>';
	if ( 1 == get_option('display_button_google') ) 
		$sharify_buttons .= '<a href="http://plus.google.com/share?url=' . $sharify_url . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button si-button-gplus" title="Share link on Google+">
				<div class="si-share-main">
					<i class="sharify-gplus sharify"></i>
					<p class="si-share-text">+1</p>
				</div>
				<div class="si-share-counter"><p class="si-share-count-text">' . sharesCounter('', false, true, false, false, true, false) . '</p></div>
			</div>
			</a>';
	if ( 1 == get_option('display_button_pinterest') ) 
		$sharify_buttons .= '<a class="si-share-box" href="http://pinterest.com/pin/create/button/?url=' . $sharify_url . '&amp;media=' . (!empty($image[0]) ? $image[0] : '') . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button-small si-button-pinterest" title="Pin it on Pinterest">
				<i class="sharify-pinterest sharify sharify-small"></i>
			</div>
			</a>';
	if ( 1 == get_option('display_button_linkedin') ) 
		$sharify_buttons .= '<a class="si-share-box" href="https://www.linkedin.com/shareArticle?mini=true&url=' . $sharify_url . '&title='. $title .'" onclick="if(!document.getElementById(\'td_social_networks_buttons\')){window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;}" >
			<div class="si-button-small si-button-linkedin" title="Share link on LinkedIn">
				<i class="sharify-linkedin sharify sharify-small"></i>
			</div>
			</a>';
	if ( 1 == get_option('display_button_reddit') ) 
		$sharify_buttons .= '<a class="si-share-box" href="http://reddit.com/submit?url=' . $sharify_url . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button-small si-button-reddit"  title="Share link on Reddit">
				<i class="sharify-reddit sharify sharify-small"></i>
			</div>
			</a>';
	
	if ( 1 == get_option('display_button_pocket') ) 
		$sharify_buttons .= '<a href="https://getpocket.com/save?url=' . urlencode($sharify_url) . '&amp;media=' . (!empty($image[0]) ? $image[0] : '') . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button-small si-button-pocket" title="Save to Pocket">
				<i class="sharify-pocket sharify-small sharify"></i>
			</div>
			</a>';
	
	$sharify_buttons .= '</div';
    
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
?>
