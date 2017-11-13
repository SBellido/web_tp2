<!DOCTYPE html>
{include file="style.tpl"}
<html>
<head>
  <meta charset="utf-8">
  <title>{{$titulo}}</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <header>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active partial" type="submit" action="verificarUsuario" href="logout">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link partial" href="listaProductos">Lista de Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled partial" href="listaCategorias">Lista de Categorias</a>
      </li>
    </ul>
    <ul class="nav nav-tabs">
      {if $isAdmin}
      <li class="nav-item">usuario: Admin</li>
      {else}
      <li class="nav-item">usuario: invitado-</li>
      {/if}
    </ul>

  </header>
  <div class="logo">
    <img src="images/voa-logo.png" alt="">
  </div>
  <div class="container">
  </div>
