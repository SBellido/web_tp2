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
    else{
    // $this->login();

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

   function login(){
     header('Location: '.LOGIN);
     die();
   }
 }



?>
