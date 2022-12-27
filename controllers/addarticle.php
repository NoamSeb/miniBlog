<?php
require('../model.php');

if(isset($_SESSION['id'!==1])){
       header('location: ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = addarticle();
}

require_once('../views/addarticle.php');
