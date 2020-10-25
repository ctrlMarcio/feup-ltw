<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    header("Location: ../list_news.php");
    die();
}

include 'template/common/header.php';
include 'template/common/website_header.php';
include 'template/common/nav_bar.php';
include 'template/form/register_form.php';
include 'template/common/footer.php';
