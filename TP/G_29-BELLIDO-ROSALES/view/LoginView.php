<?php
class LoginView extends View
{
  function mostrarLogin( $user){
    $this->smarty->assign('invitado', $user);
    $this->smarty->display('templates/Login/index.tpl');
  }
}
?>
