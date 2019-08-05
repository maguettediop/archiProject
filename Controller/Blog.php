<?php


namespace TestProject\Controller;

class Blog
{
    const MAX_POSTS = 6;

    protected $oUtil, $oModel;
    private $_iId;

    public function __construct()
    {
        // Enable PHP Session
        if (empty($_SESSION))
            @session_start();

        $this->oUtil = new \TestProject\Engine\Util;

      
        $this->oUtil->getModel('Blog');
        $this->oModel = new \TestProject\Model\Blog;

        /** eviter la duplication de ID **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    /***** Frontend *****/
    // Homepage
    public function index()
    {
        $this->oUtil->oPosts = $this->oModel->get(0, self::MAX_POSTS); // Get les derniers articles postés

        $this->oUtil->getView('index');
    }

    public function post()
    {
        $this->oUtil->oPost = $this->oModel->getById($this->_iId); // Get the data of the post

        $this->oUtil->getView('post');
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }


    /***** POUR L'ADMIN (BACKEND) *****/
    public function all()
    {
        if (!$this->isLogged()) exit;

        $this->oUtil->oPosts = $this->oModel->getAll();

        $this->oUtil->getView('index');
    }

 /*** Ajout d'article ***/
    public function add()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['add_submit']))
        {
            if (isset($_POST['title'], $_POST['body']) && mb_strlen($_POST['title']) <= 200) 
            {
                $aData = array('title' => $_POST['title'], 'body' => $_POST['body'], 'categorie' => $_POST['categorie'], 'created_date' => date('Y-m-d H:i:s'));

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

        $this->oUtil->getView('add_post');
    }

     /*** Modification de l'article ***/
    public function edit()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['edit_submit']))
        {
            if (isset($_POST['title'], $_POST['body']))
            {
                $aData = array('post_id' => $this->_iId, 'title' => $_POST['title'], 'body' => $_POST['body']);

                if ($this->oModel->update($aData))
                    $this->oUtil->sSuccMsg = 'Article mis à jour.';
                else
                    $this->oUtil->sErrMsg = 'Veuillez reessayer';
            }
            else
            {
                $this->oUtil->sErrMsg = 'Tous les champs sont requis.';
            }
        }

        /* Retourne les données de l'article*/
        $this->oUtil->oPost = $this->oModel->getById($this->_iId);

        $this->oUtil->getView('edit_post');
    }
 /*** Suppression ***/
    public function delete()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId))
            header('Location: ' . ROOT_URL);
        else
            exit('article ne peut pas être supprimé.');
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
