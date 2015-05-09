<?php

if ( 1 == get_option('sharify_cache_counts') ){

	function sharify_get_tweet_count(){
		$sharify_tweet_trans = "sharify_cached_count_twitter_" . get_the_id();

		$sharify_tweet_count = get_transient( $sharify_tweet_trans );

		if ( false === $sharify_tweet_count ) {
		   
		        $sharify_tweet_count = sharify_get_count(''.get_permalink().'', false, false, true, false, false);

		        set_transient($sharify_tweet_trans	, $sharify_tweet_count, 1800);
		}

		return $sharify_tweet_count;
	}

	function sharify_get_share_count(){
		$sharify_share_trans = "sharify_cached_count_share_" . get_the_id();

		$sharify_share_count = get_transient( $sharify_share_trans );

		if ( false === $sharify_share_count ) {
		   
		        $sharify_share_count = sharify_get_count(''.get_permalink().'', false, true, false, false, false);

		        set_transient($sharify_share_trans, $sharify_share_count, 1800);
		}
		return $sharify_share_count;
	}

	function sharify_get_plus_count(){
		$sharify_plus_trans = "sharify_cached_count_plus_" . get_the_id();

		$sharify_plus_count = get_transient( $sharify_plus_trans );

		if ( false === $sharify_plus_count ) {
		   
		        $sharify_plus_count = sharify_get_count(''.get_permalink().'', false, false, false, true, false);

		        set_transient($sharify_plus_trans, $sharify_plus_count, 1800);
		}

		return $sharify_plus_count;
	}
	function sharify_get_linked_count(){
		$sharify_linked_trans = "sharify_cached_count_linked_" . get_the_id();

		$sharify_linked_count = get_transient( $sharify_linked_trans );

		if ( false === $sharify_linked_count ) {
		   
		        $sharify_linked_count = sharify_get_count(''.get_permalink().'', false, false, false, false, true);

		        set_transient($sharify_linked_trans, $sharify_linked_count, 1800);
		}

		return $sharify_linked_count;
	}
}

else{
	function sharify_get_tweet_count(){
		$sharify_notcached_tweet_count = sharify_get_count(''.get_permalink().'', false, false, true, false, faslse);
		return $sharify_notcached_tweet_count;
	}

	function sharify_get_share_count(){
		$sharify_notcached_share_count = sharify_get_count(''.get_permalink().'', false, true, false, false, false);
		return $sharify_notcached_share_count;
	}

	function sharify_get_plus_count(){
		$sharify_notcached_plus_count = sharify_get_count(''.get_permalink().'', false, false, false, true, false);
		return $sharify_notcached_plus_count;
	}
	function sharify_get_linked_count(){
		$sharify_notcached_linked_count = sharify_get_count(''.get_permalink().'', false, false, false, false, true);
		return $sharify_notcached_linked_count;
	}
}
?>