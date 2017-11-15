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
  alert(this);
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
   ActualizarEventos();
  })
}

function ActualizarEventos()
{
  $('.filtro').change(function(e)
  {
    e.preventDefault();
    cambioSelector(this.value);
  });
}

function cambioSelector(valor)
{
  alert(valor);
  carga(valor);
}

function guardarSubmit(form, action)
{
  alert(form);
  alert(action);
  let serializeData = form.serialize();
  alert(serializeData);
  $.post(action, serializeData, function (response)
  {
    if ((action.indexOf("verificarUsuario") > 0))
    {
      actualizaNav();
    }
     $('.js-carga').html(response);
  });
}

// function actualizaNav()
//    {
//      location.reload();
//    }
