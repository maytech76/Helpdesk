<?php
  class Categoria extends Conectar{

     public function get_categoria(){
        $conectar =parent::conexion();
        parent::set_names();
        $Sql="SELECT *FROM tm_categoria WHERE est=1;";
        $Sql=$conectar->prepare($Sql);
        $Sql->execute();
        return $resultado=$Sql->fetchAll();
     }
  }
?>