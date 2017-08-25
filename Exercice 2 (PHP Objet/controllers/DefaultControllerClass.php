<?php

namespace Studio321\Controller;

/**
 * Class DefaultControllerClass
 *
 * Classe de controlleur générique
 */
class DefaultControllerClass
{
    /**
     * @var array Liste des actions interdites
     */
    public $actionsBlacklist = [];

    /**
     * @var string|null Nom du modèle associé à ce controleur
     */
    public $modelName = null;

    public $model = null;

    /**
     * DefaultControllerClass constructor.
     */
    public function __construct()
    {
        if ($this->modelName !== null) {
            $modelName = 'Studio321\\Model\\'
                . ucfirst($this->modelName) . 'Model';
            $this->model = new $modelName();
        }
    }

    /**
     * Index : liste des enregistrements
     */
    public function index()
    {
        return $this->model->findAll();
    }

    /**
     * Affichage d'un élément unique
     *
     * @param int $id Id de l'élément à afficher
     */
    public function view()
    {

    }

    /**
     * Ajout d'un élément
     */
    public function add()
    {
        if (count($_POST) > 0) {
            if ($this->model->save($_POST)) {
                return ['ok' => true];
            }
        }
    }

    /**
     * Edition d'un élément
     *
     * @param int $id Id de l'élément à modifier
     */
    public function edit()
    {

    }

    /**
     * Suppression d'un élément
     *
     * @param int $id Id de l'élément à supprimer
     */
    public function delete()
    {

    }

}
