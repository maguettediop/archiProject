<?php

?>
<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<?php if (empty($this->oEditeur)): ?>
    <p class="error">Editeur inexistant!</p>
<?php else: ?>

    <form action="" method="post">
        <p><label for="name">Name:</label><br />
            <input type="text" name="name" id="name" value="<?=htmlspecialchars($this->oEditeur->name)?>" required="required" />
        </p>

        <p><label for="email">Email:</label><br />
            <input type="text" name="email" id="email" value="<?=htmlspecialchars($this->oEditeur->email)?>" required="required" />
        </p>
        <p><label for="privilege">Privilege:</label><br />
            <input type="text" name="privilege" id="privilege" value="<?=htmlspecialchars($this->oEditeur->privilege)?>" required="required" />
        </p>
        

        <p><input type="submit" name="edit_submit" value="Update" /></p>
    </form>
<?php endif ?>

<?php require 'inc/footer.php' ?>
