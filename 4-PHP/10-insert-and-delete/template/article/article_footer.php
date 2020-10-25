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
  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>
    <a class="edit_article" href=edit_news.php?id=<?= $article['id'] ?>>Edit this article</a>
  <?php } ?>
</footer>
</article>
</section>