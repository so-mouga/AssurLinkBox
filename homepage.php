<?php
session_start();
if (!$_SESSION['login']){
    return;
}

$idUser = '1';
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$url = 'http://6c54c236.ngrok.io/app_dev.php/';

if ($_POST['deco']){
    session_destroy();
    header("Location:index.php");
}
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
}


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



include 'vue/vue.php';