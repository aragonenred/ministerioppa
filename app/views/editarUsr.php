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
                                <input type="text" disabled = "true" id="usuario" placeholder="usuario" value="<?php echo $data['usuario']; ?>" >
                            </div>
                        </div>
                        <div class="campos">
                            <div class="campo">
                                <label for="usuario">Nombre</label>
                                <input type="text" id="nombre" placeholder="nombre" value="<?php echo $data['nombre']; ?>" >
                            </div>
                        </div>
                        <div class="campos">
                            <div class="checkbox">
                                <input type="checkbox" id="reset" name="reset" value="reset" >
                                <label for="usuario">Resetear contraseña</label>    
                            </div>
                            
                        </div>
                        <div class="campos campo-oculto">
                            <div class="campo">
                                <label for="usuario">Contraseña Nueva</label>
                                <input type="password"  id="pass" name="pass2">
                            </div>
                        </div>

                        <div class="campos campo-oculto">
                            <div class="campo">
                                <label for="usuario">Repetir Contraseña</label>
                                <input type="password" id="pass2" name="pass2">
                            </div>
                        </div>
                   </div>
                   </div>
                   <input type="submit" class="btn" value="Guardar Cambios" id="btn-modificar-usr">                    
                </form>
            </section>

            <section class="resultados">

                  

            </section>


        </main>


<?php include_once('includes/templates/footer.php'); ?>