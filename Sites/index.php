
<?php

use swg\SecretWordGame;

require_once __DIR__ . DIRECTORY_SEPARATOR . "init_autoload.php";
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

    <?php $Game = new SecretWordGame("have fun");

    if(isset($_POST['mot'])) :


//        $valRecu = str_split(htmlspecialchars(strtolower($mot_Post)));
        $mot = $Game->try($_POST['mot']);


        if($mot['win'])
            $Game->generateWin();
        else
            $Game->generateInput(str_split($mot['result']));
        ?>
    <?php else :
        $resul = $Game->try(str_split(""));
        $Game->generateInput(str_split($resul['result']));?>

    <?php endif ?>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>


<?php $title = "Mot cache"; ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title); ?>