<?php

$post = [
    'login' => 'Kevfrefin',
    'password' => 'root',
];

$ch = curl_init('http://4675bb19.ngrok.io/app_dev.php/userInfo');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
var_dump(($response));