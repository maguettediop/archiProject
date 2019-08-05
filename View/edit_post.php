<?php

?>
<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<?php if (empty($this->oPost)): ?>
    <p class="error">Article inexistant!</p>
<?php else: ?>

    <form action="" method="post">
        <p><label for="title">Titre:</label><br />
            <input type="text" name="title" id="title" value="<?=htmlspecialchars($this->oPost->title)?>" required="required" />
        </p>

        <p><label for="body">Corps:</label><br />
            <textarea name="body" id="body" rows="5" cols="35" required="required"><?=htmlspecialchars($this->oPost->body)?></textarea>
        </p>
        <p>
        <select name="categorie" id="categorie">
        <?php
            foreach ($categories as $categorie)
            {?> <option value=<?=$categorie->id;?>><?=$categorie->id;?></option>
        <?php
                }
                ?>
        </select>
       </p>

        <p><input type="submit" name="edit_submit" value="Update" /></p>
    </form>
<?php endif ?>

<?php require 'inc/footer.php' ?>
