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