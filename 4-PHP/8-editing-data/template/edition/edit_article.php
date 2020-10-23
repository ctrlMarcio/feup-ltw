<section id="edit_article">
    <h1>Edit article</h1>
    <form>
        <input type="hidden" id="<?= $_GET['id'] ?>">
        <label>
          Title <input type="text" name="title" value="<?= $article['title'] ?>">
        </label>
        <label>
          Introduction <textarea id="introduction" name="introduction" row="599" ><?= $article['introduction'] ?></textarea>
        </label>
        <label>
          Full text <textarea id="fulltext" name="full_text"><?= $article['fulltext'] ?></textarea>
        </label>
        <input type="submit">
    </form>
</section>
