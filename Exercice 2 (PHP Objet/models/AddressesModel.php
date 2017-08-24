<?php

namespace modesl;

use models\DefaultModelClass as MonModele;
/**
 * Class AddressesModel
 *
 * Modèle pour la table "adresses"
 */
class AddressesModel extends MonModele
{
    /**
     * @var array Liste des champs
     */
    public $fields = ['id', 'nom', 'cp', 'ville'];
    /**
     * @var string Nom de la table dans la base
     */
    public $tableName = 'adresses';

    /**
     * @var string Entité liée
     */
    protected $entityName = 'AddressEntity';
}
