<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniBlog - <?=$article[0]['nom_article']?></title>
    <?php
    if (null == session_start()) {
        session_start();
    } ?>
</head>
<body>
    <a href="../index.php"><<< retour à la page d'accueil</a>
    <h1><?=$article[0]['nom_article']?></h1>
    <p><?=$article[0]['contenu_article']?></p>
    <p><?=$article[0]['date_article']?></p>
</body>
</html>
