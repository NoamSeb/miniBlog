<?php
require('../model.php');

$result = connectUser();
if ($result == false){
    require_once ('../views/connexion.php');
}else{
    session_start();
    $_SESSION['login']=$result['login'];
    $_SESSION['id']=$result['id_user'];
    header('location: ../index.php');
}
 
