<?php

//$url='http://api.weibo.com/2/statuses/home_timeline.json?source=4114245531&count=2';

$url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=22&userip=USERS-IP-ADDRESS&start=0&rsz=6";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, "http://http://www.luckyxue.com/"/* Enter the URL of your site here */);
$body = curl_exec($ch);
curl_close($ch);
var_dump($body);
?>