<?php
class LoginView extends View
{
  function mostrarLogin( $user){
    $this->smarty->assign('invitado', $user);
    $this->smarty->display('templates/Login/index.tpl');
  }

  function mostrarRegistrar(){
    // $this->smarty->assign('invitado', $user);
    $this->assignarRegistrarForm();
    $this->smarty->display('templates/Login/registro.tpl');
  }

  private function assignarRegistrarForm($email='', $password=''){
    $this->smarty->assign('email', $email);
    $this->smarty->assign('password', $password);
  }
}

?>
