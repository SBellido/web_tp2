<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {if isset($error) }
    <div class="alert alert-danger partial" role="alert">{$error}</div>
    {/if}
    <h1>Editar Producto</h1>
    <form action="guardarEditarProducto" class="js-submit" method="post">
      <div class="form-group">
        <input type="hidden" name="id_categoria" value="{$productos['id_categoria']}">
        <label for="nombre">Nombre</label>
        <p type="text" class="form-control" id="nombre" name="nombre"  value="{$productos['nombre']}"></p>
      </div>
      <div class="form-group">
        <label for="precio">precio</label>
        <input type="number" class="form-control" id="precio" name="precio"  value="{$productos['precio']}">
      </div>
      <div class="form-group">
        <label for="color">color</label>
        <input type="text" class="form-control" id="color" name="color"  value="{$productos['color']}">
      </div>
      <div class="form-group">
        <label for="talle">talle</label>
        <input type="text" class="form-control" id="talle" name="talle"  value="{$productos['talle']}">
      </div>
      <div class="form-group">
        <label for="stock">Sin stock</label>
        <input type="checkbox" id="stock" name="stock" value="?">
      </div>
      <button type="submit" class="btn btn-default">Editar</button>
    </form>
  </div>
</div>
