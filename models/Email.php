<?php
/* librerias necesarias para que el proyecto pueda enviar emails */
require("class.phpmailer.php");
include("class.smtp.php");

/* llamada de las clases necesarias que se usaran en el envio del mail */
require_once("../config/conexion.php");
require_once("../Models/Ticket.php");

class Email extends PHPMailer{

    //variable que contiene el correo del destinatario
    protected $gcorreo="marketing@maytechsoluciones.com";//Correo Electronico 
    protected $gContrasena="Mk13212475**";//Contraseña del la cuenta de correo

   

    /* TODO:ENVIAR CORREO NOTIFICANDO APERTURA DE NUEVO TICKET */
    public function ticket_abierto($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }



        //---IGual---//
        $this->IsSMTP();
        $this->Host = 'smtp.titan.email';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gcorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gcorreo;
        $this->SMTPSecure = 'tls';
        
        $this->SMTPSecure = true;
        $this->FromName =  "Ticket Abierto ";
        $this->CharSet = 'UTF8';

        $this->addAddress($correo);
        $this->addAddress("staroffic@gmail.com");
        $this->WordWrap = 50;
        $this->IsHTML(true);//Permite html

        $this->Subject = "MAYTECH Ticket Abierto"; //Asunto
        //Igual//
        $cuerpo = file_get_contents('../public/nuevoticket.html'); /* Ruta del template en formato HTML */
        
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Abierto");
        return $this->Send(); //enviar email
    }





    public function ticket_cerrado($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }

        //IGual//
        $this->IsSMTP();
        $this->Host = 'smtp.titan.email';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gcorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gcorreo;
        $this->SMTPSecure = 'tls';
        
        $this->SMTPSecure = true;
        $this->FromName =  "Ticket Cerrado ";
        $this->CharSet = 'UTF8';

        $this->addAddress($correo);
        $this->addAddress("staroffic@gmail.com");
        $this->WordWrap = 50;
        $this->IsHTML(true);//Permite html

        $this->Subject = "MAYTECH Ticket Cerrado"; //Asunto
        //Igual//


        //Igual//
        $cuerpo = file_get_contents('../public/CerradoTicket.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Cerrado");
        return $this->Send();
    }





    public function ticket_asignado($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }

        //IGual//
        $this->IsSMTP();
        $this->Host = 'smtp.titan.email';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gcorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gcorreo;
        $this->SMTPSecure = 'tls';
        
        $this->SMTPSecure = true;
        $this->FromName =  "Ticket Asignado ";
        $this->CharSet = 'UTF8';

        $this->addAddress($correo);
        $this->addAddress("staroffic@gmail.com");
        $this->WordWrap = 50;
        $this->IsHTML(true);//Permite html

        $this->Subject = "MAYTECH Ticket signadoo"; //Asunto
        //Igual//
        //Igual//
        $cuerpo = file_get_contents('../public/AsignarTicket.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Asignado");
        return $this->Send();
    }

}

?>