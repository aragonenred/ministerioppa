<?php
    class login_model{        
        private $db;
           
        public function __construct(){
            $this->db = Conectar::conexion(); //el :: es para ivocar un metodo estatico sin necesidad de instaciar un objeto de esa clase
        }

        public function getuser($user_login, $pass){
            $sql = "SELECT usuario, password, nombre from usuarios where usuario = '" . $user_login ."' and Password = '" . $pass . "' LIMIT 1";

            try {
                $resultado = $this->db->query($sql);
                $user = $resultado->fetch_assoc();
                return $user;
                    
            } catch (\Throwable $th) {
                echo "Ocurrio un error al consultar la Base de Datos " . $th ;
                return false;
            }
                       
        }

    }

?>