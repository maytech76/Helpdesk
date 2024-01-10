<?php

class Prioridad extends Conectar{
  
        public function listar (){

            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT *FROM prioridad
            WHERE est= 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();

        }


}

?>