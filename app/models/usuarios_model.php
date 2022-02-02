<?php
    class usuarios_model{        
        private $db;
           
        public function __construct(){
            $this->db = Conectar::conexion(); //el :: es para ivocar un metodo estatico sin necesidad de instaciar un objeto de esa clase
        }


        function getUsuarios($post){
            $datos = array();
            try {
              $sql = "SELECT usuario, nombre FROM usuarios ";
              $sql .= " WHERE usuario like ? and nombre like ?";
       
              $stmt = $this->db->prepare($sql);
              $stmt->bind_param("ss", $post['usuario'], $post['nombre']);
              $stmt->execute();
              $stmt->bind_result($usuario, $nombre);

            } catch (\Exception $e) {
                $datos['respuesta'] = "Ocurrió un error al realizar la consulta: " . $e;
                return $datos;
            }
       
            while ( $stmt->fetch() ) {
                  $datos[] = array(
                                  'usuario' => $usuario,
                                  'nombre' => $nombre
                                  );
                }
                return $datos;
              //$json['usuarios'] = $datos;
              //echo json_encode($json);
            
        }

        public function getUsuario($usuario){
            try {   
                $sql = "SELECT usuario, nombre FROM usuarios ";
                $sql .= " WHERE usuario = ?";
            
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("s", $usuario);
                $stmt->execute();
                $stmt->bind_result($usuario, $nombre);
                
                while ($stmt->fetch()) {
                    $data['usuario'] = $usuario;
                    $data['nombre']  =$nombre;
                }

                return $data;
                
            } catch (\Throwable $th) {
                echo $th;
            }
 
        }

        public function putUsuario($post){
            /**Datos Personales */
            $usuario = $post['usuario'];
            $nombre = $post['nombre'];
            if(isset($post['pass'])){$pass = $post['pass'];}
                      
            if(isset($pass)){
                $sql = "UPDATE usuarios SET nombre = ? , password = ? WHERE usuario = ?";
                try{
                    $stmt = $this->db->prepare($sql);
                    $stmt->bind_param("sss", $nombre, $pass, $usuario);   
                    $stmt->execute();
                    $respuesta = array();
                    if ($this->db->affected_rows) {
                    $respuesta = array(
                        'codigo' => '200',
                        'descripcion' => 'Registro Actualizado',
                        'affected_rows' => $this->db->affected_rows );
                    }else{
                    $respuesta = array(
                        'codigo' => '500',
                        'descripcion' => 'No se pudo actualizar el registro',
                        'affected_rows' => $this->db->affected_rows );
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
                    $stmt = $this->db->prepare($sql);
                    $stmt->bind_param("ss", $nombre, $usuario);   
                    $stmt->execute();
                    $respuesta = array();
                    if ($this->db->affected_rows) {
                    $respuesta = array(
                        'codigo' => '200',
                        'descripcion' => 'Registro Actualizado',
                        'affected_rows' => $this->db->affected_rows );
                    }else{
                    $respuesta = array(
                        'codigo' => '500',
                        'descripcion' => 'No se pudo actualizar el registro',
                        'affected_rows' => $this->db->affected_rows );
                    }  
                }catch(\Throwable $th) {
                    $respuesta = array(
                        'codigo' => '500',
                        'descripcion' => 'No se pudo actualizar el registro, error en try-catch',
                        'descripcion_larga' => $th->getMessage(),
                        'affected_rows' => '');
                } 
            }
            return $respuesta;
        }


        public function postUsuario($post){
            $usuario = $post['usuario'];
            $nombre = $post['nombre'];
            $pass = $post['pass'];

            $respuesta = array();

            $sql = "INSERT INTO usuarios (usuario, password, nombre) VALUES (?, ?, ?) ";
            
            try {
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sss", $usuario, $pass, $nombre);   
            $stmt->execute();
            $rowsAffected = $this->db->affected_rows;

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

            return $respuesta;
        }

        public function deleteUsuario($usuario){
            $sql= "DELETE FROM usuarios WHERE usuario = ? ";
            try {
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("s", $usuario);
                $stmt->execute();
                
                $respuesta = array();
                if ($this->db->affected_rows) {
                    $respuesta = array(
                        'codigo' => '200',
                        'descripcion' => 'Registro Borrado',
                        'affected_rows' => $this->db->affected_rows );
                }else{
                    $respuesta = array(
                        'codigo' => '500',
                        'descripcion' => 'No se pudo borrar el registro',
                        'affected_rows' => $this->db->affected_rows );
                }
            } catch (\Throwable $th) {
                $respuesta = array(
                    'codigo' => '500',
                    'descripcion' => 'No se pudo actualizar el registro error en try-catch',
                    'descripcion_larga' => $th,
                    'affected_rows' => '');
            }
            return $respuesta;
        }



    }

?>