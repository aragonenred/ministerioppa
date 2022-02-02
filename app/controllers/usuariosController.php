<?php
    class usuariosController{
        
        public function index(){
            include_once('views/buscarUsuario.php');
        }
        
        public function getUsuarios(){
            include_once('models/usuarios_model.php');
            $usuario = new usuarios_model();

            $post['usuario'] = '%' . $_POST['usuario'] . '%';
            $post['nombre'] = '%' . $_POST['nombre'] . '%';
            
            $datos = $usuario->getUsuarios($post);
            
            //Armado del JSON      
              $json['usuarios'] = $datos;
              echo json_encode($json);
        }

        public function editarUsuario(){
            include_once('models/usuarios_model.php');
            $usuario = new usuarios_model();

            if($_POST){
                $post['usuario'] = $_POST['usuario'];
                $post['nombre'] = $_POST['nombre'];
                if(isset($_POST['pass'])){$post['pass'] = $_POST['pass'];}

                $data = $usuario->putUsuario($post);
                echo json_encode($data);

            }else{
                $data = $usuario->getUsuario($_GET['usuario']);
                include_once('views/editarUsr.php');
            }
            
            
        }

        public function agregarUsuario(){
            include_once('models/usuarios_model.php');
            $usuario = new usuarios_model();

            if($_POST){
                $post['usuario'] = $_POST['usuario'];
                $post['nombre'] = $_POST['nombre'];
                $post['pass'] = $_POST['pass'];

                $respuesta = $usuario->postUsuario($post);
                echo json_encode($respuesta);
            }else{

                include_once('views/altaUsr.php');
            }
        }

        public function deleteUsuario(){
            include_once('models/miembros_model.php');
            $miembro = new miembros_model();

            if(isset($_POST['usuario'])){
                $respuesta = $miembro->deleteUsuario($_POST['usuario']); 
                echo json_encode($respuesta);
            }
        }
       
       
    }

?>