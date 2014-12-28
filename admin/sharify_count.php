<?php
/*
 * ShareCount - Get the share counts of URLs from various social networks
 *
 * (c) 2013 Kevin Selwyn
 *
 */
class ShareCount {
    public $url = "";
    private $api = array(
        array("network" => "facebook",
              "query"   => "http://graph.facebook.com/?id={{url}}",
              "count"   => "shares"),
        array("network" => "linkedin",
              "query"   => "http://www.linkedin.com/countserv/count/share?url={{url}}&format=json",
              "count"   => "count"),
        array("network" => "pinterest",
              "query"   => "http://api.pinterest.com/v1/urls/count.json?callback=a&url={{url}}",
              "count"   => "count"),
        array("network" => "twitter",
              "query"   => "http://urls.api.twitter.com/1/urls/count.json?url={{url}}",
              "count"   => "count")
    );
    private $counts = array(
        "facebook" => 0,
        "gplus" => 0,
        "linkedin" => 0,
        "pinterest" => 0,
        "twitter" => 0
    );
    public function __construct($url = "") {
        if ($url) {
            $this->url($url);
            return false;
        }
        return true;
    }
    public function getData($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = preg_replace('/^(a\()|(\))$/', '', $data);
        return $data;
    }
    public function postData($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . rawurldecode($url) . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    public function getCounts() {
        $url = $this->url;
        $api = $this->api;
        for ($i = 0, $l = count($api); $i < $l; $i++) {
            $network = $api[$i]["network"];
            $query = $api[$i]["query"];
            $count = $api[$i]["count"];
            $json = $this->getData(str_replace("{{url}}", $url, $query));
            $data = json_decode($json);
            $this->counts[$network] = $data->{$count};
        }
        return $this;
    }
    public function getCountsGoogle() {
        $url = $this->url;
        $count = json_decode($this->postData($url));
        $this->counts["gplus"] = $count[0]->result->metadata->globalCounts->count;
        return $this;
    }
    
    public function url($url) {
        if ($url === "") { return; }
        $this->url = $url;
        $this->getCounts()->getCountsGoogle();
        return $this->counts;
    }
    public function facebook($url = "") {
        $this->url($url);
        return $this->counts["facebook"];
    }
    public function gplus($url = "") {
        $this->url($url);
        return $this->counts["gplus"];
    }
    public function linkedin($url = "") {
        $this->url($url);
        return $this->counts["linkedin"];
    }
    public function pinterest($url = "") {
        $this->url($url);
        return $this->counts["pinterest"];
    }
    public function twitter($url = "") {
        $this->url($url);
        return $this->counts["twitter"];
    }
}
?>