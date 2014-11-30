<form method="post" action="options.php">
	<div class="sharify-logo">
		<img src="<?php echo plugins_url( 'admin/sharify.png', __FILE__ ); ?>" >
	</div>
	<div class="sharify-wrap">
		<div class="toolbar">
	        <div class="tabs">
	            <ul>
	                <li class="tabitem active"><a href="#display">DISPLAY<span></span></a></li>
	                <li class="tabitem"><a href="#customise">CUSTOMISE<span></span></a></li>
	                <li class="tabitem"><a href="#others">OTHERS<span></span></a></li>
	                <li class="tabitem"><a href="#changelog">CHANGELOG<span></span></a></li>
	                <li class="tabitem"><a href="#share">SHARE<span></span></a></li>
	                <li class="tabitem"><a href="#follow">FOLLOW<span></span></a></li>
	            </ul>
	        </div>
    	</div>
		<div class="content">
			<div id="display" class="box show">
				<div class="wrap">		
					<label class="sec-title"><p>BUTTON PLACEMENT</p></label>		
					<br><label><input type="checkbox" name="display_buttons_under_post" value="1" 
					<?php if ( 1 == get_option('display_buttons_under_post') ) echo 'checked="checked"'; ?> /> Show buttons under all posts</label> <br>
					<label class="sec-title"><p>BUTTONS</p></label>
					<br><label><input type="checkbox" name="display_button_twitter" value="1" 
					<?php if ( 1 == get_option('display_button_twitter') ) echo 'checked="checked"'; ?> /> Twitter</label><br />
					<br><label><input type="checkbox" name="display_button_facebook" value="1" 
					<?php if ( 1 == get_option('display_button_facebook') ) echo 'checked="checked"'; ?> /> Facebook</label><br />
					<br><label><input type="checkbox" name="display_button_google" value="1" 
					<?php if ( 1 == get_option('display_button_google') ) echo 'checked="checked"'; ?> /> Google Plus</label><br />
					<br><label><input type="checkbox" name="display_button_linkedin" value="1" 
					<?php if ( 1 == get_option('display_button_linkedin') ) echo 'checked="checked"'; ?> /> Linkedin</label><br />
					<br><label><input type="checkbox" name="display_button_pinterest" value="1" 
					<?php if ( 1 == get_option('display_button_pinterest') ) echo 'checked="checked"'; ?> /> Pinterest</label><br />
					<br><label><input type="checkbox" name="display_button_reddit" value="1" 
					<?php if ( 1 == get_option('display_button_reddit') ) echo 'checked="checked"'; ?> /> Reddit</label><br />
					<br><label><input type="checkbox" name="display_button_pocket" value="1" 
					<?php if ( 1 == get_option('display_button_pocket') ) echo 'checked="checked"'; ?> /> Pocket</label><br /><br />
					<hr>

					<?php wp_nonce_field('update-options'); ?>
					<?php settings_fields('sharify');?>
					<p class="submit">
						<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
					</p>
				</div>
			</div>
			<div id="customise" class="box">
				<div class="wrap">		
					<br><h2>#soon</h2><br>
				</div>
			</div>
			<div id="others" class="box">
				<div class="wrap">		
					<br><h2>#soon</h2><br>
				</div>
			</div>
			<div id="changelog" class="box">
				<label class="sec-title"><p>1.4</p></label><br>
				<ul>
					<li>New UI interface for control panel</li>
				</ul><br>
				<label class="sec-title"><p>1.3</p></label><br>
				<ul>
					<li>Control Panel - You can now control any buttons you want! (hide or show)</li><br>
					<li>Share Count feature has been optimised for better performace</li>
					<li>CSS Fixes</li>
				</ul><br>
				<label class="sec-title"><p>1.2</p></label><br>
				<ul>
					<li>Fixed LinkedIn button issue</li><br>
					<li>Changed Facebook Like to Facebook Share</li>
				</ul><br>
				<label class="sec-title"><p>1.1</p></label><br>
				<ul>
					<li>Fixed bugs</li><br>
					<li>Performance Improvements</li>
				</ul><br>
				<label class="sec-title"><p>1.0</p></label><br>
				<ul>
					<li>Initial Release</li>
				</ul>	
			</div>
			<div id="share" class="box">
				<div class="wrap">		
					<br><h2>#soon</h2><br>
				</div>
			</div>
			<div id="follow" class="box">
				<div class="wrap">		
					<label class="sec-title"><p>FOLLOW THE DEVELOPER</p></label>
					<br>
					<p><a target="_blank" 	href="http://twitter.com/mehedih_">Follow me on Twitter</a></p>	
				</div>
			</div>
		</div>
	</div>
</form>