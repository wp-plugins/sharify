<?php

//Get Tweet Count
function sharify_get_tweets($url) {
    $twittercount = json_decode( file_get_contents( 'http://urls.api.twitter.com/1/urls/count.json?url='.$url ) );
    return $twittercount->count;
}

//Get Facebook Share Count
function sharify_get_share($url) {
    $facebookcount = json_decode( file_get_contents( 'http://graph.facebook.com/'.$url ) );
    return $facebookcount->shares;   
}

//Get Plus One Count
function sharify_get_plus($url) {

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
?>