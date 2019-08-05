<?php


?>
<?php require 'inc/header.php' ?>
<?php if (empty($this->oEditeurs)): ?>
    <p class="bold">Liste d'editeurs vide.</p>
    <p><button type="button" onclick="window.location='<?=ROOT_URL?>?p=editeur&amp;a=add'" class="bold">ajoutez editeur!</button></p>
<?php else: ?>
   
    <table align="center" style="border: 1px solid black;text-align: center;">
        <tr>
             <th>Name</th>
             <th>Email</th>
             <th>Privilege</th>
        </tr>
        
    
    <?php foreach ($this->oEditeurs as $oEditeur): ?>
        <tr>
             <td><?=$oEditeur->name?></td>
             <td><?=$oEditeur->email?></td>
             <td><?=$oEditeur->privilege?></td>
            
        <?php if(!empty($_SESSION['is_logged'])): ?>

         <td> <button type="button" onclick="window.location='<?=ROOT_URL?>?p=editeur&amp;a=edit&amp;id=<?=$oEditeur->id?>'" class="bold">Modifier</button> |
        <form action="<?=ROOT_URL?>?p=editeur&amp;a=delete&amp;id=<?=$oEditeur->id?>" method="post" class="inline">
        <button type="submit" name="delete" value="1" class="bold">Delete</button>
         </form> |
         </td>
         </tr> 

<?php endif ?>

        <hr class="clear" /><br />
    <?php endforeach ?>
    </table>
    <br />
    <button type="button" onclick="window.location='<?=ROOT_URL?>?p=editeur&amp;a=add'" class="bold">Ajouter Nouveau editeur</button>
    
    
<?php endif ?>

<?php require 'inc/footer.php' ?>
