<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    header("Location: ../list_news.php");
    die();
}

include_once("../database/connection.php");
include_once("../database/users.php");

$db = getDb("../database");

if (userExists($db, $_POST["username"], $_POST["password"])) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["loggedin"] = True;
    header("Location: ../list_news.php");
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
