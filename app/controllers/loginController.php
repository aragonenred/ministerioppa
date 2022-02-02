<?php
    class loginController{

        public function index(){
            include_once('views/login.php');
        }

        public function validarUsuario(){
            session_start();
            include_once('models/loginModel.php');
            $login = new login_model();
                  
            if(isset($_POST['user-login']) && isset($_POST['pass-login'])){
                $user_login = $_POST['user-login'];
                $pass = $_POST['pass-login'];

                try{
                    $resultado = $login->getUser($user_login, $pass);
                    
                    if($resultado){
                        $_SESSION['username'] = $user_login;
                        $_SESSION['nombre'] = $resultado['nombre'];
                        header('location: index.php?c=miembros&a=index');
                    }else{
                        header('location: index.php?c=login&a=index&rta=500');
                    }
                    
                }catch(\Exception $e){
                    echo "ocurrio un error al validar el usuario" . $e;
                }
            }else{
                header('location: index.php?c=login&a=index');
            }
        }

        public function logout(){
            session_start();
            session_destroy();
            header("location:index.php");
            exit();
        }


    } 

?>