function empleados(){
    var dt = $("#tabla").DataTable({
            "ajax": "../../../Controlador/controlador_empleados.php?accion=listar",
            "columns": [
                { "data": "IdEmpleado" } ,
                { "data": "NombreEmpleado" },
                { "data": "Email" },
                { "data": "SueldoBase" },
                { "data": "Telefono" },
                { "data": "TipoUsuario" },
                { "data": "NombreSede" },
                { "data": "Estado" },
                { "data": "IdEmpleado",
                  render: function (data) {
                            return '<a href="#" data-codigo="'+ data + 
                                   '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
              }
            ]
    });

//   $("#cerrar").on("click", function(){
//       $("#titulo").html("Listado de Empleados");
//       $(".titulo").html("Empleados");
//       $("#edicion").hide();
//       $("#listado").show();
//       $("#nuevo").show(); 
//       $("#listado").load(); 
//   })  

  $("#edicion").hide();

  $("#nuevo").click(function(){
      $("#titulo").html("Registro de Empleados");
      $(".titulo").html("Datos de Registro");
      $("#edicion").show();
      $("#listado").hide();
      $("#nuevo").hide();
      $("#edicion").load('../../../Vista/php/Empleados/form_nuevo_empleado.php', function(){
          $.ajax({
             type:"get",
             url:"../../../Controlador/controlador_empleados.php",
             data: {accion:'listar_sedes'},
             dataType:"json"
          }).done(function( resultado ) {                    ;
              $.each(resultado.data, function (index, value) { 
                $("#IdSede").append("<option value='" + value.IdSede + "'>" + value.NombreSede + "</option>")
              });
          });

          $.ajax({
            type:"get",
            url:"../../../Controlador/controlador_empleados.php",
            data: {accion:'listar_usuarios'},
            dataType:"json"
         }).done(function( resultado ) {                    ;
             $.each(resultado.data, function (index, value) { 
               $("#Cargo").append("<option value='" + value.IdTipoUsuario + "'>" + value.TipoUsuario + "</option>")
             });
         });

      });
      
  })

  $("#edicion").on("click","button#grabar",function(){
    console.log(datos);
    var datos=$("#datos").serialize();
    //console.log(datos);
    $.ajax({
          type:"get",
          url:"../../../Controlador/controlador_empleados.php",
          data: datos,
          dataType:"json"
        }).done(function( resultado ) {
            if(resultado.respuesta){
              swal({
                  position: 'center',
                  type: 'success',
                  title: 'El Empleado Fue Registrado Exitosamente',
                  showConfirmButton: false,
                  timer: 3500
              })
                   $("#titulo").html("Listado de Empleados");
                   $("#edicion").html('');
                   $("#edicion").hide();
                   $("#listado").show();
                   $("#nuevo").show();
                  dt.page( 'last' ).draw( 'page' );
                  dt.ajax.reload(null, false);                   
           } else {
              swal({
                  position: 'center',
                  type: 'error',
                  title: 'Error Al Registrar El Empleado',
                  showConfirmButton: false,
                  timer: 3500
              });
             
          }
      });
  });

  $("#edicion").on("click","button#actualizar",function(){
       var datos=$("#datos").serialize();
       console.log(datos);
       $.ajax({
          type:"get",
          url:"../../../Controlador/controlador_empleados.php",
          data: datos,
          dataType:"json"
        }).done(function( resultado ) { 
            if(resultado.respuesta){    
              swal({
                  position: 'center',
                  type: 'success',
                  title: 'Se Actualizaron Los Datos Correctamente',
                  showConfirmButton: false,
                  timer: 1500
              }) 
                    $("#titulo").html("Listado de Empleados");
                    $("#edicion").html('');
                    $("#edicion").hide();
                    $("#listado").show();
                    $("#nuevo").show();
                dt.ajax.reload(null, false);       
           } else {
              swal({
                type: 'error',
                title: '¡Error!',
                text: 'Verifique la información'                         
              })
          }
      });
  })
  
  $(".contenedor").on("click","a.editar",function(){
     var codigo = $(this).data("codigo");
     var sede;
     var cargo;
     console.log(codigo);
     $("#titulo").html("Actualización de Datos Empleados");
     $(".titulo").html("Datos a Actualizar");
     $("#edicion").show();
     $("#listado").hide();
     $("#nuevo").hide();
     $("#edicion").load('../../../Vista/php/Empleados/form_editar_empleado.php',function(){
          $.ajax({
              type:"get",
              url:"../../../Controlador/controlador_empleados.php",
              data: {codigo: codigo, accion:'consultar'},
              dataType:"json"
              }).done(function( empleado ) {        
                  if(empleado.respuesta === "No Existe El Empleado"){
                      swal({
                      type: 'error',
                      title: '¡Error!',
                      text: '¡El Empleado No Existe!'                         
                      })
                  } else {
                      $("#IdEmpleado").val(empleado.codigo);                   
                      $("#NombreEmpleado").val(empleado.nombre);
                      $("#Email").val(empleado.email);
                      $("#SueldoBase").val(empleado.sueldo);
                      $("#Telefono").val(empleado.telefono);
                      cargo = empleado.cargo;
                      sede = empleado.sede;
                      $("#Estado").val(empleado.estado);
                  }
          });

          $.ajax({
              type:"get",
              url:"../../../Controlador/controlador_empleados.php",
              data: {accion:'listar_sedes'},
              dataType:"json"
          }).done(function( resultado ) {                      
              $.each(resultado.data, function (index, value) { 
              if(sede === value.IdSede){
                  $("#edicion #IdSede").append("<option selected value='" + value.IdSede + "'>" + value.NombreSede + "</option>")
              }else {
                  $("#edicion #IdSede").append("<option value='" + value.IdSede + "'>" + value.NombreSede + "</option>")
              }
              });
          });

          $.ajax({
            type:"get",
            url:"../../../Controlador/controlador_empleados.php",
            data: {accion:'listar_usuarios'},
            dataType:"json"
        }).done(function( resultado ) {                      
            $.each(resultado.data, function (index, value) { 
            if(cargo === value.IdTipoUsuario){
                $("#edicion #Cargo").append("<option selected value='" + value.IdTipoUsuario + "'>" + value.TipoUsuario + "</option>")
            }else {
                $("#edicion #Cargo").append("<option value='" + value.IdTipoUsuario + "'>" + value.TipoUsuario + "</option>")
            }
            });
        });

      });
  })
}