<?php
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
?>