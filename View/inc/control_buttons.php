
<?php if(!empty($_SESSION['is_logged'])): ?>

    <button type="button" onclick="window.location='<?=ROOT_URL?>?p=blog&amp;a=edit&amp;id=<?=$oPost->id?>'" class="bold">Modifier</button> |
    <form action="<?=ROOT_URL?>?p=blog&amp;a=delete&amp;id=<?=$oPost->id?>" method="post" class="inline">
        <button type="submit" name="delete" value="1" class="bold">Delete</button>
    </form> |
    <button type="button" onclick="window.location='<?=ROOT_URL?>?p=blog&amp;a=add'" class="bold">Ajouter Nouvel Article</button>
    <button type="button" onclick="window.location='<?=ROOT_URL?>?p=editeur&amp;a=index'" class="bold">Gestion Editeur</button>

<?php endif ?>
