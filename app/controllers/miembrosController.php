<?php
    class miembrosController{


        public function index(){
            include_once('views/miembros.php');
        }


        public function detalle(){
            include_once('models/miembros_model.php');
            $miembro = new miembros_model();
            
            $data = $miembro->getMiembro($_GET['id']);
            if($data){
                include_once('views/detalle.php');
            }else{
               echo "Error al cargar el registro";
            }
            
        }

        public function edit(){
            include_once('models/miembros_model.php');
            $miembro = new miembros_model();
            
            $data = $miembro->getMiembro($_GET['id']);
            if($data){
                include_once('views/editar.php');
            }else{
                echo "Error al cargar el registro";
             }
            
        }

        
        public function getMiembros(){
            include_once('models/miembros_model.php');
            $miembro = new miembros_model();
            $json = array();

            $post['dni'] = '%' . $_POST['dni'] . '%';
            $post['nombre'] = '%' . $_POST['nombre'] . '%';
            $post['apellido'] = '%' . $_POST['apellido'] . '%';
            $post['estadocivil'] = '%' . $_POST['estadocivil'] . '%';
            $post['localidad'] = '%' . $_POST['localidad'] . '%';
            $post['oficio'] = '%' . $_POST['oficio'] . '%';
            $post['bautizado'] = '%' . $_POST['bautizado'] . '%';

            $datos = $miembro->getMiembros($post);
            //Armado del JSON           
            if($datos){
                $json['personas'] = $datos;
                echo json_encode($json);
            }else{
                $json['error'] = Array('respuesta'=>'No se enconto registro');
                echo json_encode($json);
            }
        }



        public function putMiembro(){
            include_once('models/miembros_model.php');
            $miembro = new miembros_model();

            /**Datos Personales */
            $post['idmiembro'] = $_POST['idmiembro'];
            $post['foto'] = $_FILES['foto']['name'];
            if($_POST['dni']){ $post['dni'] = $_POST['dni'];}else{ $post['dni'] = '';}
            if($_POST['nombre']){$post['nombre'] = $_POST['nombre'];}else{$post['nombre'] = '';}
            if($_POST['apellido']){$post['apellido'] = $_POST['apellido'];}else{$post['apellido'] = '';}
            $post['direccion'] = $_POST['direccion'];
            if($_POST['localidad']){$post['localidad'] = $_POST['localidad'];}else{$post['localidad'] = '';}
            $post['provincia'] = $_POST['provincia'];
            $post['cp'] = $_POST['cp'];
            $post['nacionalidad'] = $_POST['nacionalidad'];
            $post['nacimiento'] = $_POST['nacimiento'];
            $post['sexo'] = $_POST['sexo'];
            if($_POST['estadocivil']){$post['estadocivil'] = $_POST['estadocivil'];}else{$post['estadocivil'] = '';}
            if(isset($_POST['conyugeC'])){$post['conyugeC'] = $_POST['conyugeC'];}else{$post['conyugeC'] ='';}
            $post['hijos'] = $_POST['hijos'];
            if($_POST['oficio']){$post['oficio'] = $_POST['oficio'];}else{$post['oficio'] = '';}
        
            /**Datos de Contacto */
            $post['telefono'] = $_POST['telefono'];
            $post['celular'] = $_POST['celular'];
            $post['mail'] = $_POST['mail'];

            /**Informacion Adicional */
            if(isset($_POST['miembro'])){$post['miembro'] = $_POST['miembro'];}else{$post['miembro'] = '';}
            $post['fechaMiembro'] = $_POST['fechaMiembro'];
            if ($_POST['bautizado']){$post['bautizado'] = $_POST['bautizado'];}else{$post['bautizado'] = '';}
            $post['fechaB'] = $_POST['fechaB'];
            $BES = $_POST['BES'];
            $post['fconversion'] = $_POST['fconversion'];
            $post['iglesia'] = $_POST['iglesia'];
            $post['estudios'] = $_POST['estudios'];
            $post['estudiosb'] = $_POST['estudiosb'];
            $post['actividades'] = $_POST['actividades'];
            $post['observaciones'] = $_POST['observaciones'];

            $respuesta = $miembro->update($post);
            echo json_encode($respuesta);
  
        }


        public function deleteMiembro(){
            include_once('models/miembros_model.php');
            $miembro = new miembros_model();

            if(isset($_POST['id'])){
                $respuesta = $miembro->deleteMiembro($_POST['id']); 
                echo json_encode($respuesta);
            }
            
        }


        public function postMiembro(){
            if($_POST){
                include_once('models/miembros_model.php');
                $miembro = new miembros_model();
    
                /**Datos Personales */
                //if(isset($_POST['foto'])){$post['foto'] = $_POST['foto'];}else{$post['foto']='';}
                if(isset($_FILES['foto']['tmp_name'])){
                    $post['foto']['name'] = $_FILES['foto']['tmp_name']; 
                    $post['foto']['default'] = false;
                }else{
                    $post['foto']['name']='img/default.png';
                    $post['foto']['default'] = true;
                }

                if(isset($_POST['dni'])){ $post['dni'] = $_POST['dni'];}else{ $post['dni'] = '';}
                if($_POST['nombre']){$post['nombre'] = $_POST['nombre'];}else{$post['nombre'] = '';}
                if($_POST['apellido']){$post['apellido'] = $_POST['apellido'];}else{$post['apellido'] = '';}
                $post['direccion'] = $_POST['direccion'];
                if($_POST['localidad']){$post['localidad'] = $_POST['localidad'];}else{$post['localidad'] = '';}
                $post['provincia'] = $_POST['provincia'];
                $post['cp'] = $_POST['cp'];
                $post['nacionalidad'] = $_POST['nacionalidad'];
                $post['nacimiento'] = $_POST['nacimiento'];
                $post['sexo'] = $_POST['sexo'];
                if($_POST['estadocivil']){$post['estadocivil'] = $_POST['estadocivil'];}else{$post['estadocivil'] = '';}
                $post['conyuge'] = $_POST['conyuge'];
                if(isset($_POST['conyugeC'])){$post['conyugeC'] = $_POST['conyugeC'];}else{$post['conyugeC'] = '';};
                $post['hijos'] = $_POST['hijos'];
                if($_POST['oficio']){$post['oficio'] = $_POST['oficio'];}else{$post['oficio'] = '';}
                
                /**Datos de Contacto */
                $post['telefono'] = $_POST['telefono'];
                $post['celular'] = $_POST['celular'];
                $post['mail'] = $_POST['mail'];
        
                /**Informacion Adicional */
                if(isset($_POST['miembro'])){$post['miembro'] = $_POST['miembro'];}else{$post['miembro']='';}
                $post['fechaMiembro'] = $_POST['fechaMiembro'];
        
                if (isset($_POST['bautizado'])){$post['bautizado'] = $_POST['bautizado'];}else{$post['bautizado'] = '';}
                
                $post['fechaB'] = $_POST['fechaB'];
                if(isset($_POST['BES'])){$post['BES'] = $_POST['BES'];}else{$post['BES']='';};
                $post['fconversion'] = $_POST['fconversion'];
                $post['iglesia'] = $_POST['iglesia'];
                $post['estudios'] = $_POST['estudios'];
                $post['estudiosb'] = $_POST['estudiosb'];
                $post['actividades'] = $_POST['actividades'];
                $post['observaciones'] = $_POST['observaciones'];
                
    
                $respuesta = $miembro->postMiembro($post);
                echo json_encode($respuesta);
            }else{
                include_once('views/alta.php');
            }
            
            
        }
    
    



    }


?>