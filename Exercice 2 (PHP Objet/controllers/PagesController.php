<?php

require_once 'DefaultControllerClass.php';

/**
 * Class PagesController
 *
 * Pages "statiques"
 */
class PagesController extends DefaultControllerClass
{
    /**
     * @var array Liste des actions interdites
     */
    public $actionsBlacklist = [
        'index',
        'view',
        'delete',
        'edit',
        'add'
    ];

    /**
     * Affichage page d'accueil
     */
    public function home()
    {

    }

    /**
     * Page "A propos"
     */
    public function about()
    {

    }

}