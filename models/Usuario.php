<?php
    class Usuario extends Conectar{
        
         /* TODO:Definimos funcion de conexion */
        public function login(){
          $conectar=parent::conexion();
          parent::set_names();
           if(isset($_POST["enviar"])){
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            $rol = $_POST["rol_id"];
             if(empty($correo) and empty($pass)){
                header("location:".conectar::ruta()."index.php?m=2");
                exit;

             }else{
                /*  TODO:Consulta SQL a tabla usuario para validar su existencia */
                $Sql="call SP_L_USER_EXIST (?,?,?)";
                $stmt=$conectar->prepare($Sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $pass);
                $stmt->bindValue(3, $rol);
                $stmt->execute();
                $resultado =$stmt->fetch();
                  /* TODO:Verificamos que el resultado de la consulta SQL sea un Array y su valor mayor a 0 */
                 if(is_array($resultado) and count($resultado)>0){

                  /* TODO:Asignamos valores a variables de session los valores recibidos con la consulta SQL */
                   $_SESSION["usu_id"]=$resultado["usu_id"];
                   $_SESSION["usu_nom"]=$resultado["usu_nom"];
                   $_SESSION["usu_apep"]=$resultado["usu_apep"];
                   $_SESSION["rol_id"]=$resultado["rol_id"];
                   $_SESSION["usu_correo"]=$resultado["usu_correo"];
                   $_SESSION["est"]=$resultado["est"];
                   header("location:".Conectar::ruta()."view/Home/");
                   exit();
                      
                   /* TODO:Si no existe el usuario enviar por url m=1 */
                 }else{
                   header("location:".Conectar::ruta()."index.php?m=1");
                   exit();
                 }
             }
           }
        }

         /* TODO:Modelo para Insertar Usuario en DB */
        public function insert_usuario($usu_nom, $usu_apep, $usu_correo, $rol_id, $usu_pass){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="call SP_I_NEW_USER (?,?,?,?,?)";
                $Sql=$conectar->prepare($Sql);
                $Sql->bindValue(1, $usu_nom);
                $Sql->bindValue(2, $usu_apep);
                $Sql->bindValue(3, $usu_correo);
                $Sql->bindValue(4, $rol_id);
                $Sql->bindValue(5, $usu_pass);
                $Sql->execute();
              return $resultado=$Sql->fetchAll();

        }

         /* TODO:Modelo para Actualizar Usuario en DB */
        public function update_usuario($usu_id, $usu_nom, $usu_apep, $usu_correo, $rol_id, $usu_pass){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="call SP_U_USER_01 (?,?,?,?,?,?)";
                $Sql=$conectar->prepare($Sql);
                
                $Sql->bindValue(1, $usu_id);
                $Sql->bindValue(2, $usu_nom);
                $Sql->bindValue(3, $usu_apep);
                $Sql->bindValue(4, $usu_correo);
                $Sql->bindValue(5, $rol_id);
                $Sql->bindValue(6, $usu_pass);
                $Sql->execute();
              return $resultado=$Sql->fetchAll();
          
        }

         /* TODO:Modelo para Eliminar del listado a Usuario camniando de est a 0 */
        public function delete_usuario($usu_id){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="call SP_U_USER (?)";
          $Sql=$conectar->prepare($Sql);
          $Sql->bindValue(1, $usu_id);
          $Sql->execute();
          return $resultado=$Sql->fetchAll();
          
        }

         /* TODO:Modelo para listar todos los registros al Recibir Array de tabla usuario de DB */
        public function get_usuario(){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="call SP_L_USERS";
          $Sql=$conectar->prepare($Sql);
          $Sql->execute();
          return $resultado=$Sql->fetchAll();
          
        }


         /* TODO:Modelo para listar todos los registros al Recibir Array de tabla usuario por Rol */
        public function get_usuario_x_rol(){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="call SP_L_USERS_X_ROL";
          $Sql=$conectar->prepare($Sql);
          $Sql->execute();
          return $resultado=$Sql->fetchAll();
          
        }

         /* TODO:Modelo para Listar Usuario por ID de Usuario en DB */
        public function get_usuario_x_id($usu_id){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="call SP_L_USER_X_ID (?)";
          $Sql=$conectar->prepare($Sql);
          $Sql->bindValue(1, $usu_id);
          $Sql->execute();
          return $resultado=$Sql->fetchAll();
          
        }

         /* TODO:CONSULTA DE TOTAL TICKETS, TOTAL ABIERTOS Y TOTAL CERRADO */


          /* TODO:Modelo para Listar Numero de Ticket por Usuario en DB */
          public function get_totalticket_x_id($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $Sql="call SP_L_TOTAL_TICK_X_USU_ID(?)";
            $Sql=$conectar->prepare($Sql);
            $Sql->bindValue(1, $usu_id);
            $Sql->execute();
            return $resultado=$Sql->fetchAll();
            
          }

           /* TODO:Modelo para Listar Numero de Ticket Abiertos por Usuario en DB */
           public function get_totalticket_abierto_x_id($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $Sql="call SP_L_NUM_TICK_OPEN_USU_ID(?)";
            $Sql=$conectar->prepare($Sql);
            $Sql->bindValue(1, $usu_id);
            $Sql->execute();
            return $resultado=$Sql->fetchAll();
            
          }

           /* TODO:Modelo para Listar Numero de Ticket Cerrados por Usuario en DB */
           public function get_totalticket_cerrado_x_id($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $Sql="call SP_L_NUM_TICK_CLOSE_USU_ID(?)";
            $Sql=$conectar->prepare($Sql);
            $Sql->bindValue(1, $usu_id);
            $Sql->execute();
            return $resultado=$Sql->fetchAll();
            
          }


          /* TODO:Consulta para graficos estadisticos Cant de ticket x Categoria */
          public function get_usuario_grafico($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $Sql="call SP_L_CANT_TICK_USUARIO(?)";
            $Sql=$conectar->prepare($Sql);
            $Sql->bindValue(1, $usu_id);
            $Sql->execute();
            return $resultado=$Sql->fetchAll();
            
          }

        /* TODO:Modelo para actualizar pass por ID de Usuario en DB */
        public function update_pass_user($usu_id, $usu_pass){
          $conectar=parent::conexion();
          parent::set_names();
          
          $Sql="UPDATE tm_usuario SET usu_pass = MD5(?)
          WHERE usu_id = ?";
         /*  El Orden de los campos en el bindValue debe estar en el mismo orden como se diseña ña consulta SQL */
          $Sql=$conectar->prepare($Sql);
          $Sql->bindValue(1, $usu_pass);
          $Sql->bindValue(2, $usu_id);
          $Sql->execute();
          return $resultado=$Sql->fetchAll();
          
        }
        
    }
