<form action="actions/action_add_comment.php" method="POST">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>
        <h2>Add your voice...</h2>
        <input type="hidden" name="article_id" value="<?= $_GET['id'] ?>"/>
        <label>Comment
            <textarea name="comment"></textarea>
        </label>
        <input type="submit" value="Reply">
    <?php } else { ?>
        <p>Login or register to comment...</p>
    <?php } ?>
</form>