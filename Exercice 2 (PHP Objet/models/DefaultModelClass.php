<?php

/**
 * Class DefaultModelClass
 *
 * Modèle générique
 */
class DefaultModelClass
{
    /**
     * @var array Liste des champs de la table
     */
    protected $fields = [];

    /**
     * @var string Nom de la table
     */
    protected $tableName = '';

    /**
     * @var mysqli Connection SQL
     */
    protected $connexion = null;

    /**
     * DefaultModelClass constructor.
     *
     * @param string $name Nom de la table
     * @param array $fields Liste des champs
     */
    public function __construct()
    {
        $this->connexion = DBClass::$connection;
    }

    /**
     * Récupère tous les enregistrements d'une table
     *
     * @return mysqli_result
     */
    public function findAll()
    {
        // Requête SQL
        $query = 'SELECT * FROM ' . $this->tableName;
        // Execution
        $results = mysqli_query($this->connexion, $query);

        if (!$results) {
            die('Erreur SQL :<pre>' . mysqli_error() . '</pre>');
        }

        // Renvoi des resultats
        return $results;
    }
}










//