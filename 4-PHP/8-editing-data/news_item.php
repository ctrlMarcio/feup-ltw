<?php
include_once('util.php');
include_once('database/connection.php');
include_once('database/comments.php');
$db = getDb();
$article = getArticle($db);
$comments = getComments($db);
?>

<?php include 'template/common/header.php' ?>

<?php include 'template/common/website_header.php' ?>
 <?php include 'template/common/nav_bar.php' ?>
 <?php include 'template/common/related_aside.php' ?>
 <?php include 'template/article/article.php' ?>

<?php include 'template/common/footer.php' ?>