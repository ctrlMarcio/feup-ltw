<?php

session_start();

include_once('util/util.php');
include_once('database/connection.php');
include_once('database/news.php');

$db = getDb();
$articles = getAllNews($db);

include 'template/common/header.php';
include 'template/common/website_header.php';
include 'template/common/nav_bar.php';
include 'template/news/list_news.php';
include 'template/common/footer.php';

?>