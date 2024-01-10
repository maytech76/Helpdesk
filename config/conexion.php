<?php

/* ---Iniciamos la sesion de usuario-- */
session_start();

/* iniciamos la Calse Conectar */
class Conectar{

     protected $dbh;

     protected function conexion(){
        try {
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=helpdesk", "root", "");
            return $conectar;
        } catch (Exception $e) {
            print "Error" . $e->getMessage() . "<br>";
            die();
        }
     }

        public function set_names(){
            return $this->conexion()->query("SET NAMES 'utf8'");
        }

        /* Ruta principal del proyecto */
        public static function ruta(){
            return "http://localhost/helpdesk/";
        }


    }


?>