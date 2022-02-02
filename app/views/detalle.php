<?php include_once('includes/templates/header.php'); ?>   
<?php include_once('includes/templates/sidebar.php'); ?>

 <main>
     <section class="formulario-detalle">
               <div class="encabezado">
                    <h1><?php echo $data['nombre'] . ' ' . $data['apellido']; ?></h1>
                    <p><?php echo $data['direccion'] . ', ' . $data['localidad'] . ', ' . $data['provincia'] . ' (cp' . $data['cp'] . ')'; ?></p>
                    <div class="foto-contacto">
                        <?php
                        if(isset($data['foto64'])){?>
                            <img src= "<?php echo $data['foto64'] ?> "alt="silueta.png">
                            <?php }else{
                                if (isset($data['foto'])    ){?>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($data['foto'])?>" alt="silueta.png"> 
                                <?php }else{?>
                                        <img src= "img/silueta.png" alt="silueta.png">
                                     <?php }
                        } ?> 
                    </div> 
                </div>
                <div class="detalle-persona col2-60-40">
                    <div>
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-id-card"></i>
                            </div>
                            <div>
                                <p><span>DNI</span></p>
                                <p><?php echo $data['dni']; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-flag"></i>
                            </div>
                            <div>
                                <p><span>Nacionalidad</span></p>
                                <!-- <p><?php echo $data['nacionalidad']; ?></p> -->
                            </div> 
                        </div> 
                        
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div>
                                <p><span>Fecha de Nacimiento</span></p>
                                <p><?php echo $data['nacimiento']; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-venus-mars"></i>
                            </div>
                            <div>
                            <p><span>Sexo </span></p>
                                <p><?php echo $data['sexo']; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-book"></i>
                            </div>
                            <div>
                                <p><span>Estado Civil</span></p>
                                <p><?php 
                                    if (strtolower($data['estadocivil']) == 'casado') {
                                        echo $data['estadocivil'] . ' con ' . $data['conyuge'];
                                    }else{
                                        echo $data['estadocivil'];
                                    }?>
                                 </p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-praying-hands"></i>
                            </div>
                            <div>
                                <p><span>Conyuge creyente?</span></p>
                                <p><?php echo $data['conyugeC']; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-child"></i>
                            </div>
                            <div>
                                <p><span>Hijos</span></p>
                                <p><?php if($data['hijos'] >0){echo $data['hijos'];}else{echo 'No tiene';} ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div>
                                <p><span>Oficio</span></p>
                                <p><?php echo $data['oficio']; ?></p>
                            </div> 
                        </div> 
                    </div>

                    <div>
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <p><span>Telefono</span></p>
                                <p><?php echo $data['telefono']; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div>
                                <p><span>Celular</span></p>
                                <p><?php echo $data['celular']; ?></p>
                            </div> 
                        </div>
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div>
                                <p><span>e-mail</span></p> 
                                <p><?php echo $data['mail']; ?></p>
                            </div> 
                        </div>           
                    </div>
                </div>
                

           <div class="detalle-persona">
                <div class="separador-form">                       
                    <h1><i class="fas fa-church"></i> Información adicional</h1>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-bible"></i>
                            </div>
                            <div>
                                <p><span> Es miembro? </span></p>
                                <p><?php 
                                    if(strtolower($data['miembro']) == 'si' && $data['fechaMiembro']){
                                        echo $data['miembro'] . ', desde ' .$data['fechaMiembro']; 
                                    }else{
                                        echo $data['miembro'];
                                    }?>     
                                </p>
                                
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-bible"></i>
                            </div>
                            <div>
                                <p><span> Bautizado? </span></p>
                                <p><?php 
                                    if(strtolower($data['bautizado']) == 'si' && $data['fechaB']){
                                        echo $data['bautizado'] . ', el ' .$data['fechaB'];
                                    }else{
                                        echo $data['bautizado'];
                                    }?> 
                                </p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-bible"></i>
                            </div>
                            <div>
                                <p><span> Bautismo Espiritu Santo? </span></p>
                                <p><?php  echo $data['BES']; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div>
                                <p><span> Fecha de conversión </span></p>
                                <p><?php  echo $data['fconversion']; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-church"></i>
                            </div>
                            <div>
                                <p><span> Iglesia de la cual proviene </span></p>
                                <p><?php  echo $data['iglesia']; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div>
                                <p><span> Estudios </span></p>
                                <p><?php  echo $data['estudios']; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-school"></i>
                            </div>
                            <div>
                                <p><span> Estudios Biblicos </span></p>
                                <p><?php  echo $data['estudiosb']; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-sticky-note"></i>
                            </div>
                            <div>
                                <p><span> Actividades que desarrolla </span></p>
                                <p><?php  echo $data['actividades']; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-search"></i>
                            </div>
                            <div>
                                <p><span> Observaciones </span></p>
                                <p><?php  echo $data['observaciones']; ?></p>
                            </div> 
                    </div>                           
                </div>
            </div>
                
        </section>
    </main>

<?php include_once('includes/templates/footer.php'); ?>