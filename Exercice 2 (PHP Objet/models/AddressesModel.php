<?php

namespace Studio321\Model;

use Studio321\Model\DefaultModelClass;

/**
 * Class AddressesModel
 *
 * Modèle pour la table "adresses"
 */
class AddressesModel extends DefaultModelClass
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
    
    public function update($id, $values){
      $query="UPDATE "$this->tableName
          ." SET nom=:nom, cp=:cp, ville=:ville"
          ." WHERE id=:id";

      $request=$this->connection->prepare($query);
      $request->bindParam(':nom', $values['nom']);
      $request->bindParam(':cp', $values['cp']);
      $request->bindParam(':ville', $values['ville']);
      $request->bindParam(':nom', $values['id']);

      if ($request->execute()) {
        returns$values;
      }else {
        echo "Une erreur est survenue lors de la mise à jour".$request->errorInfo();die;
      }
}
