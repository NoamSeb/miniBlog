<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog PHP</title>
</head>

<body>
    <form action="traiteLogin.php">
        <label for="name">Entrez votre Login :</label>
        <input type="text" id="login" name="login">
        <label for="name">Entrez votre mot de passe :</label>
        <input type="password" id="PWD" name="PWD">
        <input type="submit">
    </form>
    <form action="disconnect.php">
        <input type="submit" value="deconnexion">
    </form>
    <a href="createUser.php">Pas encore de compte ? Créer en un !</a>
</body>

</html>