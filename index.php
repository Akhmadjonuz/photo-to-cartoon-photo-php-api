<?php

function convert($name, $image)
{
    $url  = 'https://cartoon.lyrebirdstudio.net/v1/process';
    $ch   = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    $headers    = array();
    $headers[]  = 'Host: cartoon.lyrebirdstudio.net';
    $headers[]  = 'X-AB-Model: cartoon2';
    $headers[]  = 'X-Client-OS: apple';
    $headers[]  = 'Accept: */*';
    $headers[]  = 'X-Cartoon-Token: dUB1Yng1FKeaimyJCcySsXXblb42mUuvqsQfh';
    $headers[]  = 'Content-Type: multipart/form-data';
    $headers[] = 'User-Agent: Cartoon/2.0.55 (com.lyrebirdstudio.cartoon; build:3; iOS 15.4.1) Alamofire/5.6.0';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS,["image"=> $image]);
    $response = curl_exec($ch);
    curl_close($ch);

    file_put_contents($name, $response);
    echo 'Saved in '. $name;

}

$name   = 'new-'.time().'.png';
$image  = new CURLFile('image.jpg');
convert($name, $image);
