<?php
include_once('util.php');
include_once('database/connection.php');
include_once('database/comments.php');
$db = getDb();
$article = getArticle($db);
$comments = getComments($db);
?>


<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Super Legit News</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <link href="layout.css" rel="stylesheet">
  <link href="responsive.css" rel="stylesheet">
  <link href="comments.css" rel="stylesheet">
  <link href="forms.css" rel="stylesheet">
</head>

<body>
  <header>
    <h1><a href="list_news.php">Super Legit News</a></h1>
    <h2><a href="list_news.php">Where fake news are born!</a></h2>
    <div id="signup">
      <a href="#">Register</a>
      <a href="#">Login</a>
    </div>
  </header>
  <nav id="menu">
    <!-- just for the hamburguer menu in responsive layout -->
    <input type="checkbox" id="hamburger">
    <label class="hamburger" for="hamburger"></label>

    <ul>
      <li><a href="list_news.php">Local</a></li>
      <li><a href="list_news.php">World</a></li>
      <li><a href="list_news.php">Politics</a></li>
      <li><a href="list_news.php">Sports</a></li>
      <li><a href="list_news.php">Science</a></li>
      <li><a href="list_news.php">Weather</a></li>
    </ul>
  </nav>
  <aside id="related">
    <article>
      <h1><a href="#">Duis arcu purus</a></h1>
      <p>Etiam mattis convallis orci eu malesuada. Donec odio ex, facilisis ac blandit vel, placerat ut lorem. Ut id sodales purus. Sed ut ex sit amet nisi ultricies malesuada. Phasellus magna diam, molestie nec quam a, suscipit finibus dui. Phasellus a.</p>
    </article>
    <article>
      <h1><a href="#">Sed efficitur interdum</a></h1>
      <p>Integer massa enim, porttitor vitae iaculis id, consequat a tellus. Aliquam sed nibh fringilla, pulvinar neque eu, varius erat. Nam id ornare nunc. Pellentesque varius ipsum vitae lacus ultricies, a dapibus turpis tristique. Sed vehicula tincidunt justo, vitae varius arcu.</p>
    </article>
    <article>
      <h1><a href="#">Vestibulum congue blandit</a></h1>
      <p>Proin lectus felis, fringilla nec magna ut, vestibulum volutpat elit. Suspendisse in quam sed tellus fringilla luctus quis non sem. Aenean varius molestie justo, nec tincidunt massa congue vel. Sed tincidunt interdum laoreet. Vivamus vel odio bibendum, tempus metus vel.</p>
    </article>
  </aside>
  <section id="news">
    <article>
      <header>
        <h1><a href="#"><?php echo $article['title'] ?></a></h1>
      </header>
      <img src="https://picsum.photos/2000" alt="">
      <p><?php echo $article['introduction'] ?></p>
      <p><?php echo $article['fulltext'] ?></p>
      <section id="comments">
        <h1><?php
            $amount = count($comments);
            echo $amount;
            echo " comment";
            if ($amount !== 1)
              echo "s";
            ?> </h1>
        <?php foreach ($comments as $comment) { ?>
          <article class="comment">
            <span class="user"><?= $comment['username'] ?></span>
            <span class="date"><?= getTimePassed($comment['published']) ?></span>
            <p> <?= $comment['text'] ?> </p>
          </article>
        <?php } ?>
        <form>
          <h2>Add your voice...</h2>
          <label>Username
            <input type="text" name="username">
          </label>
          <label>E-mail
            <input type="email" name="email">
          </label>
          <label>Comment
            <textarea name="comment"></textarea>
          </label>
          <input type="submit" value="Reply">
        </form>
      </section>
      <footer>
        <span class="author"> <?= $article['name'] ?> </span>
        <span class="tags">
          <?php
          $tags = getTags($article);
          foreach ($tags as $tag) { ?>
            <a href="list_news.php">#<?= $tag ?></a>
          <?php } ?>
        </span>
        <span class="date"><?= getTimePassed($article['published']) ?></span>
        <a class="comments" href="#comments"><?= count($comments) ?></a>
      </footer>
    </article>
  </section>
  <footer>
    <p>&copy; Fake News, 2017</p>
  </footer>
</body>

</html>

<?php

?>