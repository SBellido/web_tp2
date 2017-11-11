<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h1>Lista de Productos</h1>
  {if $isAdmin}
    <a class="partial" href="agregarProducto">Agregar Producto</a> |
    {/if}
      <ul class="list-group">
        {foreach from=$productos item=producto}
        <li class="list-group-item">
          {if !$producto['stock']}
          <b>{$producto['nombre']}</b> ${$producto['precio']} - Colores: {$producto['color']} - Talles: {$producto['talle']}
{if $isAdmin}
            <a class="partial" href="borrarProducto/{$producto['id']}"><span aria-hidden="true"></span></a>
            <a class="partial" href="finalizarProducto/{$producto['id']}"><span  aria-hidden="true"></span></a>
            <a class="partial" href="editarProducto/{$producto['id']}"><span aria-hidden="true"></span></a>
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
          {/foreach}
        </ul>
      </div>
    </div>
