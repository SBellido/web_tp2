<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {if isset($error) }
    <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    <h1>Nuevo Producto</h1>
    <form action="guardarProducto" method="post" class="js-submit">
      <div class="form-group">
        <label for="id_categoria"></label>
        <select name='id_categoria'>
          {foreach from=$categorias item=categoria}
          <option value= '{$categoria['id']}'>{$categoria['nombre']}</option>
          {/foreach}
        </select>
      </div>
      <div class="form-group">
        <label for="precio">Precio en Peso Argentino $</label>
        <input type="number" name="precio" id="precio" name="precio" rows="8" cols="50" value="{$precio}" placeholder="Precio del producto">{$precio}</input>
      </div>
      <div class="form-group">
        <label for="color">Colores disponibles</label>
        <input type="text" id="color" name="color" value="{$color}" placeholder="Colores disponibles">{$color}</input>
      </div>
      <div class="form-group">
        <label for="talle">Talles disponibles</label>
        <input type="text" id="talle" name="talle" value="{$talle}" placeholder="Talles disponibles">{$talle}</input>
      </div>
      <div class="form-group">
        <label for="stock">Sin stock</label>
        <input type="checkbox" id="stock" name="stock" value="1">
      </div>
      <button type="submit" class="btn btn-default">Crear Producto</button>
    </form>
  </div>
</div>
