<?php
session_start();
require_once('db.php');

$user_login = $_POST['user-login'];
$pass = $_POST['pass-login'];

$sql = "SELECT COUNT(*) as cantidad, nombre from usuarios where usuario = '" . $user_login ."' and Password = '" . $pass . "' group by nombre";

if(isset($_POST['user-login']) && isset($_POST['pass-login'])){
    try{
        if($resultado = $conn->query($sql)){

            do { //Uso un do-while para que aunque la respuesta a la consulta sea = 0 entre al ciclo.
                if (isset($user) && $user['cantidad'] > 0){
                    $_SESSION['username'] = $user_login;
                    $_SESSION['nombre'] = $user['nombre'];
                    header('location: index.php');
                }else{
                    header('location: login.php?rta=500');
                }
            } while ($user = $resultado->fetch_assoc());
        }else{
            echo "error al consultar";
        }

    }catch(\Exception $e){
        echo "ocurrio un error al validar el usuario" . $e;
    }
}else{
    header('location: login.php');
}
?>
