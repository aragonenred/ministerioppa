<?php include_once('includes/templates/header.php'); ?>   
<?php include_once('includes/templates/sidebar.php'); ?>
     <main>
            <section class="buscar" id="buscar">
                <form class="formulario" id="formulario" action="#">
                   <div>
                   <div class="separador-form">                       
                        <h1>Información personal</h1>
                        <div class="campos">
                            <div class="campo">
                                <label for="usuario">Usuario</label>
                                <input type="text" id="usuario" placeholder="jperez"  >
                            </div>
                        </div>
                        <div class="campos">
                            <div class="campo">
                                <label for="usuario">Nombre</label>
                                <input type="text" id="nombre" placeholder="Juan Perez"  >
                            </div>
                        </div>
                        <div class="campos">
                            <div class="campo">
                                <label for="usuario">Contraseña</label>
                                <input type="password"  id="pass" name="pass2">
                            </div>
                        </div>
                        <div class="campos">
                            <div class="campo">
                                <label for="usuario">Repetir Contraseña</label>
                                <input type="password" id="pass2" name="pass2">
                            </div>
                        </div>
                   </div>
                   </div>
                   <input type="submit" class="btn" value="Agregar" id="btn-agregar-usr">                    
                </form>
            </section>

            <section class="resultados">

                  

            </section>


        </main>
<?php include_once('includes/templates/footer.php'); ?>