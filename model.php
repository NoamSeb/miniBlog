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
    $mail = $_POST["mail"];
    $mdp_check = $_POST["PWDCheck"];
    $hash = password_hash($mdp, PASSWORD_DEFAULT);

    if ($stmt->rowCount() == 1) {
        return 1;
    } else {
        if ($mdp === $mdp_check) {
            $InsertUser = "INSERT INTO utilisateur (prenom, nom, login, password, mail) VALUES (:prenom,:nom,:login,:mdp,:mail)";

            $prep = $db->prepare($InsertUser);
            $prep->bindParam('prenom', $prenom, PDO::PARAM_STR);
            $prep->bindParam('nom', $nom, PDO::PARAM_STR);
            $prep->bindParam('login', $login, PDO::PARAM_STR);
            $prep->bindParam('mdp', $hash, PDO::PARAM_STR);
            $prep->bindParam('mail', $mail, PDO::PARAM_STR);
            $prep->execute();

            return 2;
        } else {
            return 3;
        }
    }
}

function connectUser()
{
    $db = dbConnect();
    $requete = "SELECT * FROM utilisateur where login=:login";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':login', $_POST["login"], PDO::PARAM_STR);
    $stmt->execute();


    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($_POST['password'], $user['password'])) {
            return $user;
        }
        return false;
    }
    return false;
}

function getArticles(){
    $db = dbConnect();
    $query = $db->query("SELECT * FROM articles");
    return $query->fetchall(PDO::FETCH_ASSOC);
}

function getArticle($id){
    $db = dbConnect();
    $query = $db->query("SELECT * FROM articles WHERE id_article=$id");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addarticle(){
    $db = dbConnect();
    
    $requete = "SELECT * FROM articles";
    $stmt = $db->query($requete);
    $stmt->fetchAll(PDO::FETCH_ASSOC);
   

    $nom= $_POST["nomArticle"];
    $contenu = $_POST["contenuArticle"];
    $date = (new \DateTime('now'))->format('d-m-Y');

    $insertarticle = "INSERT INTO articles (nom_article, contenu_article, date_article) VALUES (:article, :contenu, :date)";

    $prep = $db->prepare($insertarticle);
    $prep->bindParam('article', $nom, PDO::PARAM_STR);
    $prep->bindParam('contenu', $contenu, PDO::PARAM_STR);
    $prep->bindParam('date', $date, PDO::PARAM_STR);
    return $prep->execute();

}