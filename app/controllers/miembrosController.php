<?php
    class miembrosController{


        public function index(){
            include_once('views/miembros.php');
        }


        public function detalle(){
            include_once('models/miembros_model.php');
            $miembro = new miembros_model();
            
            $data = $miembro->getMiembro($_GET['id']);

            include_once('views/detalle.php');
        }

        public function edit(){
            include_once('models/miembros_model.php');
            $miembro = new miembros_model();
            
            $data = $miembro->getMiembro($_GET['id']);

            include_once('views/editar.php');
        }



        
        function getMiembros(){
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
            
            $json['personas'] = $datos;
            echo json_encode($json);
        }


        function postMiembro(){
        /**Datos Personales */
        $foto = $_POST['foto'];
        if($_POST['dni']){ $dni = $_POST['dni'];}else{ $dni = '';}
        if($_POST['nombre']){$nombre = $_POST['nombre'];}else{$nombre = '';}
        if($_POST['apellido']){$apellido = $_POST['apellido'];}else{$apellido = '';}
        $direccion = $_POST['direccion'];
        if($_POST['localidad']){$localidad = $_POST['localidad'];}else{$localidad = '';}
        $provincia = $_POST['provincia'];
        $cp = $_POST['cp'];
        $nacionalidad = $_POST['nacionalidad'];
        $nacimiento = $_POST['nacimiento'];
        $sexo = $_POST['sexo'];
        if($_POST['estadocivil']){$estadocivil = $_POST['estadocivil'];}else{$estadocivil = '';}
        $conyuge = $_POST['conyuge'];
        if(isset($_POST['conyugeC'])){$conyugeC = $_POST['conyugeC'];}else{$conyugeC = '';};
        $hijos = $_POST['hijos'];
        if($_POST['oficio']){$oficio = $_POST['oficio'];}else{$oficio = '';}
        

        /**Datos de Contacto */
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $mail = $_POST['mail'];

        /**Informacion Adicional */
        if(isset($_POST['miembro'])){$miembro = $_POST['miembro'];}else{$miembro='';}
        $fechaMiembro = $_POST['fechaMiembro'];

        if (isset($_POST['bautizado'])){$bautizado = $_POST['bautizado'];}else{$bautizado = '';}
        
        $fechaB = $_POST['fechaB'];
        if(isset($_POST['BES'])){$BES = $_POST['BES'];}else{$BES='';};
        $fconversion = $_POST['fconversion'];
        $iglesia = $_POST['iglesia'];
        $estudios = $_POST['estudios'];
        $estudiosb = $_POST['estudiosb'];
        $actividades = $_POST['actividades'];
        $observaciones = $_POST['observaciones'];

        $respuesta = array();

        include_once('includes/funciones/db.php');

        $sql = "INSERT INTO miembros (dni, nombre, apellido, direccion, localidad, provincia, cpostal, nacionalidad, fechaNacimiento, sexo, EstadoCivil, conyuge, conyugeCreyente, hijos, oficio, telefono, celular, mail, miembro, Fmiembro, bautizado, FBautismo, BES, fconversion, iglesiaProviene, estudios, estudiosb, actividades, observaciones) ";
        $sql .= " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssssissssssisssssssssssssss", $dni, $nombre, $apellido, $direccion, $localidad, $provincia, $cp, $nacionalidad, $nacimiento, $sexo, $estadocivil, $conyuge, $conyugeC, $hijos, $oficio, $telefono, $celular, $mail, $miembro, $fechaMiembro, $bautizado, $fechaB, $BES, $fconversion, $iglesia, $estudios, $estudiosb, $actividades, $observaciones);   
            $stmt->execute();
            $lastId = $conn->insert_id;

            if($lastId){
                //Guardar Foto
            $sql = "UPDATE miembros SET Foto64 = ? WHERE IDMiembro =" . $lastId ;
            $stmt = $conn->prepare($sql);
            $null = NULL;
            $stmt->bind_param("b", $null);
            $stmt->send_long_data(0, $foto);
            $stmt->execute();

            $respuesta = array(
                        'codigo' => '200',
                        'descripcion' => 'Registro Ingresado',
                        'lastId' => $lastId );
            }else{
            $respuesta = array(
                        'codigo' => '500',
                        'descripcion' => 'No se pudo ingresar registro',
                        'lastId' => '' );
            }

            echo json_encode($respuesta);
            
        } catch (\Throwable $th) {
            echo $th;
        }
        
        }


        function putMiembro(){
            include_once('models/miembros_model.php');
            $miembro = new miembros_model();

            /**Datos Personales */
            $post['idmiembro'] = $_POST['idmiembro'];
            $post['foto'] = $_POST['foto'];
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


        function deleteMiembro(){
        if(isset($_POST['id'])){
            $idmiembro = $_POST['id']; 
            
            include_once('includes/funciones/db.php');
        
            $sql= "DELETE FROM miembros WHERE idmiembro = ? ";
            try {
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $idmiembro);
                $stmt->execute();
                
                $respuesta = array();
                if ($conn->affected_rows) {
                    $respuesta = array(
                        'codigo' => '200',
                        'descripcion' => 'Registro Borrado',
                        'affected_rows' => $conn->affected_rows );
                }else{
                    $respuesta = array(
                        'codigo' => '500',
                        'descripcion' => 'No se pudo borrar el registro',
                        'affected_rows' => $conn->affected_rows );
                }

            } catch (\Throwable $th) {
                $respuesta = array(
                    'codigo' => '500',
                    'descripcion' => 'No se pudo actualizar el registro error en try-catch',
                    'descripcion_larga' => $th,
                    'affected_rows' => '');
            }
            echo json_encode($respuesta);
        }

        }






    }


?>