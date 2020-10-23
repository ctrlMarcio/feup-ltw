<?php
include_once('util.php');
include_once('database/connection.php');
include_once('database/news.php');
$db = getDb();
$articles = getAllNews($db);
?>

<?php include 'template/common/header.php' ?>

  <?php include 'template/common/website_header.php' ?>
  <?php include 'template/common/nav_bar.php' ?>
  <?php include 'template/common/related_aside.php' ?>

  <?php include 'template/news/list_news.php' ?>

<?php include 'template/common/footer.php' ?>