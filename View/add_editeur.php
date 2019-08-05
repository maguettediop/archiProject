
<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<form action="" method="post">

    <p><label for="name">Name:</label><br />
        <input type="text" name="name" id="name" required="required" />
    </p>

    <p><label for="email">Email:</label><br />
        <input type="text" name="email" id="email"  required="required"></textarea>
    </p>
    <p>
    	<label for="privilege">Privilege:</label><br />
        <input type="text" name="privilege" id="privilege"  required="required"></textarea>
    </p>
    <p><input type="submit" name="add_submit" value="Add" /></p>
</form>

<?php require 'inc/footer.php' ?>
