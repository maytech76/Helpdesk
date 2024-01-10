function init(){

}


$(document).ready(function(){
    var tick_id = getUrlParameter('ID');

    listardetalle(tick_id);

    $('#tick_descrip').summernote({
        height:250,
        lang: "es-ES",
        callbacks:{
            OnImageUpload: function(imagen){
                console.log("Imagen detec..");
                myimagetreat(image[0]);
            },
            onPaste: function(e){
                console.log("Text detect..");
            }
        },
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

    /* TODO:Summernote para el detalle del ticket inicial */
    $('#tick_descripusu').summernote({
        height:250,
        lang: "es-ES",

        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
        
    });

    /* TODO:Linea de comando para Hinabilitar la edicion del texarea del summernote */
    $('#tick_descripusu').summernote('disable');

 
});

    var getUrlParameter = function getUrlParameter(sParam){
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

        for(i = 0; i < sURLVariables.length; i++){
            sParameterName = sURLVariables[i].split('=');

            if(sParameterName[0] === sParam){
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

    /* TODO: Metodos para botones agregar y cerrar al recibir un click FORMULARIO DETALLE TICKET  */
    
    /* BOTON AGREGAR MENSAJE */
    $(document).on("click", "#btnagregar", function(){
        /* TODO:capturamos en variables datos que pasaremos al controlador como parametros */
        var tick_id = getUrlParameter('ID'); /* parametro que recibe el js por medio de la Url */
        var usu_id = $('#user_idx').val(); /* capturamos el valor de un imput que se declaro en header */
        var tickd_descrip = $('#tick_descrip').val(); /* Capturamos el valor del textarea del summernote */

        /* TODO:Validamos que no recibamos vacio el campo textarea o summernote */
        if($('#tick_descrip').summernote('isEmpty')){

                swal.fire({
                    icon: 'warning',
                    title: 'Mensaje Vacio',
                    text:'Debe Ingresar Detalles',
                    showConfirmButton: false,
                    timer: 1500
                });
            
        }else{
                $.post("../../controller/ticket.php?op=insertdetalle", {tick_id:tick_id, usu_id:usu_id, tickd_descrip:tickd_descrip}, function(data){
            
                    $('#tick_descrip').summernote('reset');

                    swal.fire({
                        icon: 'success',
                        title: 'Mensaje Agregado',
                        text:'En el sistema',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    /* Una vez registrado el mensaje actualizar listado de detalles */

                    listardetalle(tick_id);
                    
                })

        }

    });

    

    /* BOTON CERRAR TICKET */
    $(document).on("click", "#btncerrar", function(){

        Swal.fire({
            title: 'Seguro de Cerrar el Ticket',
            text: "Cerrando Soporte a Ticket Selecionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#F39925',
            cancelButtonColor: '#D30D0D',
            confirmButtonText: 'SI'
          }).then((result) => {
            if (result.isConfirmed) {

                var tick_id = getUrlParameter('ID'); 
                var usu_id = $('#user_idx').val();
                $.post("../../controller/ticket.php?op=update", {tick_id:tick_id, usu_id:usu_id}, function(data){

                });

                /* TODO: Envio de alerta Email de ticket Cerrado */
                $.post("../../controller/email.php?op=ticket_cerrado", {tick_id:tick_id}, function (data) {

                });

                listardetalle(tick_id);


                Swal.fire({
                    icon: 'success',
                    title: 'Ticket Cerrado',
                    text:'Finalizo Soporte',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
          })
    });


    /* funcion para recargar nuestra pagina detalles tickets */

    function listardetalle(tick_id){

        $.post("../../controller/ticket.php?op=listardetalle", {tick_id: tick_id}, function(data) {
            $('#lbldetalle').html(data);
          });



           /* TODO:Capturamos desde el controler ticket.php los datos necesarios y pasar por JSON a la vista */
          $.post("../../controller/ticket.php?op=mostrar", {tick_id:tick_id}, function(data){
            data = JSON.parse(data);
        
            /* TODO:insertamos valores recibidos del controlador enviados por la consulta SQL del modelo */
            $('#lblestado').html(data.tick_estado);
            $('#lblnomusuario').html(data.usu_nom);
            $('#lblfechcrea').html(data.fech_crea);
            $('#numeroticket').html(data.tick_id);
    
         
           /* Para los campos que seran visibles en un imput usaremos la funcion .val() */
           $('#cat_nom').val(data.cat_nom);
           $('#scat_nom').val(data.scat_nom);
           $('#tick_titulo').val(data.tick_titulo);
    
    
           /* TODO: Capturamos datos para mostrar el detalle del ticket en el summernote */
           $('#tick_descripusu').summernote('code', data.tick_descrip);
    
           /* TODO:Ocultamos panel de mensajes si esta Cerrado el Ticket */
           console.log(data.tick_estado_texto);
           if (data.tick_estado_texto === "Cerrado"){
           
             $('#panelmsj').hide();
           }
           
        })

    }

init();



