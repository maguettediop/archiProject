<?php


namespace TestProject\Controller;

class Editeur
{
    const MAX_POSTS = 6;

    protected $oUtil, $oModel;
    private $_iId;
    public $server ;

    public function __construct()
    {

        
        // Enable PHP Session
        if (empty($_SESSION))
            @session_start();

        $this->oUtil = new \TestProject\Engine\Util;


        $this->oUtil->getModel('Editeur');
        $this->oModel = new \TestProject\Model\Editeur;

        /** eviter la duplication de ID **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);

        
    
}


/***** Frontend *****/
    // Homepage
public function index()
{
        $this->oUtil->oEditeurs = $this->oModel->get(0, self::MAX_POSTS); // Get les derniers articles postés

        $this->oUtil->getView('editeurs');
    }

    public function editeur()
    {
        $this->oUtil->oEditeur = $this->oModel->getById($this->_iId); // Get the data of the post

        $this->oUtil->getView('editeur');
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }


    /***** POUR L'ADMIN (BACKEND) *****/
    public function all()
    {
        if (!$this->isLogged()) exit;

        $this->oUtil->oEditeurs = $this->oModel->getAll();

        $this->oUtil->getView('editeurs');
    }
    
    /*** Ajout d'article ***/
    public function add()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['add_submit']))
        {
            if (isset($_POST['name'], $_POST['email'], $_POST['privilege'] ) ) 
            {
                $aData = array('name' => $_POST['name'], 'email' => $_POST['email'], 'privilege' => $_POST['privilege']);

                if ($this->oModel->add($aData))
                    $this->oUtil->sSuccMsg = 'article ajouté.';
                else
                    $this->oUtil->sErrMsg = '   Erreur survenue.';
            }
            else
            {
                $this->oUtil->sErrMsg = 'Tous les champs sont requis';
            }
        }

        $this->oUtil->getView('add_editeur');
    }
    
    /*** Modification de l'article ***/
    public function edit()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['edit_submit']))
        {
            if (isset($_POST['name'], $_POST['email'], $_POST['privilege'] ))
            {
                $aData = array('editeur_id' => $this->_iId, 'name' => $_POST['name'], 'email' => $_POST['email'], 'privilege' => $_POST['privilege']);

                if ($this->oModel->update($aData))
                    $this->oUtil->sSuccMsg = 'Editeur mis à jour.';
                else
                    $this->oUtil->sErrMsg = 'Veuillez reessayer';
            }
            else
            {
                $this->oUtil->sErrMsg = 'Tous les champs sont requis.';
            }
        }

        /* Retourne les données de l'article*/
        $this->oUtil->oEditeur = $this->oModel->getById($this->_iId);

        $this->oUtil->getView('edit_editeur');
    }
    /*** Suppression ***/
    public function delete()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId))
            header('Location: ' . ROOT_URL);
        else
            exit('editeur ne peut pas être supprimé.');
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
