<?php

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

        // Connexion
        self::$connection = mysqli_connect($server, $username, $password, $db);

        // Test de la connexion
        if (!self::$connection) {
            die('Erreur : impossible de se connecter à la base de données.<pre>' . mysqli_connect_error() . '</pre>');
        }

    }

    /**
     * Déconnexion de la base
     */
    public static function disconnect()
    {

    }
}
