<?php
namespace TestProject\Engine;
$cat=new \TestProject\Model\Categorie();
$categories=$cat->getCategories();

?>
<div id="menu">
	<h1>Catégories</h1><hr width="20%">
	<ul>
		<li><a href="index.php">Tout</a></li>
		<?php foreach ($categories as $categorie): ?>
			<li><a href="#"><?= $categorie->libele ?></a></li>
		<?php endforeach ?>
		
	</ul>
</div>
