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
                                            <label for="dni">DNI</label>
                                            <input type="text" id="dni" placeholder="Documento" >
                                        </div>
                                        <div class="campo">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" placeholder="Nombre" id="nombre">
                                        </div>
                                        <div class="campo">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" id="apellido" placeholder="Apellido">
                                        </div>
                                        
                                    </div>
                                    <div>
                                        <div class="campo">                                            
                                            <label for="estadocivil">Estado Civil</label>
                                            <select name="estadocivil" id="estadocivil"> 
                                                <option value="" selected>----Selecciona----</option>                             
                                                <option value="Casado">Casado/a</option>
                                                <option value="Divorciado">Divorciado/a</option>
                                                <option value="Separado">Separado/a</option>
                                                <option value="Soltero">Soltero/a</option>
                                                <option value="Viudo">Viudo/a</option>    
                                            </select>            
                                        </div> 
                                        <div class="campo">
                                            <label for="localidad">Localidad</label>
                                            <input type="text" id="localidad" placeholder="Localidad">
                                        </div>
                                        <div class="campo">
                                            <label for="oficio">Oficio</label>
                                            <input type="text" id="oficio" placeholder="">
                                        </div>
                                        
                                    </div>
                                    <div>
                                        <div class="campo">
                                            <label for="domicilio">Bautizado: </label> 
                                            <div class="radio">
                                                <label for="bautizado">SI</label>
                                                <input type="radio" id="bautizado-rd1" name="bautizado" value="si">
                                                <label for="bautizado">NO</label>
                                                <input type="radio" id="bautizado-rd2" name="bautizado" value="no">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--div campos-->


                            <input type="submit" class="btn" value="Buscar" id="btn-buscar">
                        </div><!---Separador Form--->
                    </div>
                    
                </form>
            </section>

            <section class="resultados" id="resultados">

                    <table class="tabla-buscar" id="tabla-buscar">
                        <tr class="tabla-titulo">
                            <td style="display:none;"><span><h1>ID</h1></span></td>
                            <td><span><h1>Documento</h1></span></td>
                            <td><span><h1>Nombres</h1></span></td>
                            <td><span><h1>Apellidos</h1></span></td>
                            <td class="titulo-oculto"><span><h1>Estado Civil</h1></span></td>
                            <td class="titulo-oculto"><span><h1>Oficio</h1></span></td>
                            <td class="titulo-oculto"><span><h1>Localidad</h1></span></td>
                            <td class="titulo-oculto"><span><h1>Bautizado</h1></span></td>
                        </tr>                     
                    </table>
                    

            </section>


        </main>
   

<?php include_once('includes/templates/footer.php'); ?>