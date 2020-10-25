<section id="add_article" class="article_edition">
    <h1>Add article</h1>
    <form action="actions/action_add_article.php" method="post">
       <label>
            Title <input type="text" name="title">
        </label>

        <div id="checkboxes">
            <?php foreach ($tags as $tag) { ?>
                <label>
                    <input type="checkbox" name="tags[]" value="<?= $tag ?>"> <?= $tag ?>
                </label>
            <?php } ?>
        </div>
        <label>
            Introduction <textarea id="introduction" name="introduction" row="599"></textarea>
        </label>
        <label>
            Full text <textarea id="fulltext" name="fulltext"></textarea>
        </label>
        <input type="submit">
    </form>
</section>