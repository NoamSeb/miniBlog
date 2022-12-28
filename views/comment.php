<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniBlog</title>
    <?php 
    $commentaires = getComments();
    ?>
</head>

<body>
    <?php
    if (isset($_SESSION['login'])) { ?>
        <form method="POST" action="../controllers/addcomment.php">
            <label for="contenuComment">Laissez un commentaire :</label>
            <textarea id="contenuComment" name="contenuComment" rows="4" required></textarea>
            <input type="submit">
        </form>
    <?php } ?>
    <?php foreach ($commentaires as $commentaire) { ?>
        <p><?= $commentaire['contenu_commentaire'] ?></p>
        <p><?= $commentaire['contenu_commentaire'] ?></p>
        <p><?= $commentaire['date_commentaire'] ?></p>
    <?php } ?>

</body>

</html>