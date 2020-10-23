<section id="news">
    <?php
    foreach ($articles as $article) { ?>
      <article>
        <header>
          <h1><a href=<?= "\"news_item.php?id=" . $article['id'] . "\"" ?>><?= $article['title'] ?></a></h1>
        </header>
        <img src="https://picsum.photos/2000" alt="">
        <p><?= $article['introduction'] ?></p>
        <p><?= $article['fulltext'] ?></p>
        <footer>
          <span class="author"><?= $article['name'] ?></span>
          <span class="tags">
            <?php
            $tags = getTags($article);
            foreach ($tags as $tag) { ?>
              <a href="list_news.php">#<?= $tag ?></a>
            <?php } ?>
          </span>
          <span class="date"><?= getTimePassed($article['published']) ?></span>
          <a class="comments" href=<?= "\"news_item.php?id=" . $article['id'] . "#comments\"" ?>><?= $article['comments'] ?></a>
        </footer>
      </article>
    <?php } ?>
  </section>