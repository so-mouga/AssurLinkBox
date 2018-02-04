<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AssurBox</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/vue.css">
</head>
<body>
<p>bonjour : <? echo $devices->user[0]->login ?></p>
<form class="form-horizontal" method="post" action="../index.php">
    <button id="deco" name="deco" class="btn btn-warning center-block">déconnexion</button>
</form>



    <?php foreach ($devices->userDevice as $device ): ?>
    <form class="form-horizontal" method="post" action="../homepage.php">
        <ul class="list-group">
<!--            --><?/* echo "<pre>";print_r($device);  */?>
            <li  class="list-group-item <?php if($device->alert):?>list-group-item-danger<?php endif;?>">
                <?php if (!$device->alert): ?>
                    <label >déclarer un incident pour : <? echo($device->device->name)?></label>
                <?php else:;?>
                    <p>l'alarme à été déclarer à l'assurance</p>
                    <label >fermer la demande d'alarme en cours</label>
                <?php endif;?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="valid" name="valid" class="btn btn-info center-block">envoyer</button>
                    </div>
                </div>
                <input type="hidden" name="idDevice" value="<? echo $device->id ?>">
                <input type="hidden" name="alert-progress" value="<? echo $device->alert ?>">
            </li>
        </ul>
    </form>

        <?php endforeach;  ?>
        <?php exit(); ?>




<?php if (isset($error)): ?>
    <div class="alert alert-danger">
        <strong>Mot de passe ou login faux </strong>
    </div>
<?php endif;?>

</body>
</html>