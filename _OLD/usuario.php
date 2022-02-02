<?php
  if (isset($_POST['accion'])) {

    $accion = $_POST['accion'];

    switch ($accion) {
      case 'get':
        getUsuarios();
        break;
      case 'post':
        postUsuario();
        break;
      case 'put':
        putUsuario();
        break;
      case 'delete':
        deleteUsuario();
        break;
      default:
        $respuesta = array("respuesta" => "No se indico la accion a realizar");
        echo json_encode($respuesta);
        break;
    }
  }

 function getUsuarios(){
     $json = array();
     $usuario = '%' . $_POST['usuario'] . '%';
     $nombre = '%' . $_POST['nombre'] . '%';
 
     include_once('includes/funciones/db.php');
     try {
       $sql = "SELECT usuario, nombre FROM usuarios ";
       $sql .= " WHERE usuario like ? and nombre like ?";

       $stmt = $conn->prepare($sql);
       $stmt->bind_param("ss", $usuario, $nombre);
       $stmt->execute();
       $stmt->bind_result($usuario, $nombre);
     } catch (\Exception $e) {
        $json['respuesta'] = "Ocurrió un error al realizar la consulta: " . $e;
     }

     //Armado del JSON      
       while ( $stmt->fetch() ) {
           $datos[] = array(
                           'usuario' => $usuario,
                           'nombre' => $nombre
                           );
         }
       $json['usuarios'] = $datos;
       echo json_encode($json);
    }


  function postUsuario(){
    /**Datos Personales */
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];

    $respuesta = array();
    include_once('includes/funciones/db.php');

    $sql = "INSERT INTO usuarios (usuario, password, nombre) VALUES (?, ?, ?) ";
    
    try {
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sss", $usuario, $pass, $nombre);   
      $stmt->execute();
      $rowsAffected = $conn->affected_rows;

      if($rowsAffected > 0){
        $respuesta = array(
                  'codigo' => '200',
                  'descripcion' => 'Registro Ingresado',
                  'lastId' => $rowsAffected );
      }else{
        $respuesta = array(
                  'codigo' => '500',
                  'descripcion' => 'No se pudo ingresar registro',
                  'lastId' => $rowsAffected );
      }
      
    } catch (\Throwable $th) {
      $respuesta = array(
        'codigo' => '500',
        'descripcion' => 'No se pudo ingresar registro - error en try catch',
        'descripcion_larga' => $th->getMessage(),
        'lastId' => '' );
    }

    echo json_encode($respuesta);
  
  }


  function putUsuario(){
     /**Datos Personales */
      $usuario = $_POST['usuario'];
      $nombre = $_POST['nombre'];
      $pass = $_POST['pass'];
      
     include_once('includes/funciones/db.php');
     
     if($pass){
        $sql = "UPDATE usuarios SET nombre = ? , password = ? WHERE usuario = ?";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $nombre, $pass, $usuario);   
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
        }catch(\Throwable $th) {
               $respuesta = array(
                 'codigo' => '500',
                 'descripcion' => 'No se pudo actualizar el registro, error en try-catch',
                 'descripcionLarga' => $th->getMessage(),
                 'affected_rows' => '');
        }        
    }else{
        $sql = "UPDATE usuarios SET nombre = ? WHERE usuario = ?";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $nombre, $usuario);   
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
        }catch(\Throwable $th) {
               $respuesta = array(
                 'codigo' => '500',
                 'descripcion' => 'No se pudo actualizar el registro, error en try-catch',
                 'descripcion_larga' => $th->getMessage(),
                 'affected_rows' => '');
        } 
    }
     echo json_encode($respuesta);
   }


  function deleteUsuario(){
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