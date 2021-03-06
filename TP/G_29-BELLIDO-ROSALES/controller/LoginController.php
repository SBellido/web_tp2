<?php
include_once('model/LoginModel.php');
include_once('view/LoginView.php');



class LoginController extends SecuredController
{

  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new LoginModel();
  }

  public function registrar()
  {
     $email = $_POST['email'];
     $password = $_POST['password'];
     $registro=$this->model->createUser($email, $password);
     if($registro){
       verificaSetea($email, $password);


     }
     header('Location: '.CATEGORIA);
    // $this->view->mostrarRegistrar($email, $password);

  }

  public function index()
  {
    $user = $this->getUser();
    $this->view->mostrarLogin($user);
  }

  public function verify()
      {
          $userName = $_POST['usuario'];
          $password = $_POST['password'];
          $this->verificaSetea($userName,$password);
      }


      public function verificaSetea($userName,$password)
        {
            if(!empty($userName) && !empty($password)){
                $user = $this->model->getUser($userName);
                if((!empty($user)) && password_verify($password, $user[0]['password'])) {
                    session_start();
                    $_SESSION['USER'] = $userName;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    $_SESSION['permissions']= $user[0]["permisos"];
                    define('SESION', 1);
                    header('Location: '.HOME);
                }
                else{
                 $this->view->mostrarLogin('Usuario o Password incorrectos');
                }
            }
        }


  public function destroy()
  {
    session_start();
    session_destroy();
    header('Location: '.LOGIN);
  }

public function mostrarLogin(){
    $this->view->mostrarRegistrar();

}
}

?>
