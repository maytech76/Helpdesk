function init(){


}


$(document).ready(function(){

    var usu_id = $('#user_idx').val(); /* Importante declarar esta variable usu_id */

    var rol_id = $('#rol_idx').val(); /* Importarnte declarar esta variable para la condicion segun el rol_id del usuario logeado */

    /* TODO:Aplicamos condicion Segun el rol_id del susario que ingreso al sistema */

    if($('#rol_idx').val()==1){

           $.post("../../controller/usuario.php?op=total", {usu_id:usu_id}, function(data) {
            data = JSON.parse(data);
            $('#lbltotal').html(data.total);
           
           });
       
            $.post("../../controller/usuario.php?op=totalabierto", {usu_id:usu_id}, function(data) {
               data = JSON.parse(data);              
               $('#lbltotalabierto').html(data.total);
              
            });
       
       
            $.post("../../controller/usuario.php?op=totalcerrado", {usu_id:usu_id}, function(data) {
               data = JSON.parse(data);            
               $('#lbltotalcerrado').html(data.total);
              
            });

            $.post("../../controller/usuario.php?op=grafico",{usu_id:usu_id}, function(data) {
               data = JSON.parse(data);
            
               new Morris.Bar({
      
                  element: 'divgrafico',
                  
                  data: data,
                  // Valores para el eje x (Años)
                  xkey: 'nombre',
            
                  // Valores para el Eje Y (Valores).
                  ykeys: ['total'],
            
                  // Labels for the ykeys -- will be displayed when you hover over the
                  // chart.
                  labels: ['Value'],


                  // Aplicar un color especifico a las Barras Usuario= Azul celeste
                  barColors:["#0FB0EF"], //
                });


              
            });

    }else{

           $.post("../../controller/ticket.php?op=total", function(data) {
            data = JSON.parse(data);            
            $('#lbltotal').html(data.total);
           
           });
       
            $.post("../../controller/ticket.php?op=totalabierto", function(data) {
               data = JSON.parse(data);              
               $('#lbltotalabierto').html(data.total);
              
            });
       
       
            $.post("../../controller/ticket.php?op=totalcerrado", function(data) {
               data = JSON.parse(data);
               $('#lbltotalcerrado').html(data.total);
              
            });


            $.post("../../controller/ticket.php?op=grafico", function(data) {
               data = JSON.parse(data);
         

               new Morris.Bar({
      
                  element: 'divgrafico',
                  
                  data: data,
                  // Valores para el eje x (Años)
                  xkey: 'nombre',
            
                  // Valores para el Eje Y (Valores).
                  ykeys: ['total'],
            
                  // Labels for the ykeys -- will be displayed when you hover over the
                  // chart.
                  labels: ['Value'],
                  
                  // Aplicar un color especifico a las Barras Soporte= Verde Claro
                  barColors:["#05CC8E"],
                });


              
            });
       


    } /* close document ready */

    

    
});




init();