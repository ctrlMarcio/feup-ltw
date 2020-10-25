<?php

session_start();

include_once('util/util.php');
include_once('database/connection.php');
include_once('database/comments.php');

$db = getDb();
$article = getArticle($db);
$comments = getComments($db);

include 'template/common/header.php';

include 'template/common/website_header.php';
include 'template/common/nav_bar.php';
include 'template/article/article.php';
include 'template/common/footer.php';

?>