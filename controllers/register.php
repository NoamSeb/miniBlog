<?php
require('../model.php');

$result = createUser();
if ($result == 2){
    echo "Votre compte à bien été créer, vous pouvez maintenant vous connecter !";
    require_once('../views/connexion.php');
}else{
    require_once('../views/register.php');
}