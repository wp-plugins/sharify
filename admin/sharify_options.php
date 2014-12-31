<div class="wrap">
	<h2 class="sharify-logo">Sharify</h2>
		<form method="post" class="sharify-settings-form" action="options.php">
			<?php wp_nonce_field('update-options'); ?>
			<?php settings_fields('sharify');?>
				<div class="sharify-container">
				<ul>
					<li class="sharify-btn-twitter">
						<a  href="#button-placement">
							<span class="sharify-title">Button Placement</span>
						</a>
					</li>
					<li class="sharify-btn-twitter">
						<a href="#caching">
							<span class="sharify-title">Caching</span>
						</a>
					</li>
					<li class="sharify-btn-twitter">
						<a href="#changelog">
							<span class="sharify-title">Changelog</span>
						</a>
					</li>
					<li class="sharify-btn-twitter">
						<a href="#follow">
							<span class="sharify-title">Follow</span>
						</a>
					</li>
				</ul>
				</div><br>
			<div class="sec-title">Button Placement</div>		
			<div id="button-placement" class="sharify-setting-wrap">
				<br><label><input class="sharify-input" type="checkbox" name="display_buttons_under_post" value="1" 
				<?php if ( 1 == get_option('display_buttons_under_post') ) echo 'checked="checked"'; ?> /> Show buttons under all posts</label> <br>
				<br><label><input type="checkbox" class="sharify-input" name="display_button_twitter" value="1" 
				<?php if ( 1 == get_option('display_button_twitter') ) echo 'checked="checked"'; ?> /> Twitter</label><br />
				<br><label><input type="checkbox" class="sharify-input" name="display_button_facebook" value="1" 
				<?php if ( 1 == get_option('display_button_facebook') ) echo 'checked="checked"'; ?> /> Facebook</label><br />
				<br><label><input type="checkbox" class="sharify-input" name="display_button_google" value="1" 
				<?php if ( 1 == get_option('display_button_google') ) echo 'checked="checked"'; ?> /> Google Plus</label><br />
				<br><label><input type="checkbox" class="sharify-input" name="display_button_email" value="1" 
				<?php if ( 1 == get_option('display_button_email') ) echo 'checked="checked"'; ?> /> Email</label><br />
				<br><label><input type="checkbox" class="sharify-input" name="display_button_linkedin" value="1" 
				<?php if ( 1 == get_option('display_button_linkedin') ) echo 'checked="checked"'; ?> /> Linkedin</label><br />
				<br><label><input type="checkbox" class="sharify-input" name="display_button_pinterest" value="1" 
				<?php if ( 1 == get_option('display_button_pinterest') ) echo 'checked="checked"'; ?> /> Pinterest</label><br />
				<br><label><input type="checkbox" class="sharify-input" name="display_button_vk" value="1" 
				<?php if ( 1 == get_option('display_button_vk') ) echo 'checked="checked"'; ?> /> VKontakte</label><br />
				<br><label><input type="checkbox" class="sharify-input" name="display_button_reddit" value="1" 
				<?php if ( 1 == get_option('display_button_reddit') ) echo 'checked="checked"'; ?> /> Reddit</label><br />
				<br><label><input type="checkbox" class="sharify-input" name="display_button_pocket" value="1" 
				<?php if ( 1 == get_option('display_button_pocket') ) echo 'checked="checked"'; ?> /> Pocket</label><br />
				<p class="submit"><input type="submit" class="sharify-btn" value="<?php _e('Save Changes') ?>" /></p>
			</div>
			<div class="sec-title">Caching</div>
			<div id="caching" class="sharify-setting-wrap">
				<br><label><input class="sharify-input" type="checkbox" name="sharify_enable_cache" value="1" 
				<?php if ( 1 == get_option('sharify_enable_cache') ) echo 'checked="checked"'; ?> /> Enable Caching? (recommend)</label> <br>
				<p><strong>Caching Period (in minutes)</strong></p>
				<input type="text" name="sharify_cache_period" value="<?php echo get_option('sharify_cache_period'); ?>" />
				<p class="submit"><input onclick="document.write('<?php delete_sharify_trans(); echo 'Sharify is saving settings...'; ?>');" type="submit" class="sharify-btn" value="<?php _e('Save Changes') ?>" /></p>
			</div>
			<div class="sec-title">Changelog</div>	
			<div id="changelog" class="sharify-setting-wrap">
				<p><strong>Current Version: 1.8 - <?php printf( __('Last checked on %1$s at %2$s.'), date_i18n( get_option( 'date_format' ) ), date_i18n( get_option( 'time_format' ) ) ); ?></strong></p>
				<div class="sharify-container">
				<ul>
				<li class="sharify-btn-twitter">
					<?php echo '<a href="' . esc_url( self_admin_url('update-core.php?force-check=1') ) . '">' . __( 'Check for update' ) . '</a>'; ?>
				</li><br>
				</ul>
				</div>
				<hr>
				<p class="sharify-version-no"><strong>Version 1.8</strong></p>
				<ul>
					<li>NEW: Abiliy to enable/disable caching</li>
				    <li>NEW: Ability to change caching period</li>
					<li>FIX: Transient API Fixes for caching</li>
				</ul>
				<hr>

				<p class="sharify-version-no"><strong>Version 1.7.1</strong></p>
				<ul>
					<li>SSL Security Fix</li>
					<li>Added caching to share counts</li>
				</ul>
				<hr>
				<p class="sharify-version-no"><strong>Version 1.7</strong></p>
				<ul>
					<li>I've fully rewritten the plugin to make it more clean, fast and efficient</li>
					<li>New Design for sharing buttons</li>
					<li>New Admin Panel</li>
					<li>New Email button</li>
					<li>Better Sharing Counts</li>
				</ul>
				<hr>
				<p class="sharify-version-no"><strong>Version 1.6</strong></p>
				<ul>
					<li>New VKontakte share button</li>
					<li>Admin Panel Bug Fixes</li>
					<li>Fixes for CSS confliction with WordPress Backend</li>
					<li>CSS Bug Fixes</li>
				</ul>
				<hr>
				<p class="sharify-version-no"><strong>Version 1.5</strong></p>					
				<ul>
					<li>New control panel design!</li>
					<li>Fix for CSS conflict that broke WordPress Default Tabs</li>
					<li>Share count fix for Twitter, Facebook and Google+</li>
					<li>Font improvements for share button</li>
					<li>Minified CSS, JS for better performance</li>
					<li>Backend improvements</li>
				</ul>
				<hr>
				<p class="sharify-version-no"><strong>Version 1.4</strong></p>					
				<ul>
					<li>Twitter, Facebok, Google+, Reddit, Pocket, LinkedIn, Pinterest buttons fixed!</li>
				</ul>
				<hr>
				<p class="sharify-version-no"><strong>Version 1.3</strong></p>					
				<ul>
					<li>Control Panel - You can now control any buttons you want! (hide or show)</li>
					<li>Share Count feature has been optimised for better performace</li>
					<li>CSS Fixes</li>
				</ul>
				<hr>
				<p class="sharify-version-no"><strong>Version 1.2</strong></p>					
				<ul>
					<li>Fixed LinkedIn button issue</li>
					<li>Changed Facebook Like to Facebook Share</li>
				</ul>
				<hr>
				<p class="sharify-version-no"><strong>Version 1.1</strong></p>					
				<ul>
					<li>Fixed bugs</li>
					<li>Performance Improvements</li>
				</ul>
				<hr>
				<p class="sharify-version-no"><strong>Version 1.0</strong></p>					
				<ul>
					<li>Initial Release</li>
				</ul>
			</div>
			<div class="sec-title">Follow the developer</div>	
			<div id="follow" class="sharify-setting-wrap">
				<div class="sharify-container">
				<ul>
					<li class="sharify-btn-twitter">
						<a title="Follow me on Twitter!" href="https://twitter.com/intent/user?screen_name=@mehedih_">
							<span class="sharify-icon"><i class="sharify sharify-twitter"></i></span>
							<span class="sharify-title">@MehediH_</span>
						</a>
					</li>
					<li class="sharify-btn-email">
						<a title="Feedback!" href="mailto:mehedi.dip@outlook.com">
							<span class="sharify-icon"><i class="sharify sharify-mail"></i></span>
							<span class="sharify-title">Feedback</span>
						</a>
					</li>
				</ul>
				</div>
			</div>
		</form>
</div>