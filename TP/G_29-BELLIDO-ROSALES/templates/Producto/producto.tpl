<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h1>Lista de Productos</h1>
  {if $isAdmin}
    <a class="partial" href="agregarProducto">Agregar Producto</a> |
    {/if}
    <a>
      <label for="id_categoria"></label>
      <select name='id_categoria'>
        {foreach from=$PorCategoria item=id_categoria}
        <option value= '{$categoria['id']}'>{$categoria['nombre']}</option>
        {/foreach}
      </select>
    </a>
      <ul class="list-group">
        {foreach from=$productos item=producto}
        <li class="list-group-item">
          {if !$producto['stock']}
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
          </li>
            <a class="partial" href="agregarComentario">Comentar</a>
            <!-- <div class="comentarios">
              <input type="text" name="nombre" value="Tu Nombre" id="nombre">
              <textarea class="comentario" name="comentario" id="comentario" rows="4" cols="40"></textarea>
              <button type="submit" name="submit"> Comentar</button>
            </div> -->
          {/foreach}
        </ul>
      </div>
    </div>
