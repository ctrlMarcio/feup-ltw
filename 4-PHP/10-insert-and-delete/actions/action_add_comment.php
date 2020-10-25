<?php

session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: ../list_news.php");
    die();
}

if (!isset($_POST['comment']) || empty($_POST['comment'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

include_once('../database/connection.php');
include_once('../database/comments.php');

$db = getDb("../database");
addComment($db, $_POST['article_id'], $_SESSION['username'], time(), $_POST['comment']);

header('Location: ' . $_SERVER['HTTP_REFERER']);
