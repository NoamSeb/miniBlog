<?php

require('../model.php');

$article = getArticle($_GET['id']);

if (empty($article)) {
    header('location: ../index.php');
}

require_once('../views/article.php');