<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    header("Location: ../list_news.php");
    die();
}

include_once("../database/connection.php");
include_once("../database/users.php");

$db = getDb("../database");

if (usernameUsed($db, $_POST['username'])) {
    $_SESSION['register_error'] = "Username already in use";
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else if (!insertUser($db, $_POST['username'], $_POST['password'], $_POST['name'])) {
    $_SESSION['register_error'] = "Database error";
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    $_SESSION['register_error'] = "Registered!";
    header("Location: ../login.php");
}
