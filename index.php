<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Blog</title>
    <?php
    require('model.php');
    $articles = getArticles();
    if (null == session_start()) {
        session_start();
    } ?>
</head>

<body>
    <?php
    if (isset($_SESSION['login'])) {
        echo ("Bonjour " . $_SESSION['login']); ?>
        <form action="./controllers/logout.php">
            <input type="submit" value="deconnexion">
        </form>
    <?php } ?>
    <?php
    if (isset($_SESSION['id'])==1) { ?>
    <a href="./controllers/addarticle.php">Créer un article</a>
    <?php } ?>

    <h1>page article</h1>
    <?php
    if (!isset($_SESSION['login'])) { ?>
        <p><a href="login.html">Connexion/inscription</a></p>
    <?php } ?>
    <?php foreach ($articles as $article) { ?>
        <h2><?= $article['nom_article'] ?></h2>
        <a href="./controllers/article.php?id=<?=$article['id_article']?>">Lire cet article</a>
    <?php } ?>
</body>

</html>