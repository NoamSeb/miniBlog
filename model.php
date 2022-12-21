<?php
function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=db_blog;port:3306', 'root', 'root');
    return $db;
}

function createUser()
{
    $db = dbConnect();
    $requete = "SELECT * FROM utilisateur WHERE login=:login";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':login', $_POST["login"], PDO::PARAM_STR);
    $stmt->execute();

    $prenom = $_POST["firstName"];
    $nom = $_POST["name"];
    $login = $_POST["login"];
    $mdp = $_POST["PWD"];
    $ville = $_POST["city"] ?? "";
    $mdp_check = $_POST["PWDCheck"];
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    // var_dump($stmt -> rowCount());

    if ($stmt->rowCount() == 1) {
        // echo ("Ce login est déjà utilisé, veuillez changer de login ou vous connecter.");
        return 1;
    } else {
        if ($mdp === $mdp_check) {
            $InsertUser = "INSERT INTO utilisateur (prenom, nom, login, mdp, ville) VALUES (:prenom,:nom,:login,:mdp,:ville)";

            $prep = $db->prepare($InsertUser);
            $prep->bindParam('prenom', $prenom, PDO::PARAM_STR);
            $prep->bindParam('nom', $nom, PDO::PARAM_STR);
            $prep->bindParam('login', $login, PDO::PARAM_STR);
            $prep->bindParam('mdp', $hash, PDO::PARAM_STR);
            $prep->bindParam('ville', $ville, PDO::PARAM_STR);
            $prep->execute();

            // echo ("L'utilisateur à été ajouté avec succès !");
            return 2;
        } else {
            // echo ("Les mots de passe sont différents.");
            return 3;
        }
    }
}

function connectUser()
{
    $db = dbConnect();
    $requete = "SELECT * FROM utilisateur where login=:login";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':login', $_GET["login"], PDO::PARAM_STR);
    $stmt->execute();


    if ($stmt->rowCount() == 1) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($_GET['PWD'], $result['mdp'])) {
            echo ("Bonjour " . $result["prenom"]);
            $_SESSION["login"] = $_GET["login"];
            $_SESSION["prenom"] = $result["prenom"];
        } else {
            echo ("Mot de passe incorrect");
        }
    } else {
        echo ("Aucun utilisateur ne correspond à ce login");
    }
}