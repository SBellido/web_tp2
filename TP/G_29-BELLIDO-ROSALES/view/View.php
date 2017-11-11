<?php

include_once 'libs/Smarty.class.php';

class View
{
  protected $smarty;

  function __construct()//)
  {

    $this->smarty = new Smarty();
    $this->smarty->assign('titulo', 'Indumentaria');
    // $this->smarty->assign('usuario', $user);

  }
}
?>
