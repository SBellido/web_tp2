$(document).ready(function(){

$("body").on("submit", "#formGuardar", function(e){

e.preventDefault();
  let form_data = new FormData(this);
  console.log(form_data);
  $.ajax({
    url: "guardarImagen",
    contentType: false,
    processData: false,
    data: form_data,
    type: 'post',
    success: function(data)
    {
       $('.js-carga').html(data);
    }
  });
  return false;
  });

  $("body").on("submit",'.js-submit',function(e) {
  e.preventDefault();

  guardarSubmit($(this),this.action);
  });

    $("body").on("click",'.partial',function(e) {
    e.preventDefault();
    carga(this.href);
    });
});
function carga(url)
{
$.post(url, "", function(data)
{
   $('.js-carga').html(data);
  // ActualizarEventos();
})
}
function guardarSubmit(form, action){
  let serializeData = form.serialize();

  $.post(action, serializeData, function (response){
    if ((action.indexOf("verificarUsuario") > 0)) {
               actualizaNav();
               }
     $('.js-carga').html(response);

  });
}

function actualizaNav()
   {        location.reload();    }
