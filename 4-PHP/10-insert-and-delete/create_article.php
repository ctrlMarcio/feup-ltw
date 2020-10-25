<?php

session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: list_news.php");
    die();
}

include_once('database/connection.php');
include_once('database/news.php');

$db = getDb();
$tags = getAllTags($db);

include 'template/common/header.php';
include 'template/common/website_header.php';
include 'template/common/nav_bar.php';
include 'template/form/add_article_form.php';
include 'template/common/footer.php';
