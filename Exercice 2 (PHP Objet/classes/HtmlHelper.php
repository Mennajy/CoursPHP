<?php

class HtmlHelper
{
    /**
     * Créée un lien adapté au "framework"
     *
     * @param $controller Nom du controlleur
     * @param $action Action a executer
     * @param $title Titre du lien
     * @param array $options Liste d'options pour le lien
     * @return string
     */
    public static function link($controller, $action, $title, $options = [])
    {
        return '<a href="index.php?c=' . $controller . '&amp;a=' . $action . '">' . $title . '</a>';
    }

    public static function table($fieldNames,$lines,$controllerName=null){

      // Création du tableau
      $table =  '<table class="table">';
      // Création du header
      $table .='  <thead>';
      $table .=  '<tr>';
      // Lignes du header
      $table .=  '<tr>';
      if($controllerName !== null){
      $table .=  '<th>Actions</th>';
      }
      foreach ($fieldNames as $field) {
        $table.=  '<th>' . $field . '</th>';
      }
      $table .=  '</tr>';
      $table .=  '</thead>';
      $table .=  '<tbody>';
      while (($line=mysqli_fetch_assoc($lines))) {
        $table .=  '<tr>';
        if ($controllerName!==null) {


        $table .=  '<td>';
        $table .= self::link($controllerName,'delete','<span class="glyphicon glyphicon-trash">&nbspSupprimer &nbsp</span>');
        $table .= self::link($controllerName,'edit','<span class="glyphicon glyphicon-pencil">&nbspEditer &nbsp</span>');
        $table .= '</td>';
        }
        foreach ($fieldNames as $field) {
          $table.= '<td>' .$line[$field] . '</td>';
      }
      $table .=  '<tr>';
      }
      $table .=  '</tbody>';
      $table .=  '</table>';
      return $table;
    }
}
