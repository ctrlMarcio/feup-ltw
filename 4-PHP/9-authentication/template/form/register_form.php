<?php session_start() ?>

<section id="register">
    <h1>Register</h1>
    <form action="actions/action_register.php" method="post">
        <label>
            Username <input type="text" name="username">
        </label>
        <label>
            Name <input type="text" name="name">
        </label>
        <label>
            Password <input type="password" name="password">
        </label>
        <input type="submit" value="Register">
    </form>
    <?php if (isset($_SESSION['register_error'])) echo $_SESSION['register_error']; ?>
</section>