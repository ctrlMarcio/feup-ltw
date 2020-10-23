<section id="news">
    <article>
      <header>
        <h1><a href="#"><?php echo $article['title'] ?></a></h1>
      </header>
      <img src="https://picsum.photos/2000" alt="">
      <p><?php echo $article['introduction'] ?></p>
      <p><?php echo $article['fulltext'] ?></p>

      <?php include 'comments.php' ?>
      <?php include 'article_footer.php' ?>