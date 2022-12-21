<?php
require('../model.php');

$result=createUser();
if ($result ==2){
    include('./views/connectUser.php');
}else{
    include('./views/createUser.php');
}

if(createUser()){
    header("index.php");
}
?>