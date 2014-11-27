<?php

function sharesCounter($sharify_url = '', $echo = true, $facebook = true, $twitter = true, $gplus = true, $linkedin = true) {
    $shares = 0; 
    if ( !isset($sharify_url) || $sharify_url === '' ) {
        if ( isset($_SERVER['https']) ) { 
            $protocol = 'https://';
        } else {
            $protocol = 'http://'; 
        }
        $sharify_url =  $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }
    if ( $facebook ) { // Facebook is active?
        $sharify_url_fb = "http://api.facebook.com/restserver.php?method=links.getStats&urls=" . $sharify_url; 
        $data_fb = simplexml_load_file($sharify_url_fb); 
        if ( isset($data_fb->link_stat->share_count) ) { 
            $shares += $data_fb->link_stat->share_count; 
        }
    }
    if ( $twitter ) { // Twitter is active?
        $sharify_url_tw = "http://urls.api.twitter.com/1/urls/count.json?url=" . $sharify_url;
        $data_tw = json_decode(file_get_contents($sharify_url_tw)); 
        if ( isset($data_tw->count) ) { 
            $shares = $shares + $data_tw->count; 
        }
    }
    if ( $gplus ) { 
        $curl = curl_init(); 
        curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc"); 
        curl_setopt($curl, CURLOPT_POST, 1); 
        curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $sharify_url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]'); // Defines the fields of the POST request
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        $curl_results = curl_exec ($curl); 
        curl_close ($curl); 
        $json = json_decode($curl_results, true); 
        if ( isset($json) && isset($json[0]['result']['metadata']['globalCounts']['count']) ) { 
            $result = intval($json[0]['result']['metadata']['globalCounts']['count']); 
            $shares += $result; 
        }
    }
    if ( $linkedin ) { 
        $sharify_url_ln = "http://www.linkedin.com/countserv/count/share?url=" . $sharify_url . "&format=json"; 
        $data_ln = json_decode(file_get_contents($sharify_url_ln)); 
        if ( isset($data_ln->count) ) { 
            $shares += $data_ln->count; 
        }
    }
    if ( $echo ) { 
        echo intval($shares); 
    } else {
        return intval($shares); 
    }
}
?>