<?php

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

    /**
     * DefaultControllerClass constructor.
     */
    public function __construct()
    {

    }

    /**
     * Index : liste des enregistrements
     */
    public function index()
    {
        if ($this->modelName !== null) {
            $model = $this->loadModel($this->modelName);

            return $model->findAll();
        } else {
            die('Ce controleur n\'est pas associé à une table');
        }
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
        if ($this->modelName !== null) {
            $model = $this->loadModel($this->modelName);

            if (count($_POST) > 0) {
                if($model->save($_POST)){
                    return ['ok' => true];
                }
            }
        } else {
            die('Ce controleur n\'est pas associé à une table');
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

    /**
     * Permet de charger un modèle.
     *
     * @param string $model
     *
     * @return DefaultModelClass
     */
    protected function loadModel($model)
    {
        // On prépare les différents noms à tester:
        //   - nom du modèle (classe)
        //   - nom du fichier
        $modelName = ucfirst($model) . 'Model';
        $fileName = 'models/' . $modelName . '.php';

        // On vérifie que le fichier de modèle existe
        if (file_exists($fileName)) {
            // Chargement du modèle
            require_once $fileName;
            // Création d'une instance
            return new $modelName;
        } else {
            die('Modèle introuvable (' . $fileName . ' - Classe :' . $modelName . ')');
        }
    }
}
