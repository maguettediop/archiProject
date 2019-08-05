<?php

?>
<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<form action="" method="post">

    <p><label for="email">Email:</label><br />
        <input type="email" name="email" id="email" required="required" />
    </p>

    <p><label for="password">Mot de passe:</label><br />
        <input type="password" name="password" id="password" required="required" />
    </p>

    <p><input type="submit" value="Connexion" /></p>
</form>

<?php require 'inc/footer.php' ?>
