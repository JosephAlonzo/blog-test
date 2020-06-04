<?php

$endpoint = 'https://randomuser.me/api/?results=20';
$session = curl_init($endpoint);

// indicates that we want the response back
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
// exec curl and get the data back
$data = curl_exec($session);

if(curl_errno($session))
{
    echo 'Curl error: ' . curl_error($session);
}

// remember to close the curl session once we are finished retrieveing the data
curl_close($session);
// decode the json data to make it easier to parse the php
$search_results = json_decode($data,true);

var_dump($data);
?>