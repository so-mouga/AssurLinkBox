<?php
session_start();
$idUser = '1';
$login = 'Kevin';
$password = 'root';
$url = 'http://157e3dc2.ngrok.io/app_dev.php/';




$post = [
    'login' => $login,
    'password' => $password,
];

$ch = curl_init($url.'user');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
// execute!
$response = curl_exec($ch);
// close the connection, release resources used
curl_close($ch);
$devices = json_decode($response);
echo "<pre>";
var_dump($devices);
exit();






if(isset($_POST['valid'])){
    $idDevice = $_POST['idDevice'];
    $alert = $_POST['alert-progress'];

    $post = [
        'id' => $idDevice,
        'alarm' => $alert,
    ];

    $ch = curl_init($url.'alarm');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    curl_close($ch);
    $devices = json_decode($response);
    var_dump($alert);exit();

}

$post = [
    'user_id' => 1,
];

$ch = curl_init($url.'user-all-devices');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
// execute!
$response = curl_exec($ch);
// close the connection, release resources used
curl_close($ch);
$devices = json_decode($response);






include 'vue/vue.php';