<?php

session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: list_news.php");
    die();
}

if (!isset($_POST['title']) || !isset($_POST['introduction']) || !isset($_POST['fulltext']) || empty($_POST['title']) || empty($_POST['introduction']) || empty($_POST['fulltext'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

include_once('../database/connection.php');
include_once('../database/news.php');

$db = getDb("../database");

$published = time();
if (isset($_POST['tags'])) {
    $tags = $_POST['tags'];
    $taglist = implode(",", $tags);
} else {
    $taglist = "";
}
$username = $_SESSION['username'];

$id = addArticle($db, $_POST['title'], $published, $taglist, $_SESSION['username'], $_POST['introduction'], $_POST['fulltext']);

header("Location: ../news_item.php?id=" . $id);
