<?php
require_once("../config/conexion.php");
require_once("../models/Ticket.php");
$ticket = new Ticket();

require_once("../models/Usuario.php");
$usuario = new Usuario();


require_once("../models/Documento.php");
$documento = new Documento();




switch ($_GET["op"]) {

    case "insert":

        $datos = $ticket->insert_ticket(
            $_POST["usu_id"],
            $_POST["cat_id"],
            $_POST["scat_id"],
            $_POST["tick_titulo"],
            $_POST["tick_descrip"],
            $_POST["prio_id"]
        );

         if (is_array($datos)==true and count($datos)>0){
            foreach ($datos as $row){
                $output["tick_id"] = $row["tick_id"];

                //Aqui gestionamos la captura e insercion de los archivos adicionales

                if ($_FILES['files']['name']==0){

                }else{
                    $countfiles = count($_FILES['files']['name']);
                    $ruta = "../public/documento/".$output["tick_id"]."/"; //Ruta donde se almacenaran los archivos
                    $files_arr = array();

                    if (!file_exists($ruta)) { //si no esxite la ruta creala con los permisos
                        mkdir($ruta, 0777, true);
                    }

                    for ($index = 0; $index < $countfiles; $index++) {
                        $doc1 = $_FILES['files']['tmp_name'][$index];
                        $destino = $ruta.$_FILES['files']['name'][$index];
                        
                        //Ejecutamos el metodo insert_documento del Models Docuemnto e insertamos registro
                        $documento->insert_documento( $output["tick_id"],$_FILES['files']['name'][$index]);

                        move_uploaded_file($doc1,$destino);
                    }
                }
            }
        } 

            echo json_encode($datos);
        
    break;



    case "update": /* TODO:Enviamos a modelo Ticket y a su metodo update_ticket el campo tick_id usando POST */

         $ticket->update_ticket($_POST["tick_id"]);
         $ticket->insert_ticketdetalle_cerrado($_POST["tick_id"], $_POST["usu_id"]); 
        
    break;


    case "re_abrirtk": /* TODO:Enviamos a modelo Ticket y a su funcion update_reabrir_ticket el campo tick_id usando POST */

        $ticket->update_reabrir_ticket($_POST["tick_id"]);
        $ticket->insert_ticketdetalle_reabrir($_POST["tick_id"], $_POST["usu_id"]);
       
    break;

   

    case "asignar": /* TODO:Enviamos a modelo Ticket y a su metodo update_ticket_asignado el campo tick_id, usu_asig usando POST */

        $ticket->update_ticket_asignado($_POST["tick_id"], $_POST["usu_asig"]);
       
       
    break;


      /* Mostrar Ticke por usu_id */
    case "listar_x_usu":
        $datos=$ticket->listar_ticket_x_usu($_POST["usu_id"]);
        $data= Array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["tick_id"];
            $sub_array[] = $row["cat_nom"];
            $sub_array[] = $row["tick_titulo"];

            if ($row["tick_estado"]==='Abierto') {
                $sub_array[]= '<span class="label label-pill label-success">Abierto</span>';
            } else {
                $sub_array[]= '<a onClick="ReAbrir('.$row["tick_id"].')"><span class="label label-pill label-danger">Cerrado</span></a>';
            }

            $sub_array[] = date("d/m/Y  H:i", strtotime($row["fech_crea"]));


             /* Fehca de Asignacion a Soporte */
            if($row["fech_asig"] == null){
                $sub_array[] = '<span class="label label-pill label-default">Sin Fecha</span>';
              }else {
                $sub_array[] = date("d/m/Y", strtotime($row["fech_asig"]));
             }



             /* Usuario Asignado al Ticket */
              if($row["usu_asig"]==null){
                $sub_array[] = '<span class="label label-pill label-warning">Sin Soporte TI</span>';
              }else {
                $datos1 = $usuario->get_usuario_x_id($row["usu_asig"]);
                foreach($datos1 as $row1){
                    $sub_array[]= '<span class="label label-pill label-success">'.$row["usu_nom"].'</span>';
                }  
             } 

            $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
            $data[] = $sub_array;
          }
          
          $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
             echo json_encode($results);

    break;

    

    case "listar":
            $datos=$ticket->listar_ticket();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tick_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["tick_titulo"];

                    if ($row["tick_estado"]==='Abierto') {
                        $sub_array[]= '<span class="label label-pill label-success">Abierto</span>';
                    } else {
                        $sub_array[]= '<a onClick="ReAbrir('.$row["tick_id"].')"><span class="label label-pill label-danger">Cerrado</span></a>';
                    }


                    $sub_array[] = date("d/m/Y  H:i", strtotime($row["fech_crea"]));

                    /* Fecha de Asignacion */
                    if($row["fech_asig"]==null){
                        $sub_array[] = '<span class="label label-pill label-default">Sin Fecha</span>';
                    }else {
                        $sub_array[] = date("d/m/Y", strtotime($row["fech_asig"]));
                    }


                    /* Usuario Asignado al Ticket */
                     if($row["usu_asig"]==null){
                        $sub_array[] = '<a onClick="asignar('.$row["tick_id"].');"><span class="label label-pill label-warning">No Asignado</span></a>';
                    }else {
                        $datos1 = $usuario->get_usuario_x_id($row["usu_asig"]);
                        foreach($datos1 as $row1){
                            $sub_array[]= '<span class="label label-pill label-success">'.$row1["usu_nom"].'</span>';
                        }  
                    } 

                 


                $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
              }
              
              $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                 echo json_encode($results);
    
    break;


    case "listardetalle":

        $datos=$ticket->listar_ticketdetalles_x_ticket($_POST["tick_id"]);
          ?>
            <?php
               foreach($datos as $row){
                ?>

        <article class="activity-line-item box-typical">
					<div class="activity-line-date">
						<?php echo date("d/m/Y", strtotime($row["fech_crea"]));?>
					</div>
					<header class="activity-line-item-header">
						<div class="activity-line-item-user">
							<div class="activity-line-item-user-photo">
								<a href="#">
									<img src="../../public/img/<?php echo $row ["rol_id"] ;?>.jpg">
								</a>
							</div>
							<div class="activity-line-item-user-name"><?php echo $row['usu_nom'].' '.$row['usu_apep'];?></div>
                            <?php 
                            if ($row ['rol_nom'] === 'Usuario' ){

                            ?>
                                  <div class="activity-line-item-user-status text-primary"><?php echo $row ["rol_nom"] ;?></div>
                             <?php
                            } else{
                            ?>
                                  <div class="activity-line-item-user-status text-danger"><?php echo $row ["rol_nom"] ;?></div>
                            
                            <?php
							  }
                              ?>
						</div>
					</header>
					<div class="activity-line-action-list">

						<section class="activity-line-action">
							<div class="time" style="font-weight: bold;"><?php echo date("H:i:s", strtotime($row["fech_crea"]));?></div>
							<div class="cont">
								<div class="cont-in">
									<p><?php echo $row ["tickd_descrip"] ;?></p>
								</div>
							</div>
						</section><!--.activity-line-action-->
					</div><!--.activity-line-action-list-->
		</article><!--.activity-line-item-->
					
               
               <?php
               }
            ?>
         <?php
    break;



    case "mostrar";
            $datos=$ticket->listar_ticket_x_id($_POST["tick_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["tick_id"] = $row["tick_id"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["cat_id"] = $row["cat_id"];

                    $output["tick_titulo"] = $row["tick_titulo"];
                    $output["tick_descrip"] = $row["tick_descrip"];

                    if ($row["tick_estado"] =="Abierto"){
                        $output["tick_estado"] = '<span class="label label-pill label-success">Abierto</span>';
                    }else{
                        $output["tick_estado"] = '<span class="label label-pill label-danger">Cerrado</span>';
                    }

                     $output["tick_estado_texto"] = $row["tick_estado"]; 

                    $output["fech_crea"] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                   /*  $output["fech_cierre"] = date("d/m/Y H:i:s", strtotime($row["fech_cierre"])); */
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_ape"] = $row["usu_apep"];
                    $output["cat_nom"] = $row["cat_nom"];
                    $output["scat_nom"] = $row["scat_nom"]; 
                    $output["estrella"] = $row["estrella"]; 
                    $output["tick_coment"] = $row["tick_coment"];
                    /* $output["prio_nom"] = $row["prio_nom"]; */
                }
                echo json_encode($output);
            }
    break;

      /*  Generamos una funcion insertdetalle que utilizara los datos recibido desde el modelo "insert_ticketdetalle"  */
   
    case "insertdetalle":
        /* recibimos desde la funcion javascrip los datos necesarios */
        $ticket->insert_ticketdetalle($_POST["tick_id"],$_POST["usu_id"],$_POST["tickd_descrip"]);
        /* Enviamos por medio de POST los datos necesarios para el registro en la tabla td_ticketdetalle */
    break;



    /* TODO:METODOS Y SERVICIOS PARA CONTAR TOTAS DE TICKETS, ABIERTOS Y CERRADOS */

     /* TODO:Metodo mostar total tickets del Controlador tickets*/
    case"total":
        $datos=$ticket->get_totalticket();
        if(is_array($datos)==true and count($datos)>0){  
          foreach($datos as $row)
         {
             $output["total"] = $row["total"];
         }
          
         echo json_encode($output);
        }   
    break;


     /* TODO:Metodo mostar el total tickets Abiertos del Controlador tickets*/
    case"totalabierto":
         $datos=$ticket->get_totalticket_abiertos();
         if(is_array($datos)==true and count($datos)>0){  
           foreach($datos as $row)
          {
              $output["total"] = $row["total"];
          }
           
          echo json_encode($output);
         }   
    break;
    

      /* TODO:Metodo mostar el total tickets Cerrados del Controlador tickets*/
    case"totalcerrado":
         $datos=$ticket->get_totalticket_cerrados();
         if(is_array($datos)==true and count($datos)>0){  
           foreach($datos as $row)
          {
              $output["total"] = $row["total"];
          }
           
          echo json_encode($output);
         }   
    break;


    /* TODO:Metodo Mostrar Datos estadisticos Cantidad de tickets x Categorias */
    case 'grafico':
        
       $datos=$ticket->get_ticket_grafico();

       echo json_encode($datos);

    break;


    case "encuesta": /* TODO:Enviamos a modelo Ticket y a su metodo update_ticket el campo tick_id usando POST */
        $ticket->insert_encuesta($_POST["tick_id"], $_POST["estrella"], $_POST["tick_coment"]);    
    break;



  }
    ?>