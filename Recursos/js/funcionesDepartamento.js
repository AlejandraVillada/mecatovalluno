function departamento(){
    var  dt=  $("#tabla").DataTable({
               "ajax": "controlador/controladordepartamento.php?accion=listar",
               "columns": [
                   { "data": "depa_codi"} ,
                   { "data": "depa_nomb" },
                   { "data": "pais_nomb" },
                   {
                       "data": "depa_codi",
                       render: function (data) {
                           return '<a href="#" data-codigo="'+ data + ' " class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' +
                                  '<a href="#" data-codigo="'+ data + ' " class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                       }
                   }
               ]
           });
   
   
   
   
   
     $(".box").on("click","#nuevo", function(){
         $(this).hide();
         $(".box-title").html("Crear departamento");
         $("#editar").addClass('show');
         $("#editar").removeClass('hide');
         $("#listado").addClass('hide');
         $("#listado").removeClass('show');
         $("#editar").load('./Vistas/departamento/nuevodepartamento.php', function(){
             $.ajax({
                type:"get",
                url:"./Controlador/controladordepartamento.php",
                data: {accion:'listar'},
                dataType:"json"
             }).done(function( resultado ) {                    ;
                 $.each(resultado.data, function (index, value) { 
                   $("#editar #pais_codi").append("<option value='" + value.pais_codi + "'>" + value.pais_nomb + "</option>")
                 });
             });
         });
         
     })

     
     $("#editar").on("click","button#grabar",function(){
       
       
        var datos=$("#fdepartamento").serialize();
      // console.log(datos);
      validar();

       $.ajax({
             type:"get",
             url:"./Controlador/controladordepartamento.php",
             data: datos,
             dataType:"json"
           }).done(function( resultado ) {
               if(resultado.respuesta){
                 swal({
                     position: 'center',
                     type: 'success',
                     title: 'El departamento fue grabado con éxito',
                     showConfirmButton: false,
                     timer: 1200
                 })     
                     $(".box-title").html("Listado de departamento");
                     $(".box #nuevo").show();
                     $("#editar").html('');
                     $("#editar").addClass('hide');
                     $("#editar").removeClass('show');
                     $("#listado").addClass('show');
                     $("#listado").removeClass('hide');
                     dt.page( 'last' ).draw( 'page' );
                     dt.ajax.reload(null, false);                   
              } else {
                 swal({
                     position: 'center',
                     type: 'error',
                     title: 'Ocurrió un erro al grabar',
                     showConfirmButton: false,
                     timer: 1500
                 });
                
             }
         });
     });
     $("#editar").on("click",".btncerrar", function(){
        $(".box-title").html("Listado de departamento");
        $("#editar").addClass('hide');
        $("#editar").removeClass('show');
        $("#listado").addClass('show');
        $("#listado").removeClass('hide');  
        $(".box #nuevo").show(); 
    }) 
     $("#editar").on("click","button#actualizar",function(){
          var datos=$("#fdepartamento").serialize();
          $("#fdepartamento").validate({
            rules:{
                depa_nomb:{
                    required:true,
                }
            },
            messages:{
                
                depa_nomb:{
                    required:"es requerido un nombre",
                }
    
            },
            submitHandler: function(form) {
                alert("Todo Bien");
            }
            });
        //   $.ajax({
        //      type:"get",
        //      url:"./Controlador/controladordepartamento.php",
        //      data: datos,
        //      dataType:"json"
        //    }).done(function( resultado ) {
        //       console.log("----"+resultado);
    
        //        if(resultado.respuesta){    
        //          swal({
        //              position: 'center',
        //              type: 'success',
        //              title: 'Se actualizaron los datos correctamente',
        //              showConfirmButton: false,
        //              timer: 1500
        //          }) 
        //          $(".box-title").html("Listado de departamentos");
        //          $("#editar").html('');
        //          $("#editar").addClass('hide');
        //          $("#editar").removeClass('show');
        //          $("#listado").addClass('show');
        //          $("#listado").removeClass('hide');
        //          dt.ajax.reload(null, false);       
        //       } else {
        //          swal({
        //            type: 'error',
        //            title: 'Oops...',
        //            text: 'Something went wrong!'                         
        //          })
        //      }
        //  });
     })
   
     $(".box-body").on("click","a.borrar",function(){
         //Recupera datos del formulario
         var codigo = $(this).data("codigo");
         
         swal({
               title: '¿Está seguro?',
               text: "¿Realmente desea borrar el departamento con codigo : " + codigo + " ?",
               type: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Si, Borrarlo!'
         }).then((decision) => {
                 if (decision.value) {
                     var request = $.ajax({
                         method: "get",                  
                         url: "./Controlador/controladordepartamento.php",
                         data: {codigo: codigo, accion:'borrar'},
                         dataType: "json"
                     })
                     request.done(function( resultado ) {
                         if(resultado.respuesta == 'correcto'){
                             swal({
                               position: 'center',
                               type: 'success',
                               title: 'El departamento con codigo ' + codigo + ' fue borrado',
                               showConfirmButton: false,
                               timer: 1500
                             })       
                             var info = dt.page.info();   
                             if((info.end-1) == info.length)
                                 dt.page( info.page-1 ).draw( 'page' );
                             dt.ajax.reload(null, false);
                             
                         } else {
                             swal({
                               type: 'error',
                               title: 'Oops...',
                               text: 'Something went wrong!'                         
                             })
                         }
                     });
                      
                     request.fail(function( jqXHR, textStatus ) {
                         swal({
                           type: 'error',
                           title: 'Oops...',
                           text: 'Something went wrong!' + textStatus                          
                         })
                     });
                 }
         })
   
     });
     
     $(".box-body").on("click","a.editar",function(){
       
        var codigo = $(this).data("codigo");
        var pais;
        $(".box-title").html("Actualizar departamento")
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $("#listado").addClass('hide');
        $("#listado").removeClass('show');
        $("#editar").load("./Vistas/departamento/editardepartamento.php",function(){
             $.ajax({
                 type:"get",
                 url:"./Controlador/controladordepartamento.php",
                 data: {codigo: codigo, accion:'consultar'},
                 dataType:"json"
                 }).done(function( departamento ) {  
                     //console.log(departamento);      
                     if(departamento.respuesta === "no existe"){
                         swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'departamento no existe!'                         
                         })
                     } else {
                         $("#depa_codi").val(departamento.codigo);                   
                         $("#depa_nomb").val(departamento.nombre);
                         pais = departamento.pais;
                     }
             });
   
             $.ajax({
                 type:"get",
                 url:"./Controlador/controladorPais.php",
                 data: {accion:'listar'},
                 dataType:"json"
             }).done(function( resultado ) {                      
                 $.each(resultado.data, function (index, value) { 
                 if(pais === value.pais_codi){
                     $("#editar #pais_codi").append("<option selected value='" + value.pais_codi + "'>" + value.pais_nomb + "</option>")
                 }else {
                     $("#editar #pais_codi").append("<option value='" + value.pais_codi + "'>" + value.pais_nomb + "</option>")
                 }
                 });
             });
         });
     })



   

   }
   function validar(){
        $("#fdepartamento").validate({
        rules:{
            depa_nomb:{
                required:true,
            },
        },
        messages:{
            
            depa_nomb:{
                required:"es requerido un nombre",
            },

        },
        submitHandler: function(form) {
            alert("Todo Bien");
        }
        });

    }