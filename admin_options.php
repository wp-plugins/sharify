<div class="wrap">
<h2>Sharify Settings</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('sharify');?>


<h3>Which buttons do you want to display?</h3>
<label><input type="checkbox" name="display_button_twitter" value="1" 
<?php if ( 1 == get_option('display_button_twitter') ) echo 'checked="checked"'; ?> /> Display Twitter button?</label><br />
<label><input type="checkbox" name="display_button_facebook" value="1" 
<?php if ( 1 == get_option('display_button_facebook') ) echo 'checked="checked"'; ?> /> Display Facebook button?</label><br />
<label><input type="checkbox" name="display_button_google" value="1" 
<?php if ( 1 == get_option('display_button_google') ) echo 'checked="checked"'; ?> /> Display Google button?</label><br />
<label><input type="checkbox" name="display_button_linkedin" value="1" 
<?php if ( 1 == get_option('display_button_linkedin') ) echo 'checked="checked"'; ?> /> Display Linkedin button?</label><br />
<label><input type="checkbox" name="display_button_pinterest" value="1" 
<?php if ( 1 == get_option('display_button_pinterest') ) echo 'checked="checked"'; ?> /> Display Pinterest button?</label><br />
<label><input type="checkbox" name="display_button_reddit" value="1" 
<?php if ( 1 == get_option('display_button_reddit') ) echo 'checked="checked"'; ?> /> Display Reddit button?</label><br />
<label><input type="checkbox" name="display_button_pocket" value="1" 
<?php if ( 1 == get_option('display_button_pocket') ) echo 'checked="checked"'; ?> /> Display Pocket button?</label><br /><br />
<hr>

<h3>Add buttons automatically? </h3>
<label><input type="checkbox" name="display_buttons_under_post" value="1" 
<?php if ( 1 == get_option('display_buttons_under_post') ) echo 'checked="checked"'; ?> /> Show buttons under all posts?</label> <br />

<input type="hidden" name="action" value="update" /><br />
<hr>

<p>Thanks for using sharify! For the latest development updates, make sure to <a href="http://twitter.com/mehedih_" target="_blank"> follow me on Twitter: @mehedih_</a></p>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>