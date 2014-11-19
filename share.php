<?php

// Get Post Title and Permalink
$title = get_the_title();
$url   = get_permalink();

// Get Share Count
require_once "share_count.php";
$SharifyCount  = new SharifyCount($url);
$facebookCount = $SharifyCount->getFacebookCount();

echo '
		<div class="si-share-box">
			<a href="https://twitter.com/intent/tweet?text=' . $title . ' - ' . $url . '" onclick="window.open(this.href, \'mywin\',
		    \'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button si-button-twitter" title="Tweet on Twitter">
				<div class="si-share-main">
					<i class="sharify-twitter sharify"></i>
					<p class="si-share-text">Tweet</p>
				</div>
				<div class="si-share-counter"><p class="si-share-count-text">' . $SharifyCount->getTweetCount() . '</p></div>
			</div>
			</a>

			<a href="http://www.facebook.com/sharer.php?u=' . urlencode($url) . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button si-button-facebook" title="Share link on Facebook">
				<div class="si-share-main">
					<i class="sharify-facebook sharify"></i>
					<p class="si-share-text">Share</p>
				</div>
				<div class="si-share-counter"><p class="si-share-count-text">' . $facebookCount['share_count'] . '</p></div>
			</div>
			</a>
			
			<a href="http://plus.google.com/share?url=' . $url . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button si-button-gplus" title="Share link on Google+">
				<div class="si-share-main">
					<i class="sharify-gplus sharify"></i>
					<p class="si-share-text">+1</p>
				</div>
				<div class="si-share-counter"><p class="si-share-count-text">' . get_plusones_si($url) . '</p></div>
			</div>
			</a>

			<a href="https://getpocket.com/save?url=' . urlencode($url) . '&amp;media=' . (!empty($image[0]) ? $image[0] : '') . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button-small si-button-pocket" title="Save to Pocket">
				<i class="sharify-pocket sharify-small sharify"></i>
			</div>
			</a>

			<a class="si-share-box" href="http://reddit.com/submit?url=' . $url . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button-small si-button-reddit"  title="Share link on Reddit">
				<i class="sharify-reddit sharify sharify-small"></i>
			</div>
			</a>

			<a class="si-share-box" href="https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&title='. $title .'" onclick="if(!document.getElementById(\'td_social_networks_buttons\')){window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;}" >
			<div class="si-button-small si-button-linkedin" title="Share link on LinkedIn">
				<i class="sharify-linkedin sharify sharify-small"></i>
			</div>
			</a>

			<a class="si-share-box" href="http://pinterest.com/pin/create/button/?url=' . $url . '&amp;media=' . (!empty($image[0]) ? $image[0] : '') . '" onclick="window.open(this.href, \'mywin\',
			\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
			<div class="si-button-small si-button-pinterest" title="Pin it on Pinterest">
				<i class="sharify-pinterest sharify sharify-small"></i>
			</div>
			</a>

		</div>
	';
?>