<?php

class SecuredController extends Controller
{

  function __construct()
  {
    session_start();
    if(isset($_SESSION['USER'])){
      if (time() - $_SESSION['LAST_ACTIVITY'] > 1000) {
        header('Location: '.LOGOUT);
        die();
      }
      $_SESSION['LAST_ACTIVITY'] = time();
    }
    else {

    }
  }

  public function getUser() {
    if(isset($_SESSION['USER'])){
      return $_SESSION['USER'];
    }

  }
  function isAdmin(){
      if(isset($_SESSION['USER'])){
      return true;
    }
     else {
       return false;
     }
   }

   public function verificaPermiso()
    {
        if(isset($_SESSION['USER']) && $_SESSION['permissions']==1)
        {
            return 1;
        }
        else
            return 0;
    }

  function login(){
     header('Location: '.LOGIN);
     die();
  }
}



?>
