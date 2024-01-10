<?php

  class Subcategoria extends Conectar{

    /*  TODO:muestra listado de subcategorias */
     public function get_subcategoria($cat_id){
        $conectar =parent::conexion();
        parent::set_names();
        $Sql="call SP_L_SUBCAT_X_CAT_ID(?)";
        $Sql=$conectar->prepare($Sql);
        $Sql->bindValue(1, $cat_id);
        $Sql->execute();
        return $resultado=$Sql->fetchAll();
     }
  }


?>