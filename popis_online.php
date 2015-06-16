<?php

session_start();
header('Content-type: application/json ; charset=UTF-8');
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://stipe.predanic.com/TVZ/podaci.php");

// grab URL and pass it to the browser
$ispis=(curl_exec($ch));
var_dump(json_decode($ch,true));
// close cURL resource, and free up system resources
curl_close($ch);

?>