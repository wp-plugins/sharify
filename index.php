<?php
/*
Plugin Name: Sharify
Plugin URL: http://dip223.com/sharify
Description: Sharify will give you the perfect sharing buttons for your website. It is fast, responsive and you\'ll love it!
Version: 1.1
Author: Mehedi
Author URI: http://twitter.com/imhdip

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

Thanks for using my plugin!
*/

// Load CSS
function sharify_css()
{
    wp_enqueue_style('sharify_css', plugins_url('includes/css/sharify.css', __FILE__));
    wp_enqueue_style('font_sharify', plugins_url('includes/icons/css/sharify.css', __FILE__));
    wp_enqueue_style('sharify_font', 'http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300');
}

add_action('wp_head', 'sharify_css');

// Register Shortcode
function sharify_register_shortcode()
{
    add_shortcode('sharify', 'sharify_file');
}

function sharify_file()
{
    include('includes/share.php');
    
}

add_action('init', 'sharify_register_shortcode');

?>