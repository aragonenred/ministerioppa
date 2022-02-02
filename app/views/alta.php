<?php include_once('includes/templates/header.php'); ?>
<?php include_once('includes/templates/sidebar.php'); ?>
     <main>
            <section class="buscar" id="buscar">
                <form class="formulario" id="formulario"  action="#">
                    <div>
                        <div class="separador-form">
                            <h1>Información personal</h1>
                            <div class="center photo-upload">
                                <label for="photo-input">
                                    <img class="foto-contacto" id="foto-contacto"  src="img/silueta.png" alt="silueta.png"> 
                                </label>
                                <input id="photo-input" type="file">
                            </div>                               
                                    <div class="campos">
                                        <div class="campo">
                                            <label for="dni">DNI</label>
                                            <input type="text" id="dni" name='dni' placeholder="Documento" class="numerico" maxlength="8" >
                                            
                                        </div>
                                    </div>                          
                                    <div class="campos">
                                        <div class="campo">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" placeholder="Nombre" id="nombre" name="nombre" class="notnull" maxlength="100">
                                        </div>
                                        <div class="campo">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" id="apellido" placeholder="Apellido" name="apellido" class="notnull" maxlength="45">
                                        </div>
                                    </div>
                                    <div class="campos">
                                        <div class="campo">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" id="direccion" name="direccion" placeholder="Dirección" maxlength="45">
                                        </div>
                                        
                                        <div class="campo">
                                            <label for="localidad">Localidad</label>
                                            <input type="text" id="localidad" name="localidad" placeholder="Localidad" class="notnull" maxlength="45">
                                        </div>
                                        
                                        <div class="campo">
                                            <label for="provincia">Provincia</label>
                                            <input type="text" id="provincia" name="provincia" placeholder="Provincia" maxlength="45">
                                        </div>
                                    </div>                   
                                    <div class="campos">
                                        <div class="campo">
                                            <label for="cp">Codigo Postal</label>
                                            <input type="number" id="cp" name="cp" min="0" max="99999">                               
                                        </div>
                                    </div>
                                    <div class="campos">
                                        <div class="campo">
                                            <label for="nacionalidad">Nacionalidad</label>
                                            <input type="text" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad" maxlength="45">
                                        </div>
                                        <div class="campo">
                                            <label for="nacimiento">Fecha de Nacimiento</label>
                                            <input type="date" id="nacimiento" name="nacimiento" >
                                        </div>
                                    </div>
                                    <div class="campos">
                                        <div class="campo">                                            
                                            <label for="sexo">Sexo</label>
                                            <select name="sexo" id="sexo" name="sexo"> 
                                                <option value="" selected>----Selecciona----</option>                             
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option> 
                                            </select>            
                                        </div>
                                    </div>
                                    <div class="campos">
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
                                            <label for="conyuge">Conyuge</label>
                                            <input type="text" id="conyuge" name="conyuge" placeholder="Conyuge" maxlength="45">
                                        </div>                                                     
                                        <div class="campo">
                                            <label for="conyugeC">Conyuge creyente: </label> 
                                            <div class="radio">
                                                <label for="conyugeC">SI</label>
                                                <input type="radio" id="conyugeC-rd1" name="conyugeC-rd1" value="si">
                                                <label for="conyugeC">NO</label>
                                                <input type="radio" id="conyugeC-rd2" name="conyugeC-rd2" value="no">       
                                            </div>
                                        </div>                               
                                    </div>    
                                    <div class="campos">
                                        <div class="campo">
                                            <label for="hijos">Hijos</label>
                                            <input type="number" id="hijos" name="hijos" min='0' max='50' value='0'>
                                        </div>
                                    </div>
                                    <div class="campos">      
                                        <div class="campo">
                                            <label for="oficio">Oficio</label>
                                            <input type="text" id="oficio" name="oficio" placeholder="" maxlength="45">
                                        </div>
                                    </div>
                        </div> <!---Informacion Personal--->

                        <div class="separador-form">                       
                            <h1>Datos de Contacto</h1>
                            <div class="campos">
                                <div class="campo">
                                    <label for="telefono">Telefono</label>
                                    <input type="tel" id="telefono" name="telefono" placeholder="02224 123 456" maxlength="15">
                                </div>
                                <div class="campo">
                                    <label for="celular">Celular</label>
                                    <input type="tel" id="celular" name="celular" placeholder="11 12345678" maxlength="15">
                                </div>
                                <div class="campo">
                                    <label for="mail">e-mail</label>
                                    <input type="email" id="mail" name="mail" placeholder="usuario@correo.com" maxlength="30">
                                </div>                           
                            </div>
                        </div> <!---Informacion Contacto--->

                        
                        <div class="separador-form">                       
                            <h1>Información adicional</h1>
                            <div class="campos">
                                <div class="campo">
                                    <label for="miembro">Es miembro?: </label>                         
                                    <div class="radio">
                                        <label for="">SI</label>
                                        <input type="radio" id="miembro-rd1" name="miembro-rd1" value="si">
                                        <label for="">NO</label>
                                        <input type="radio" id="miembro-rd2" name="miembro-rd2" value="no">
                                    </div>        
                                </div>
                                
                                <div class="campo">
                                    <label for="fechaMiembro">Fecha desde:</label>
                                    <input type="date" id="fechaMiembro" name="fechaMiembro">
                                </div>   
                            </div>            
                        
                            <div class="campos">
                                <div class="campo">
                                    <label for="domicilio">Bautizado: </label> 
                                    <div class="radio">
                                        <label for="bautizado">SI</label>
                                        <input type="radio" id="bautizado-rd1" name="bautizado-rd1" value="si">
                                        <label for="bautizado">NO</label>
                                        <input type="radio" id="bautizado-rd2" name="bautizado-rd2" value="no">
                                    </div>
                                </div>
                                <div class="campo">
                                    <label for="domicilio">Fecha de Bautismo</label>
                                    <input type="date" id="fechaB" name="fechaB" >
                                </div>
                                <div class="campo">
                                    <label for="BES">Bautismo ES: </label> 
                                    <div class="radio">
                                        <label for="BES">SI</label>
                                        <input type="radio" id="BES-rd1" name="BES-rd1" value="si">
                                        <label for="BES">NO</label>
                                        <input type="radio" id="BES-rd2" name="BES-rd2" value="no">
                                    </div>
                                </div>                        
                            </div>
                      
                            <div class="campos">
                                <div class="campo">
                                    <label for="fconversion">Fecha de Conversion</label>
                                    <input type="date" id="fconversion" name="fconversion" >
                                </div>
                            
                            </div>
                            <div class="campos">
                                <div class="campo">
                                    <label for="iglesia">Iglesia de la cual proviene:</label>
                                    <input type="text" id="iglesia" name="iglesia" maxlength="45" >
                                </div>
                            </div>
                            <div class="campos">
                                <div class="campo">
                                    <label for="estudios">Estudios</label>
                                    <select name="estudios" id="estudios">                              
                                        <option value="" selected>----Selecciona----</option>
                                        <option value="Primarios">Primarios</option>
                                        <option value="Secundarios" >Secundario</option>
                                        <option value="Terciario" >Terciario</option>
                                        <option value="Universitario" >Universiario</option>            
                                    </select>
                                </div>
                                <div class="campo">
                                    <label for="estudiosb">Estudios Biblicos:</label>
                                    <textarea name="estudiosb" id="estudiosb" cols="50" rows="5" placeholder="Estudios, cursos, seminarios, etc."></textarea> 
                                </div>
                            </div>
                            <div class="campos">
                                <div class="campo">
                                    <label for="actividades">Actividades:</label>
                                   <textarea name="actividades" id="actividades" cols="50" rows="5" placeholder="Actividades que realiza en la iglesia"></textarea> 
                                </div>
                            </div>
                           <div class="campos">
                                <div class="campo">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea name="observaciones" id="observaciones" cols="50" rows="10"></textarea>
                                </div>
                           </div>
                           <input type="submit" class="btn"  value="Agregar" id="btn-agregar">
                    
                        </div> <!---Informacion Adicional--->
                    </div>

                </form>
            </section>

            <section class="resultados"></section>
        </main>

<?php include_once('includes/templates/footer.php'); ?>