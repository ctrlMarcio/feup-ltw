<section id="comments">
  <h1>
    <?php
    $amount = count($comments);
    echo $amount;
    echo " comment";
    if ($amount !== 1)
      echo "s";
    ?>
  </h1>

  <?php foreach ($comments as $comment) { ?>
    <article class="comment">
      <span class="user"><?= $comment['username'] ?></span>
      <span class="date"><?= getTimePassed($comment['published']) ?></span>
      <p> <?= $comment['text'] ?> </p>
    </article>
  <?php }  ?>

  <?php include 'template/form/add_comment_form.php' ?>

</section>