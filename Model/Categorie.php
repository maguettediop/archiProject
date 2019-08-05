<?php
namespace TestProject\Model;

class Categorie {
  private $oDb;
  private $dateCreation;
  private $libele;

  public function __construct() {
      $this->oDb = new \TestProject\Engine\Db;
   }
  public  function getCategories() {
     $categories = $this->oDb->query('SELECT * FROM categorie ');
    return $categories->fetchAll(\PDO::FETCH_OBJ);
   }

  }
 ?>
