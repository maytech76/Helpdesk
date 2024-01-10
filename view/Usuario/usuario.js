var tabla;

function init(){

    $("#usuario_form").on("submit", function(e){
        guardaryeditar(e);
    });

}

/* TODO:Creamos la funcion con doble proposito Guardar ó Editar si llega con usu_id */
function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#usuario_form')[0].reset();
            $('#modaluser').modal('hide');
            
            swal.fire({
                icon: 'success',
                title: 'Registro Efectuado',
                text:'Con Exito',
                showConfirmButton: false,
                timer: 1500
            });

             location.reload();  /* Recargar la pagina actual */

 
           
        }


    });
}




$(document).ready(function(){

       
        tabla=$('#usuario_data').dataTable({
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
                url: '../../controller/usuario.php?op=listar',
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
  

});



/* TODO:Creamos las funciones para los botones de mantenimiento */

function editar(usu_id){

    $('#titulo').html('Editar Registro');
    /* TODO:Consultamos el servicio mostrar del controlador usuario */
    $.post("../../controller/usuario.php?op=mostrar", {usu_id : usu_id}, function(data){
        /* TODO:Convertimos los datos que recibimos de la consulta SQL a JSON */
        data = JSON.parse(data);
        /* TODO:Asignamos los valores JSON a etiquetas id */
        $('#usu_id').val(data.usu_id);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_apep').val(data.usu_apep);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_pass').val(data.usu_pass);
        $('#rol_id').val(data.rol_id).trigger('change');
    });

    $('#modaluser').modal('show');
    
  
}

/* TODO:Funcion Eliminar Usuario */
function eliminar(usu_id){


    Swal.fire({
        title: 'Seguro de Eliminar registro',
        text: "Proceso Inrreversible",
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#D30D0D',
        cancelButtonColor: '#F39925',
        confirmButtonText: 'SI'
      }).then((result) => {
        if (result.isConfirmed) {

            $.post("../../controller/usuario.php?op=eliminar", {usu_id:usu_id}, function(data){

            });

            $('#usuario_data').DataTable().ajax.reload()


            Swal.fire({
                icon: 'success',
                title: 'Registro Eliminado ',
                text:'Del Listado',
                showConfirmButton: false,
                timer: 1500
            })
        }
      })

}


/* TODO:Metodo Nuevo Registro al recibir un click el boton  */
$(document).on("click", "#btnnuevo", function(){

$('#usu_id').val('');

/* TODO:Cambiar Titulo del Modal */
$('#titulo').html('Nuevo Registro')

/* TODO:Metodo para resetear formulario  */
/* $('#usuario_form')[0].reset(); */

/* TODO:Mostrar Modal */
$('#modaluser').modal('show');

});




init();