//funcion que carga el vicerrectorado
function cargar_vice(){
    $.get("includes/campo_general.html", function(htmlexterno){
      $("#contenedor_principal").html(htmlexterno);
         });
  }
  

//carga el formulario subir expediente


