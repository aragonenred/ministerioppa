<?php
if(isset($_GET['rta'])){
    $rta = $_GET['rta'];
}else{
    $rta='';
} ?>
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
       <div class="login">
         <form  method="POST" action="index.php?c=login&a=validarUsuario" id="form-login" >   
            <input type="hidden" id="cod-respuesta" value=<?php echo $rta ?>>                 
            <div class="login-title">
                <img src="img/icono.png"  alt="">
                <h3> Administración PPA</h3>
            </div>
           
            <p>Iniciar Sesión</p>
            
            
            <div class="campos-login">
                <label for="user-login">Usuario:</label>
                <input type="text" name="user-login" id="user-login" placeholder="Nombre de usuario">
            </div>    
            <div class="campos-login">
                <label for="pass-login">Contraseña:</label>
                <input type="password" name="pass-login" id="pass-login" placeholder="Contraseña" value="123456">
            </div>   
            <div class="boton-login">
                <input type="submit" value="Ingresar" id ="boton-login" class="btn" >
            </div>
         </form>
        </div>
</body>
<footer>
    <script>
             document.addEventListener('DOMContentLoaded', function(){
                var formulario = document.querySelector('#form-login');
                var user = document.querySelector('#user-login');
                var pass = document.querySelector('#pass-login');
                var botonLogin = document.querySelector('#boton-login');
                var rta = document.querySelector('#cod-respuesta');
                
                if(rta.value == '500'){
                    alert('Usuario o Contraseña invalido');
                }

                botonLogin.addEventListener('click', function(e){
                    e.preventDefault();
                    user.classList.remove('campo-invalido');
                    pass.classList.remove('campo-invalido');
                     if(user.value.length == 0 || user.value == null || user.value.trim() == ""){
                         user.classList.add('campo-invalido');
                     }else if(pass.value.length == 0 || pass.value == null || pass.value.trim() == ""){
                        pass.classList.add('campo-invalido');
                     }else{
                        formulario.submit();
                     }
                });

             });

    </script>
</footer>
</html>