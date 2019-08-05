<?php
namespace TestProject\Engine;
$cat=new \TestProject\Model\Categorie();
$categories=$cat->getCategories();

?>
<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<form action="" method="post">

    <p><label for="title">Titre:</label><br />
        <input type="text" name="title" id="title" required="required" />
    </p>

    <p><label for="body">Corps:</label><br />
        <textarea name="body" id="body" rows="5" cols="35" required="required"></textarea>
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
    <p><input type="submit" name="add_submit" value="Add" /></p>
</form>

<?php require 'inc/footer.php' ?>
