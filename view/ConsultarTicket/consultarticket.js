var tabla;
var usu_id = $('#user_idx').val();
var rol_id = $('#rol_idx').val();

function init(){

    $("#ticket_form").on("submit", function(e){
        guardar(e);
       });

}

$(document).ready(function(){


    /* TODO:Mostramos el listado de categorias */
   $.post("../../controller/categoria.php?op=combo", function(data, status){
    $('#cat_id').html(data);
   })

    /* TODO:Mostramos el listado de prioridad */
    $.post("../../controller/prioridad.php?op=combo", function(data, status){
        $('#prio_id').html(data);
     })


    $.post("../../controller/usuario.php?op=combo", function(data){
        console.log(data);
        $('#usu_asig').html(data);
    });


    if (rol_id==1) {
        
        tabla=$('#ticket_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url: '../../controller/ticket.php?op=listar_filtro',
                type : "post",
                dataType : "json",
                data:{ tick_titulo:tick_titulo, cat_id:cat_id, prio_id:prio_id},
                error: function(e){
                     
                }
            },
            "ordering": false,
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 10,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }     
        }).DataTable(); 

    } else {
        
       
        tabla=$('#ticket_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url: '../../controller/ticket.php?op=listar',
                type : "post",
                dataType : "json",
                error: function(e){
                     
                }
            },
            "ordering": false,
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 10,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }     
        }).DataTable(); 
    }    

});




function ver(tick_id){

   window.open('http://localhost/helpdesk/view/Detalleticket/?ID='+tick_id+'');
}



/* Asignamos valor al input tick_id que se encuentra hidden en el Modal */
function asignar(tick_id){
        /* TODO:Capturamos desde el controler ticket.php los datos necesarios y pasar por JSON a la vista */
        $.post("../../controller/ticket.php?op=mostrar", {tick_id:tick_id}, function(data){
            data = JSON.parse(data);
            $('#tick_id').val(data.tick_id);
            

            /* Asignamos Titulo al Modal */
            $('#mdtitulo').html('Asignar Soporte');
            $("#modal").modal('show');/* Mostramos el modal */
        });
    
}


/* TODO:Creamos la funcion con doble proposito Guardar ó Editar si llega con usu_id */
function guardar(e){
    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);
    console.log(formData);
    $.ajax({
        url: "../../controller/ticket.php?op=asignar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);

            /* TODO: Envio de alerta Email de ticket Asignado */
            var tick_id = $('#tick_id').val();
            $.post("../../controller/email.php?op=ticket_asignado", {tick_id:tick_id}, function (data) {

            });
            $('#ticket_data').DataTable().ajax.reload(); 
               $('#modal').modal('hide');
            
                swal.fire({
                    icon: 'success',
                    title: 'Asignación Efectuada',
                    text:'Con Exito',
                    showConfirmButton: false,
                    timer: 1500
                });

             location.reload();  /* Recargar la pagina actual */

 
           
        }


    });
}

/* TODO:Creamos una funcion con el objetivo de recibir el tick_id de un ticket cerrado y cambiar su estado a Abierto */
function ReAbrir(tick_id){

    Swal.fire({
        title: 'Seguro de Re-Abrir el Ticket',
        text: "Cambiara a estado Abierto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#D30D0D',
        cancelButtonColor: '#F39925',
        confirmButtonText: 'SI'
      }).then((result) => {
        if (result.isConfirmed) {

            $.post("../../controller/ticket.php?op=re_abrirtk", {tick_id:tick_id, usu_id:usu_id}, function(data){

            }); 

            $('#ticket_data').DataTable().ajax.reload()


            Swal.fire({
                icon: 'success',
                title: 'Ticket Abierto ',
                showConfirmButton: false,
                timer: 1500
            })
        }
      })


}




init();