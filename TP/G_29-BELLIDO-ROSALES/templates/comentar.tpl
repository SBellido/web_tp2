<div class="row">
   <div class="col-md-6 col-md-offset-3">
     {if isset($error) }
     <div class="alert alert-danger" role="alert">{$error}</div>
     {/if}
     <h1>Tu comentario</h1>
     <form action="agregarComentario" class="js-submit" method="post">
       <label for="id_producto"></label>
       <div class="form-group">
         <label for="nombre"></label>
         <input type="text" class="form-control" id="nombre" name="nombre"   placeholder="Nombre">
       </div>
       <div class="form-group">
         <label for="comentario"></label>
         <textarea name="comentario" id="comentario" name="comentario" rows="8" cols="50" placeholder="comentario"></textarea>
       </div>s
       <button type="submit" class="btn btn-default">Enviar</button>
     </form>
   </div>
 </div>
