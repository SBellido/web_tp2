{include file="style.tpl"}
<!-- {include file="header.tpl"} -->
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="js-submit" action="registrarUsuario" method="post">
      <div class="form-group">
        <label id="email" for="email">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Tu E-mail" required>
      </div>
      <div class="form-group">
        <label id="password" for="password">Password</label>
        <input type="password" class="form-control" id="password" name ="password" placeholder="Password" required>
      </div>
      {if !empty($error) }
      <div class="alert alert-danger" role="alert">{$error}</div>
      {/if}
      <button type="submit" class="btn btn-default ">Registrarme</button>
    </form>
    {if !empty($error) }
    <div role="EnterVisiter">{$error}</div>
  </div>
    {/if}

  </div>
<!-- {include file="footer.tpl"} -->
