<?php

session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: list_news.php");
    die();
}

include_once('../database/connection.php');
include_once('../database/news.php');

$id = $_POST['id'];
$title = $_POST['title'];
$introduction = $_POST['introduction'];
$fulltext = $_POST['fulltext'];

$db = getDb("../database");
updateArticle($db, $id, $title, $introduction, $fulltext);

header("Location: ../news_item.php?id=" . $id);

?>