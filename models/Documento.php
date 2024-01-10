<?php
    class Documento extends Conectar{

        /* Insertamos datos en td_documento */
        public function insert_documento($tick_id,$doc_nom){
            $conectar= parent::conexion();
            $sql="call SP_I_NEW_DOC(?,?)";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1,$tick_id);
            $sql->bindParam(2,$doc_nom);
            $sql->execute();
        }

        
        
        
        /* Selecionamos y mostramos documento segun tick_id */
        public function get_documento_x_ticket($tick_id){
            $conectar= parent::conexion();
            $sql="SP_L_DOC_X_TICK_ID(?)";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1,$tick_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(pdo::FETCH_ASSOC);// mostramos el resultado
        }
    }
?>