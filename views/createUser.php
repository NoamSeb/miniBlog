<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog PHP</title>
</head>

<body>
    <form action="/miniBlog/controllers/connexion.php" method="POST">
        <label for="name">Entrez votre nom*</label>
        <input type="text" id="name" name="name" required>
        <label for="firstName">Entrez votre prénom*</label>
        <input type="text" id="firstName" name="firstName" required>
        <label for="login">Entrez votre login*</label>
        <input type="text" id="login" name="login" required>
        <?php if(isset($result) && ($result==1)){
            echo("Ce login est déjà utilisé, veuillez changer de login ou vous connecter.");
        }
        ?>
        <label for="PWD">Entrez votre mot de passe*</label>
        <input type="password" id="PWD" name="PWD" required>
        <label for="PWDCheck">Confirmez le mot de passe*</label>
        <input type="password" id="PWDCheck" name="PWDCheck" required>
        <?php if(isset($result) && ($result==3)){
            echo("Les mots de passe sont différents.");
        }
        ?>
        <label for="city">Entrez votre ville de résidence</label>
        <input type="text" id="city" name="city">
        <input type="submit" value="créer utilisateur">
    </form>
</body>

</html>