<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h1>Lista de Productos</h1>
  {if $isAdmin}
    <a class="partial" href="agregarProducto">Agregar Producto</a>
    <form class="partial "action="guardarImagen" method="post" id="formGuardar" enctype="multipart/form-data">
    <input type="file" name="imageToUpload" id="imageToUpload"></form>
  {/if}

    <label for="id_categoria"></label>
      <form action="agregarProducto" method="post" class="js-submit">
        <div class="form-group">
          <label for="id_categoria"></label>
          <select class="filtro" name='id_categoria'>
            {foreach from=$selector item=selector}
            <option value= 'actualizarTabla{$selector['id']}'>{$selector['nombre']}</option>
            {/foreach}
          </select>
        </div>
      </form>
    <ul class="list-group">
        {foreach from=$productos item=producto}
        <li class="list-group-item">
          <b>{$producto['nombre']}</b> ${$producto['precio']} - Colores: {$producto['color']} - Talles: {$producto['talle']}

{if $isAdmin}

            <a class="partial navbar-right" href="borrarProducto/{$producto['id']}"><span aria-hidden="true"></span></a>
            <a class="partial navbar-right" href="finalizarProducto/{$producto['id']}"><span  aria-hidden="true"></span></a>
            <a class="partial navbar-right" href="editarProducto/{$producto['id']}"><span aria-hidden="true"></span></a>
{/if}
            {else}
            <s><b>{$producto['nombre']}</b> ${$producto['precio']} - Colores: {$producto['color']} - Talles: {$producto['talle']}</s>
            {/if}
            {if $isAdmin}
              <a class="partial" href="borrarProducto/{$producto['id']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              <a class="partial" href="finalizarProducto/{$producto['id']}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
              <a class="partial" href="editarProducto/{$producto['id']}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            {/if}
            <div>
              <form action="guardarComentario" method="post" class="js-submit">
                <label>Comentario</label><br>
                <textarea type="text" name="comentario" method="post"></textarea><br>
                <label>Nombre</label><br>
                <input type="text" name="nombre" method="post"></input><br>
                <button type="submit">Comentar</button>

            {if !$producto['stock']}

              </form>
            </div>

          </li>


          {/foreach}
        </ul>
      </div>
    </div>
