<?php include_once('includes/templates/header.php'); ?>   
<?php include_once('includes/templates/sidebar.php'); ?>
    
     <main>
            <section class="buscar" id="buscar">
                <form class="formulario" id="formulario" action="#">
                    <div>
                        <div class="separador-form">                       
                            <h1>Información personal</h1>
                           <input type="hidden" id="idmiembro" value="<?php echo $data['idmiembro'];?>">

                           <div class="center photo-upload">
                                <label for="photo-input">
                                    <img class="foto-contacto" id="foto-contacto"  src="<?php echo $data['foto']; ?>" alt="silueta.png">
                                             
                                </label>
                                <input id="photo-input" type="file">
                            </div>  
                           <div class="campos">
                                <div class="campo">
                                    <label for="dni">DNI</label>
                                    <input type="text" id="dni" placeholder="Documento" value="<?php echo $data['dni']; ?>" >
                                </div>
                            </div>
                            <div class="campos">
                                <div class="campo">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" placeholder="Nombre" id="nombre" value="<?php echo $data['nombre']; ?>">
                                </div>
                                <div class="campo">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" id="apellido" placeholder="Apellido" value="<?php echo $data['apellido']; ?>">
                                </div>
                            </div>
                            <div class="campos">
                                <div class="campo">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" id="direccion" placeholder="Dirección" value="<?php echo $data['direccion']; ?>">
                                </div>
                                
                                <div class="campo">
                                    <label for="localidad">Localidad</label>
                                    <input type="text" id="localidad" placeholder="Localidad" value="<?php echo $data['localidad']; ?>">
                                </div>
                                
                                <div class="campo">
                                    <label for="provincia">Provincia</label>
                                    <input type="text" id="provincia" placeholder="Provincia" value="<?php echo $data['provincia']; ?>">
                                </div>
                            </div>
                        
                            <div class="campos">
                                <div class="campo">
                                    <label for="cp">Codigo Postal</label>
                                    <input type="number" id="cp" min="0" max="99999" value="<?php echo $data['cp']; ?>">                               
                                </div>
                            </div>
                            <div class="campos">
                                <div class="campo">
                                    <label for="nacionalidad">Nacionalidad</label>
                                    <input type="text" id="nacionalidad" placeholder="Nacionalidad" value="<?php echo $data['nacionalidad']; ?>">
                                </div>
                                <div class="campo">
                                    <label for="nacimiento">Fecha de Nacimiento</label>
                                    <input type="date" id="nacimiento" value="<?php echo $data['nacimiento'];?>">
                                </div>
                            </div>
                            <div class="campos">
                                <div class="campo">                                            
                                    <label for="sexo">Sexo</label>
                                    <select name="sexo" id="sexo"> 
                                        <option value="<?php echo $data['sexo']; ?>" selected><?php echo $data['sexo']; ?></option>                             
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                            
                                    </select>            
                                </div>
                            </div>

                            <div class="campos">
                            <div class="campo">                                            
                                    <label for="estadocivil">Estado Civil</label>
                                    <select name="estadocivil" id="estadocivil"> 
                                        <option value="<?php echo $data['estadocivil']; ?>" selected><?php echo $data['estadocivil']; ?></option>                             
                                        <option value="Casado">Casado/a</option>
                                        <option value="Divorciado">Divorciado/a</option>
                                        <option value="Separado">Separado/a</option>
                                        <option value="Soltero">Soltero/a</option>
                                        <option value="Viudo">Viudo/a</option>    
                                    </select>            
                                </div>  
                                <div class="campo">
                                    <label for="conyuge">Conyuge</label>
                                    <input type="text" id="conyuge" placeholder="Conyuge" value="<?php echo $data['conyuge']; ?>">
                                </div>                                                     
                                <div class="campo">
                                    <label for="conyugeC">Conyuge creyente: </label> 
                                    <div class="radio">
                                        <label for="conyugeC">SI</label>
                                    
                                        <?php if( strtolower($data['conyugeC']) == 'si' ){?>    
                                            <input type="radio" id="conyugeC-rd1" name="conyugeC" value="si" checked>
                                        <?php }else{ ?>
                                            <input type="radio" id="conyugeC-rd1" name="conyugeC" value="si">  
                                        <?php } ?>                                       

                                        <label for="conyugeC">NO</label>
                                        <?php if( strtolower($data['conyugeC']) == 'no' ){?>    
                                            <input type="radio" id="conyugeC-rd2" name="conyugeC" value="no" checked>
                                        <?php }else{ ?>
                                            <input type="radio" id="conyugeC-rd2" name="conyugeC" value="no">  
                                        <?php } ?>                                       
                                    </div>
                                </div>                               
                            </div>    
                            <div class="campos">
                                <div class="campo">
                                    <label for="hijos">Hijos</label>
                                    <input type="number" id="hijos" min='0' max='50' value="<?php echo $data['hijos']; ?>">
                                </div>
                            </div>
                            <div class="campos">      
                                <div class="campo">
                                    <label for="oficio">Oficio</label>
                                    <input type="text" id="oficio" placeholder="" value="<?php echo $data['oficio']; ?>">
                                </div>
                            </div>

                        </div> <!---Informacion Personal--->

                        <div class="separador-form">                       
                            <h1>Datos de Contacto</h1>
                            <div class="campos">
                                <div class="campo">
                                    <label for="telefono">Telefono</label>
                                    <input type="tel" id="telefono" placeholder="02224 123 456" value="<?php echo $data['telefono']; ?>">
                                </div>
                                <div class="campo">
                                    <label for="celular">Celular</label>
                                    <input type="tel" id="celular" placeholder="11 12345678" value="<?php echo $data['celular']; ?>">
                                </div>
                                <div class="campo">
                                    <label for="mail">e-mail</label>
                                    <input type="tel" id="mail" placeholder="usuario@correo.com" value="<?php echo $data['mail']; ?>">
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

                                        <?php if( strtolower($data['miembro']) == 'si' ){?>    
                                            <input type="radio" id="miembro-rd1" name="miembro" value="si" checked>
                                        <?php }else{ ?>
                                            <input type="radio" id="miembro-rd1" name="miembro" value="si">  
                                        <?php } ?>                                       

                                        <label for="">NO</label>
                                        <?php if( strtolower($data['miembro']) == 'no' ){?>    
                                            <input type="radio" id="miembro-rd2" name="miembro" value="no" checked>
                                        <?php }else{ ?>
                                            <input type="radio" id="miembro-rd2" name="miembro" value="no">  
                                        <?php } ?>    
                                    </div>        
                                </div>
                                
                                <div class="campo">
                                    <label for="fechaMiembro">Fecha desde:</label>
                                    <input type="date" id="fechaMiembro"value="<?php echo $data['fechaMiembro'];?>">
                                </div>   
                            </div>            
                        
                            <div class="campos">
                                <div class="campo">
                                    <label for="domicilio">Bautizado: </label> 
                                    <div class="radio">
                                        <label for="bautizado">SI</label>

                                        <?php if( strtolower($data['bautizado']) == 'si' ){?>    
                                            <input type="radio" id="bautizado-rd1" name="bautizado" value="si" checked>
                                        <?php }else{ ?>
                                            <input type="radio" id="bautizado-rd1" name="bautizado" value="si">  
                                        <?php } ?>                                       

                                        <label for="">NO</label>
                                        <?php if( strtolower($data['bautizado']) == 'no' ){?>    
                                            <input type="radio" id="bautizado-rd2" name="bautizado" value="no" checked>
                                        <?php }else{ ?>
                                            <input type="radio" id="bautizado-rd2" name="bautizado" value="no">  
                                        <?php } ?>    
                                    </div>
                                </div>
                                <div class="campo">
                                    <label for="domicilio">Fecha de Bautismo</label>
                                    <input type="date" id="fechaB" value="<?php echo $data['fechaB'];?>">
                                </div>
                                <div class="campo">
                                    <label for="BES">Bautismo ES: </label> 
                                    <div class="radio">
                                        <label for="BES">SI</label>

                                        <?php if( strtolower($data['bautizado']) == 'si' ){?>    
                                            <input type="radio" id="BES-rd1" name="BES" value="si" checked>
                                        <?php }else{ ?>
                                            <input type="radio" id="BES-rd1" name="BES" value="si">  
                                        <?php } ?>                                       

                                        <label for="">NO</label>
                                        <?php if( strtolower($data['bautizado']) == 'no' ){?>    
                                            <input type="radio" id="BES-rd2" name="BES" value="no" checked>
                                        <?php }else{ ?>
                                            <input type="radio" id="BES-rd2" name="BES" value="no">  
                                        <?php } ?>    
                                    </div>
                                </div>                        
                            </div>
                      
                            <div class="campos">
                                <div class="campo">
                                    <label for="fconversion">Fecha de Conversion</label>
                                    <input type="date" id="fconversion" value="<?php echo $data['fconversion'];?>">
                                </div>
                            
                            </div>
                            <div class="campos">
                                <div class="campo">
                                    <label for="iglesia">Iglesia de la cual proviene:</label>
                                    <input type="text" id="iglesia" value="<?php echo $data['iglesia']; ?>">
                                </div>
                            </div>
                            <div class="campos">
                                <div class="campo">
                                    <label for="estudios">Estudios</label>
                                    <select name="estudios" id="estudios">                              
                                        <option value="<?php echo $data['estudios']; ?>" selected><?php echo $data['estudios']; ?></option>
                                        <option value="Primarios">Primarios</option>
                                        <option value="Secundarios" >Secundario</option>
                                        <option value="Terciario" >Terciario</option>
                                        <option value="Universitario" >Universiario</option>            
                                    </select>
                                </div>
                                <div class="campo">
                                    <label for="estudiosb">Estudios Biblicos:</label>
                                    <textarea name="estudiosb" id="estudiosb" cols="50" rows="5" placeholder="Estudios, cursos, seminarios, etc." ><?php echo $data['estudiosb']; ?></textarea> 
                                </div>
                            </div>
                            <div class="campos">
                                <div class="campo">
                                    <label for="actividades">Actividades:</label>
                                   <textarea name="actividades" id="actividades" cols="50" rows="5" placeholder="Actividades que realiza en la iglesia" ><?php echo $data['actividades']; ?></textarea> 
                                </div>
                            </div>
                           <div class="campos">
                                <div class="campo">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea name="observaciones" id="observaciones" cols="50" rows="10" ><?php echo $data['observaciones']; ?></textarea>
                                </div>
                           </div>
                           <input type="submit" class="btn" value="Guardar Cambios" id="btn-modificar">
                    
                        </div> <!---Informacion Adicional--->
                    </div>

                </form>
            </section>

            <section class="resultados">

                  

            </section>


        </main>

<?php include_once('includes/templates/footer.php'); ?>