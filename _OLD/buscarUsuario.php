<?php include_once('includes/templates/header.php'); ?>   
<?php include_once('includes/templates/sidebar.php'); ?>    
        <main>
            <section class="buscar" id="buscar">
                <form class="formulario" id="formulario-buscar" action="#">
                    <div class="campos-buscar">
                        <div class="separador-form">                       
                                <h1>Buscar</h1>
                                <div class="campos">
                                    <div> 
                                        <div class="campo">
                                            <label for="nombre">Usuario</label>
                                            <input type="text" placeholder="Usuario" id="usuario">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="campo">
                                            <label for="Nombre">Nombre</label>
                                            <input type="text" id="nombre" placeholder="Nombre">
                                        </div>
                                    </div>
                                </div><!--div campos-->
                            <input type="submit" class="btn" value="Buscar" id="btn-buscar-usr">
                        </div><!---Separador Form--->
                    </div>
                    
                </form>
            </section>

            <section class="resultados resultados-usr" id="resultados">

                    <table class="tabla-buscar" id="tabla-buscar">
                        <tr class="tabla-titulo">
                            <td><span><h1>Usuario</h1></span></td>
                            <td><span><h1>Nombre</h1></span></td>
                        </tr>                     
                    </table>
                    

            </section>


        </main>
   

<?php include_once('includes/templates/footer.php'); ?>