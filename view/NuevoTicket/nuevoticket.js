function init(){
    $("#ticket_form").on("submit", function(e){
        guardaryeditar(e);
    });
}

$(document).ready(function() {
    $('#tick_descrip').summernote({
        height:150,
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
    
    /* TODO:Mostramos el listado de categorias */
    $.post("../../controller/categoria.php?op=combo", function(data, status){
        $('#cat_id').html(data);
    })



     $("#cat_id").change(function(){ /* capturar cat_id segun funcion cambio */
        cat_id = $(this).val();
            
           /*  Mostrar registro de scat_id segun cat_id selecionado por cambio */
            $.post("../../controller/subcategoria.php?op=combo",{cat_id:cat_id}, function(data, status){
                $('#scat_id').html(data);
            })
    
         
     })

      /* TODO:Mostramos el listado de prioridad */
     $.post("../../controller/prioridad.php?op=combo", function(data, status){
        $('#prio_id').html(data);
     })
});



function guardaryeditar(e){
    e.preventDefault();
    /* TODO: Array del form ticket */
    var formData = new FormData($("#ticket_form")[0]);
    /* TODO: validamos si los campos tienen informacion antes de guardar */

    if ($('#tick_descrip').summernote('isEmpty') || $('#tick_titulo').val()=='' || $('#scat_id').val()=='') {

        /* TODO: Alerta de Confirmación */
        swal.fire({
            icon: 'error',
            title: 'Campos Vacios',
            text: 'verificar',
            showConfirmButton: false,
            timer: 1500
        }); 
        
    }else{

        var totalfiles = $('#fileElem').val().length;
        for (var i = 0; i < totalfiles; i++) {
            formData.append("files[]", $('#fileElem')[0].files[i]);
        }
           

          /* TODO: Guardar Ticket */
        $.ajax({
            url: "../../controller/ticket.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
             
                data = JSON.parse(data);
                console.log(data);
               


                /* TODO: Envio de alerta Email de ticket Abierto */
                 $.post("../../controller/email.php?op=ticket_abierto", {tick_id : data[0].tick_id}, function (data) {

                });


                /* TODO: Limpiar campos */
               
                $('#tick_titulo').val('');
                $('#tick_descrip').summernote('reset');
                $('#fileElem').val('');


                /* TODO: Alerta de Confirmación */
                swal.fire({
                    icon: 'success',
                    title: 'Ticket Registrado',
                    text:'En el sistema',
                    showConfirmButton: false,
                    timer: 1500
                }); 
            }
        });


    }
    

      
       
    }


init();




