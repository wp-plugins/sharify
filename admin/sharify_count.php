<?php

//Get Tweet Count
function sharify_get_tweets($url) {

    $json_string = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
    $json = json_decode($json_string, true);

    return intval( $json['count'] );
}

//Get Facebook Share Count
function sharify_get_share($url) {

    $json_string = file_get_contents('http://graph.facebook.com/?ids=' . $url);
    $json = json_decode($json_string, true);

    return intval( $json[$url]['shares'] );
}

//Get Plus One Count
function sharify_get_plusone($url) {

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    $curl_results = curl_exec ($curl);
    curl_close ($curl);

    $json = json_decode($curl_results, true);

    return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
}

function sharify_tweet_count(){
    $sharify_cache_tweet = get_transient( 'sharify_cache_tweet' );
    if ( false === $sharify_cache_tweet ) { 
        $sharify_cache_tweet = sharify_get_tweets(get_permalink());
        set_transient('sharify_cache_tweet', $sharify_cache_tweet, 3593);
    }
    return $sharify_cache_tweet;
}

function sharify_share_count(){
    $sharify_cache_share = get_transient( 'sharify_cache_share' );
    if ( false === $sharify_cache_share ) { 
        $sharify_cache_share = sharify_get_share(get_permalink());
        set_transient('sharify_cache_share', $sharify_cache_share, 3583);
    }
    return $sharify_cache_share;
}

function sharify_plus_count(){
    $sharify_cache_plus = get_transient( 'sharify_cache_plus' );
    if ( false === $sharify_cache_plus ) { 
        $sharify_cache_plus = sharify_get_plusone(get_permalink());
        set_transient('sharify_cache_plus', $sharify_cache_plus, 3571);
    }
    return $sharify_cache_plus;
}
?>