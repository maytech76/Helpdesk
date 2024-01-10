$(document).on("click", "#updatepass", function(){

   /*  Variables donde Almacenamos los valores de los imputs */
    var pass = $("#txtpass").val();
    var newpass = $("#txtpassnew").val();

    /* Aplicamos unas condiciones */

    if (pass.length == 0 || newpass.length == 0){
        swal.fire({
            icon: 'error',
            title: 'Existen Campos Vacios',
            text:'Verificar',
            showConfirmButton: false,
            timer: 1500
        });
    }else{
        if (pass==newpass) {

          var usu_id = $('#user_idx').val();

          console.log(usu_id);

          $.post("../../controller/usuario.php?op=password", {usu_id:usu_id, usu_pass:newpass}, function(data){

                swal.fire({
                    icon: 'success',
                    title: 'Cambio de Contraseña',
                    text:'Efectuada con Exito..!',
                    showConfirmButton: false,
                    timer: 1500

                });

          });

        
            
        } else {

            swal.fire({
                icon: 'warning',
                title: 'Contraseñas no Coinciden',
                text:'Verificar',
                showConfirmButton: false,
                timer: 1800
            });
            
        }
    }

});