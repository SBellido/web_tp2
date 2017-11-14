<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {if isset($error) }
    <div class="alert alert-danger partial" role="alert">{$error}</div>
    {/if}
    <form action="guardarTarea" method="post" id="formGuardar" enctype="multipart/form-data">
    <input type="file" name="imageToUpload" id="imageToUpload">
    <h1>Editar Producto</h1>
    <form action="guardarEditarProducto" class="js-submit" method="post">
      <div class="form-group">
        <input type="hidden" name="id" value="{$productos['id']}">
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
        <label for="stock">Stock</label>
        <input type="checkbox" id="stock" name="stock" value="0">
      </div>
      <button type="submit" class="btn btn-default">Editar</button>
    </form>
  </div>
</div>
