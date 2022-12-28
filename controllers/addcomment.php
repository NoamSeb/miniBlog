<?php
require('../model.php');
$articles = getArticles();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = addComment();
}

require_once("../controllers/article.php");
