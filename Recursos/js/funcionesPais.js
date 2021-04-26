function Pais(){
 var  dt=  $("#tabla").DataTable({
        	"ajax": "controlador/controladorPais.php?accion=listar",
        	"columns": [
	            { "data": "pais_codi"} ,
	            { "data": "pais_nomb" },
	            { "data": "muni_nomb" },
                {
                    "data": "pais_codi",
                    render: function (data) {
                        return '<a href="#" data-codigo="'+ data + ' " class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' +
                               '<a href="#" data-codigo="'+ data + ' " class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                    }
                }
        	]
        })



  $("#editar").on("click",".btncerrar", function(){
      $(".box-title").html("Listado de Pais");
      $("#editar").addClass('hide');
      $("#editar").removeClass('show');
      $("#listado").addClass('show');
      $("#listado").removeClass('hide');  
      $(".box #nuevo").show(); 
  })  

  $(".box").on("click","#nuevo", function(){
      $(this).hide();
      $(".box-title").html("Crear Pais");
      $("#editar").addClass('show');
      $("#editar").removeClass('hide');
      $("#listado").addClass('hide');
      $("#listado").removeClass('show');
      $("#editar").load('./Vistas/Pais/nuevoPais.php', function(){
          $.ajax({
             type:"get",
             url:"./Controlador/controladormunicipio.php",
             data: {accion:'listar'},
             dataType:"json"
          }).done(function( resultado ) {                    ;
              $.each(resultado.data, function (index, value) { 
                $("#editar #pais_capi").append("<option value='" + value.muni_codi + "'>" + value.muni_nomb + "</option>")
              });
          });
      });
      
  })

  $("#editar").on("click","button#grabar",function(){
    var datos=$("#fpais").serialize();
   // console.log(datos);
    $.ajax({
          type:"get",
          url:"./Controlador/controladorPais.php",
          data: datos,
          dataType:"json"
        }).done(function( resultado ) {
            if(resultado.respuesta){
              swal({
                  position: 'center',
                  type: 'success',
                  title: 'El Pais fue grabado con éxito',
                  showConfirmButton: false,
                  timer: 1200
              })     
                  $(".box-title").html("Listado de Pais");
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

  $("#editar").on("click","button#actualizar",function(){
       var datos=$("#fpais").serialize();
       $.ajax({
          type:"get",
          url:"./Controlador/controladorPais.php",
          data: datos,
          dataType:"json"
        }).done(function( resultado ) {
            console.log("----"+resultado);
 
            if(resultado.respuesta){    
              swal({
                  position: 'center',
                  type: 'success',
                  title: 'Se actualizaron los datos correctamente',
                  showConfirmButton: false,
                  timer: 1500
              }) 
              $(".box-title").html("Listado de Paiss");
              $("#editar").html('');
              $("#editar").addClass('hide');
              $("#editar").removeClass('show');
              $("#listado").addClass('show');
              $("#listado").removeClass('hide');
              dt.ajax.reload(null, false);       
           } else {
              swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'                         
              })
          }
      });
  })

  $(".box-body").on("click","a.borrar",function(){
      //Recupera datos del formulario
      var codigo = $(this).data("codigo");
      
      swal({
            title: '¿Está seguro?',
            text: "¿Realmente desea borrar el Pais con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
      }).then((decision) => {
              if (decision.value) {
                  var request = $.ajax({
                      method: "get",                  
                      url: "./Controlador/controladorPais.php",
                      data: {codigo: codigo, accion:'borrar'},
                      dataType: "json"
                  })
                  request.done(function( resultado ) {
                      if(resultado.respuesta == 'correcto'){
                          swal({
                            position: 'center',
                            type: 'success',
                            title: 'El Pais con codigo ' + codigo + ' fue borrado',
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
     var capital;
     $(".box-title").html("Actualizar Pais")
     $("#editar").addClass('show');
     $("#editar").removeClass('hide');
     $("#listado").addClass('hide');
     $("#listado").removeClass('show');
     $("#editar").load("./Vistas/Pais/editarPais.php",function(){
          $.ajax({
              type:"get",
              url:"./Controlador/controladorPais.php",
              data: {codigo: codigo, accion:'consultar'},
              dataType:"json"
              }).done(function( Pais ) {  
                  console.log(Pais);      
                  if(Pais.respuesta === "no existe"){
                      swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Pais no existe!'                         
                      })
                  } else {
                      $("#pais_codi").val(Pais.codigo);                   
                      $("#pais_nomb").val(Pais.nombre);
                      capital = Pais.capital;
                  }
          });

          $.ajax({
              type:"get",
              url:"./Controlador/controladormunicipio.php",
              data: {accion:'listar'},
              dataType:"json"
          }).done(function( resultado ) {                      
              $.each(resultado.data, function (index, value) { 
              if(capital === value.muni_codi){
                  $("#editar #pais_capi").append("<option selected value='" + value.muni_codi + "'>" + value.muni_nomb + "</option>")
              }else {
                  $("#editar #pais_capi").append("<option value='" + value.muni_codi + "'>" + value.muni_nomb + "</option>")
              }
              });
          });
      });
  })
}
