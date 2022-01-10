<?php session_start(); ?>
<?php
    if(isset($_SESSION['username'])){
        $user_login = $_SESSION['username'];
    }
    if(!isset($user_login)){
        header('location: ../../login.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/c21db70a60.js" crossorigin="anonymous"></script>
    <title>Pasion</title>
</head>

<body>

    <header class="">
        <div class="marco">
            <div class="barra">
                <div class="mensajes ocultar-mensajes" id="mensajes"></div>
                <div class="nav container ">
                    <div class="barra-logo">
                        <div class="titulo">
                            <p>Ministrerio Pasion por las almas</p>
                        </div>
                    </div>
                    <div class="user-login" id="user-login">
                        <i class="fas fa-user"></i></i>
                        <a href="#"><?php echo $_SESSION['nombre']; ?><i class="fas fa-chevron-down"></i></a>
                        <div class="menu-usr campo-oculto" id="menu-usr">
                        <a href="exit.php" class="">Cerrar Sesion</a>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>