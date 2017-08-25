<?php

namespace Studio321\Model;

use Studio321\Classes\DBClass;

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
     * @var array Liste des entités
     */
    protected $data = [];

    /**
     * @var string Nom de la table
     */
    protected $tableName = '';

    /**
     * @var string Entité liée
     */
    protected $entityName = '';

    /**
     * @var PDOStatement Connection SQL
     */
    protected $connection = null;

    /**
     * DefaultModelClass constructor.
     *
     * @param string $name Nom de la table
     * @param array $fields Liste des champs
     */
    public function __construct()
    {
        $this->connection = DBClass::$connection;
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
        $results = $this->connection->query($query);

        // Création des entités
        foreach ($results as $line) {
            $entityClass = 'Studio321\\Entity\\'.$this->entityName;
            $this->data[] = new $entityClass($line);
        }

        // Renvoi des resultats
        return $this->data;
    }

    /**
     * Sauvegarde du contenu de $_POST dans la bse
     *
     * @param $data Données à sauvegarder
     *
     * @return bool True en cas de succes.
     */
    public function save($data)
    {
        // Nettoyage des données:
        $data = $this->verifyInputs($data);

        // Préparation des champs
        $fields = join(',', array_keys($data));

        // Préparation des clés
        $keys = join(', ', array_map(function ($a) {
            return ":$a";
        }, array_keys($data)));

        // Construction de la requête
        $query = "INSERT INTO "
            . $this->tableName . " ( $fields ) "
            . "VALUES ( $keys )";

        // Préparation de la requête avec PDO
        $request = $this->connection->prepare($query);

        // On attache les paramètres
        foreach (array_keys($data) as $field) {
            $request->bindParam(":$field", $data[$field]);
        }

        // Execution de la requête
        if ($request->execute()) {
            return true;
        } else {
            echo 'Une erreur est survenue lors de '
                . 'l\'éxecution de la requete';
            echo $request->errorInfo();
            die;
        }
    }

    /**
     * Vérifie des données avant de les enregistrer dans la base.
     *
     * @param array $data Données
     * @return array Données à enregistrer
     */
    protected function verifyInputs(array $data)
    {
        foreach ($data as $k => $v) {
            if (!in_array($k, $this->fields)) {
                unset($data[$k]);
            }
        }
        return $data;
    }
}










//