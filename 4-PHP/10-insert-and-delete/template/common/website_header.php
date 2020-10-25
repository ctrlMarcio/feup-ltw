<header>
  <h1><a href="list_news.php">Super Legit News</a></h1>
  <h2><a href="list_news.php">Where fake news are born!</a></h2>
  <div id="signup">

    <?php if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == True)) { ?>
      <a href="register.php">Register</a>
      <a href="login.php">Login</a>
    <?php } else { ?>
      <a href="create_article.php">Add article</a>
      <a href="actions/action_logout.php">Logout</a>
    <?php } ?>
    <!-- I DON'T CARE ABOUT CSS RN OK I JUST DON'T @ ME I HAVE BETTER THINGS TO DO LIKE JUMPING OUT FROM MY WINDOW THEN
    LOOKING AT CSS RN OK THANKS F WORD -->

  </div>
</header>