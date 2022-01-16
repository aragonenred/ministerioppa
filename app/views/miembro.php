<?php
  if (isset($_POST['accion'])) {

    $accion = $_POST['accion'];

    switch ($accion) {
      case 'get':
        getMiembros();
        break;
      case 'post':
        postMiembro();
        break;
      case 'put':
        putMiembro();
        break;
      case 'delete':
        deleteMiembro();
        break;
      default:
        $respuesta = array("respuesta" => "No se indico la accion a realizar");
        echo json_encode($respuesta);
        break;
    }
  }

 function getMiembros(){
     $json = array();

     $dni = '%' . $_POST['dni'] . '%';
     $nombre = '%' . $_POST['nombre'] . '%';
     $apellido = '%' . $_POST['apellido'] . '%';
     $estadocivil = '%' . $_POST['estadocivil'] . '%';
     $localidad = '%' . $_POST['localidad'] . '%';
     $oficio = '%' . $_POST['oficio'] . '%';
     $bautizado = '%' . $_POST['bautizado'] . '%';


     include_once('includes/funciones/db.php');
     try {
       $sql = "SELECT idMiembro, dni, nombre, apellido, direccion, localidad, provincia, cpostal, nacionalidad, fechaNacimiento, sexo, EstadoCivil, conyuge, conyugeCreyente, hijos, oficio, telefono, celular, mail, miembro, Fmiembro, bautizado, FBautismo, BES, fconversion, iglesiaProviene, estudios, estudiosb, actividades, observaciones FROM miembros ";
       $sql .= " WHERE DNI like ? and Nombre like ? and Apellido like ? and EstadoCivil like ? and localidad like ? and oficio like ? and bautizado like ?";

       $stmt = $conn->prepare($sql);
       $stmt->bind_param("sssssss", $dni, $nombre, $apellido, $estadocivil, $localidad, $oficio, $bautizado);
       $stmt->execute();
       $stmt->bind_result($idmiembro, $dni, $nombre, $apellido, $direccion, $localidad, $provincia, $cp, $nacionalidad, $nacimiento, $sexo, $estadocivil, $conyuge, $conyugeC, $hijos, $oficio, $telefono, $celular, $mail, $miembro, $fechaMiembro, $bautizado, $fechaB, $BES, $fconversion, $iglesia, $estudios, $estudiosb, $actividades, $observaciones);
     } catch (\Exception $e) {
        //$json['respuesta'] = "Ocurrió un error al realizar la consulta: " . $e;
     }

     //Armado del JSON      
       while ( $stmt->fetch() ) {
           $datos[] = array(
                           'idmiembro' => $idmiembro,
                           'dni' => $dni,
                           'nombre' => $nombre,
                           'apellido' => $apellido,
                           'direccion' => $direccion,
                           'localidad' => $localidad,
                           'provincia' => $provincia,
                           'cp' => $cp,
                           'nacionalidad' => $nacionalidad,
                           'nacimiento' => $nacimiento,
                           'sexo' => $sexo,
                           'estadocivil' => $estadocivil,
                           'conyuge' => $conyuge,
                           'conyugeC' => $conyugeC,
                           'hijos' => $hijos,
                           'oficio' => $oficio,
                           'telefono' => $telefono,
                           'celular' => $celular,
                           'mail' => $mail,
                           'miembro' => $miembro,
                           'fechaMiembro' => $fechaMiembro,
                           'bautizado' => $bautizado,
                           'fechaB' => $fechaB,
                           'BES' => $BES,
                           'fconversion' => $fconversion,
                           'iglesia' => $iglesia,
                           'estudios' => $estudios,
                           'estudiosb' => $estudiosb,
                           'actividades' => $actividades,
                           'observaciones' => $observaciones
                           );
         }
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
     /**Datos Personales */
     $idmiembro = $_POST['idmiembro'];
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
      $conyugeC = $_POST['conyugeC'];
      $hijos = $_POST['hijos'];
      if($_POST['oficio']){$oficio = $_POST['oficio'];}else{$oficio = '';}
    
 
     /**Datos de Contacto */
     $telefono = $_POST['telefono'];
     $celular = $_POST['celular'];
     $mail = $_POST['mail'];
 
     /**Informacion Adicional */
     $miembro = $_POST['miembro'];
     $fechaMiembro = $_POST['fechaMiembro'];
     if ($_POST['bautizado']){$bautizado = $_POST['bautizado'];}else{$bautizado = '';}
     $fechaB = $_POST['fechaB'];
     $BES = $_POST['BES'];
     $fconversion = $_POST['fconversion'];
     $iglesia = $_POST['iglesia'];
     $estudios = $_POST['estudios'];
     $estudiosb = $_POST['estudiosb'];
     $actividades = $_POST['actividades'];
     $observaciones = $_POST['observaciones'];

     
 
     include_once('includes/funciones/db.php');
 
     $sql = "UPDATE miembros SET dni = ?, nombre = ? , apellido = ? , direccion = ? , localidad = ? , provincia = ?, cpostal = ?, nacionalidad = ?, fechaNacimiento = ?, sexo = ?, EstadoCivil = ?, conyuge = ?, conyugeCreyente = ?, hijos = ?, oficio = ?, telefono = ?, celular = ?, mail = ?, miembro = ?, Fmiembro = ?, bautizado = ?, FBautismo = ?, BES = ?, fconversion = ?, iglesiaProviene = ?, estudios = ?, estudiosb = ?, actividades = ?, observaciones = ? ";
     $sql .= " WHERE IDMiembro = ?";
 
     try {
       $stmt = $conn->prepare($sql);
       $stmt->bind_param("isssssissssssisssssssssssssssi", $dni, $nombre, $apellido, $direccion, $localidad, $provincia, $cp, $nacionalidad, $nacimiento, $sexo, $estadocivil, $conyuge, $conyugeC, $hijos, $oficio, $telefono, $celular, $mail, $miembro, $fechaMiembro, $bautizado, $fechaB, $BES, $fconversion, $iglesia, $estudios, $estudiosb, $actividades, $observaciones, $idmiembro);   
       $stmt->execute();

      //Guardar Foto
       $sql = "UPDATE miembros SET Foto64 = ? WHERE IDMiembro =" . $idmiembro ;
       $stmt = $conn->prepare($sql);
       $null = NULL;
       $stmt->bind_param("b", $null);
       $stmt->send_long_data(0, $foto);
       $stmt->execute();

       $respuesta = array();
       if ($conn->affected_rows) {
          $respuesta = array(
            'codigo' => '200',
            'descripcion' => 'Registro Actualizado',
            'affected_rows' => $conn->affected_rows );
       }else{
          $respuesta = array(
            'codigo' => '500',
            'descripcion' => 'No se pudo actualizar el registro',
            'affected_rows' => $conn->affected_rows );

       }

     } catch (\Throwable $th) {
          $respuesta = array(
            'codigo' => '500',
            'descripcion' => 'No se pudo actualizar el registro, error en try-catch',
            'descripcion_larga' => $th,
            'affected_rows' => '');
     }

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

 ?>