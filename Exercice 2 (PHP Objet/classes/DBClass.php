<?php

namespace Studio321\Classes;

use PDO;

/**
 * Class DBClass
 *
 * Classe permettant de se connecter à la BDD et de gérer la
 * connexion
 */
class DBClass
{
    /**
     * @var mysqli Objet représentant la connexion
     */
    public static $connection = null;

    /**
     * Connexion à la base de données
     */
    public static function connect()
    {
        // Configuration
        $server = '127.0.0.1';
        $username = 'root';
        $password = '';
        $db = 'vagrant';

        // Essai de connexion
        try {
            // Création de la connexion
            self::$connection = new PDO(
                'mysql:host=' . $server . ';dbname=' . $db,
                $username,
                $password
            );
            // Changement des paramètres de PDO:
            //  - gestion des erreurs
            self::$connection->setAttribute(
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            );
            //  - Mode de retrait
            self::$connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ
            );
        } catch (PDOException $error) {
            die('Erreur : impossible de se connecter à'
                . ' la base de données.<pre>'
                . $error->getMessage()
                . '</pre>');
        }

    }

    /**
     * Déconnexion de la base
     */
    public static function disconnect()
    {

    }
}
