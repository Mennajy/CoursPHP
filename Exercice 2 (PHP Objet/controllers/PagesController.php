<?php

require_once 'DefaultControllerClass.php';

class PagesController extends DefaultControllerClass
{
  public $actionsBlacklist=[
    'index',
    'view',
    'delete',
    'edit',
    'add',
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
    public function about(){

    }

}
