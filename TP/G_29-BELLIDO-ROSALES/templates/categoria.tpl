<ul class="list-group">
  <h1>Lista de Categorias</h1>
  {if $isAdmin}
  <a class="partial" href="agregarCategoria">Agregar Categoria</a>
  {/if}
  {foreach from=$categorias item=categoria}
  <li class="list-group-item">
    {if !$categoria['nombre'] }
    <s>{$categoria['nombre']} : {$categoria['descripcion']}</s>
    {else}
    {$categoria['nombre']} : {$categoria['descripcion']}
    {/if}
    {if $isAdmin}
    <a class="partial" href="borrarCategoria/{$categoria['id']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    <a class="partial" href="editarCategoria/{$categoria['id']}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
    {/if}
  </li>
  {/foreach}
</ul>
