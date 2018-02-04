<?php
session_start();

if(isset($_POST['valid'])){
    $url = 'http://localhost/app_dev.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $post = [
        'login' => $login,
        'password' => $password,
    ];

    $ch = curl_init($url.'/user');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    curl_close($ch);
    $resu = json_decode($response);

    if (!$resu->error){

        $_SESSION['login'] =  $resu->user[0]->login ;
        $_SESSION['password'] =  $resu->user[0]->password ;
        header("Location:homepage.php");
    }else{
        $error = true;
    }
} ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>connexion</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="vue/index.css">
    </head>
    <body>


        <h1 class="text-center title" >Formulaire de connexion</h1>
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label class="control-label col-sm-2" for="login">Login:</label>
                <div class="col-sm-10">
                    <input type="text" name="login" class="form-control" id="login" placeholder="Enter login">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Mot de passe:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="valid" name="valid" class="btn btn-info center-block">Valider</button>
                </div>
            </div>
        </form>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <strong>Mot de passe ou login faux </strong>
            </div>
        <?php endif;?>
    </body>
</html>