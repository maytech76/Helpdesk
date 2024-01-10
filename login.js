function init(){
}

$(document).ready(function(){  
});



/* FUNCION QUE SE EJECUTA AL RECIBIR UN CLICK EL ID btnsoporte */
$(document).on("click", "#btnsoporte", function(){

    if ($('#rol_id').val()==1) {
        /* TODO:atributos html si el rol_id es == 1 */
        $('#lbltitulo').html("Modulo Soporte TI");
        $('#btnsoporte').html("Acceso Usuario");
        $('#rol_id').val(2);
        /* TODO:Atributo y Ruta de imagen si el rol_id == 1 (USUARIO)*/
        $("#imglogin").attr("src", "public/img/2.jpg");
        
    }else{
         /* TODO:atributos html si el rol_id es == 2 */
        $('#lbltitulo').html("Modulo de Usuarios");
        $('#btnsoporte').html("Acceso Soporte TI");
        $('#rol_id').val(1);
         /* TODO:Atributo y Ruta de imagen si el rol_id == 2 (SOPORTE) */
         $("#imglogin").attr("src", "public/img/1.jpg");
        
    }

  
})


init();