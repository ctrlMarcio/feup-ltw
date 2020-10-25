<section id="edit_article">
  <h1>Edit article</h1>
  <form action="actions/action_edit_news.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <label>
      Title <input type="text" name="title" value="<?= $article['title'] ?>">
    </label>
    <label>
      Introduction <textarea id="introduction" name="introduction" row="599"><?= $article['introduction'] ?></textarea>
    </label>
    <label>
      Full text <textarea id="fulltext" name="fulltext"><?= $article['fulltext'] ?></textarea>
    </label>
    <input type="submit">
  </form>
</section>