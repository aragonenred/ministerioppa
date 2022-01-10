<?php include_once('includes/templates/header.php'); ?>   
<?php include_once('includes/templates/sidebar.php'); ?>
<?php include_once('includes/funciones/db.php');?>
<?php
try {
   
    $sql = "SELECT idMiembro, dni, nombre, apellido, direccion, localidad, provincia, cpostal, nacionalidad, fechaNacimiento, sexo, EstadoCivil, conyuge, conyugeCreyente, hijos, oficio, telefono, celular, mail, miembro, Fmiembro, bautizado, FBautismo, BES, fconversion, iglesiaProviene, estudios, estudiosb, actividades, observaciones, foto, foto64 FROM miembros ";
    $sql .= " WHERE idMiembro = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $stmt->bind_result($idmiembro, $dni, $nombre, $apellido, $direccion, $localidad, $provincia, $cp, $nacionalidad, $nacimiento, $sexo, $estadocivil, $conyuge, $conyugeC, $hijos, $oficio, $telefono, $celular, $mail, $miembro, $fechaMiembro, $bautizado, $fechaB, $BES, $fconversion, $iglesia, $estudios, $estudiosb, $actividades, $observaciones, $foto, $foto64);

    
} catch (\Throwable $th) {
    echo $th;
}
while ($stmt->fetch()) {?>
    <main>
        <section class="formulario-detalle">
            
                <div class="encabezado">
                    <h1><?php echo $nombre . ' ' . $apellido; ?></h1>
                    <p><?php echo $direccion . ', ' . $localidad . ', ' . $provincia . ' (cp' . $cp . ')'; ?></p>
                    <div class="foto-contacto">
                        <?php
                        if($foto64){?>
                            <img src= "<?php echo $foto64 ?> "alt="silueta.png">
                            <?php }else{
                                if ($foto){?>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($foto)?>" alt="silueta.png"> 
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
                                <p><?php echo $dni; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-flag"></i>
                            </div>
                            <div>
                                <p><span>Nacionalidad</span></p>
                                <p><?php echo $nacionalidad; ?></p>
                            </div> 
                        </div> 
                        
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div>
                                <p><span>Fecha de Nacimiento</span></p>
                                <p><?php echo $nacimiento; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-venus-mars"></i>
                            </div>
                            <div>
                            <p><span>Sexo </span></p>
                                <p><?php echo $sexo; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-book"></i>
                            </div>
                            <div>
                                <p><span>Estado Civil</span></p>
                                <p><?php 
                                    if (strtolower($estadocivil) == 'casado') {
                                        echo $estadocivil . ' con ' . $conyuge;
                                    }else{
                                        echo $estadocivil;
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
                                <p><?php echo $conyugeC; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-child"></i>
                            </div>
                            <div>
                                <p><span>Hijos</span></p>
                                <p><?php if($hijos >0){echo $hijos;}else{echo 'No tiene';} ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div>
                                <p><span>Oficio</span></p>
                                <p><?php echo $oficio; ?></p>
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
                                <p><?php echo $telefono; ?></p>
                            </div> 
                        </div> 
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div>
                                <p><span>Celular</span></p>
                                <p><?php echo $celular; ?></p>
                            </div> 
                        </div>
                        <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div>
                                <p><span>e-mail</span></p> 
                                <p><?php echo $mail; ?></p>
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
                                    if(strtolower($miembro) == 'si' && $fechaMiembro){
                                        echo $miembro . ', desde ' .$fechaMiembro; 
                                    }else{
                                        echo $miembro;
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
                                    if(strtolower($bautizado) == 'si' && $fechaB){
                                        echo $bautizado . ', el ' .$fechaB;
                                    }else{
                                        echo $bautizado;
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
                                <p><?php  echo $BES; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div>
                                <p><span> Fecha de conversión </span></p>
                                <p><?php  echo $fconversion; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-church"></i>
                            </div>
                            <div>
                                <p><span> Iglesia de la cual proviene </span></p>
                                <p><?php  echo $iglesia; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div>
                                <p><span> Estudios </span></p>
                                <p><?php  echo $estudios; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-school"></i>
                            </div>
                            <div>
                                <p><span> Estudios Biblicos </span></p>
                                <p><?php  echo $estudiosb; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="far fa-sticky-note"></i>
                            </div>
                            <div>
                                <p><span> Actividades que desarrolla </span></p>
                                <p><?php  echo $actividades; ?></p>
                            </div> 
                    </div>
                    <div class="campo-detalle">
                            <div class="icono">
                                <i class="fas fa-search"></i>
                            </div>
                            <div>
                                <p><span> Observaciones </span></p>
                                <p><?php  echo $observaciones; ?></p>
                            </div> 
                    </div>                           
                </div>
            </div>
                
        </section>
    </main>
<?php } /**While */ ?>
<?php include_once('includes/templates/footer.php'); ?>