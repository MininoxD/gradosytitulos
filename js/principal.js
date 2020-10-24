//priorida la carga del login al inicio
$( document ).ready(function() {
      cargar_login();
});



//carga el login
function cargar_login(){
  $.get("includes/login.html", function(htmlexterno){
    //let contenido = htmlexterno;
    $('#contenedor_principal').html(htmlexterno);
       });
}


// Verificar el login para llamar a las paginas
function login_verifica(){

    //let consulta = "https://gtproyeccion.000webhostapp.com/api/Api_usuarios.php?operacion=validar&dni_u=04079175&contrasena=123";
    var datos = $('#form_login').serialize();
    datos = datos+"&operacion=validar";
    $.ajax({
      url: "https://gtproyeccion.000webhostapp.com/api/Api_usuarios.php",
      type:"POST",
      data: datos,
      async: false,
      success: function(r, status, XHR){
            r.map((d)=>{
              if("Secretaria General" === d.rol){
                $('#contenedor_principal').empty();
                cargar_vice();
              }
            });
          
      },
      error: function(XHR, status, error){
        alert("Usuario o Password incorrecto");
      }
      });

    /*let usuario = $("#l_usuario").val();
    let pass = $("#l_pass").val();

    if(usuario=="admin1" && pass=="admin1"){
      $('#contenedor_principal').empty();

    }else if(usuario=="admin2" && pass=="admin2") {

    }else if(usuario=="vice" && pass=="vice") {
      $('#contenedor_principal').empty();
      cargar_vice();
    }else {
      alert("Usuario o Password incorrecto");
    }*/
}


//cierra secion de cualquier usuario
function cerrar() {
    $('#contenedor_principal').empty();
    cargar_login();
}
