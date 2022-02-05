<?php

 function conexion(){
    $conexion = new mysqli("192.169.149.44", "weekeat", "sju458", "weekeat");
   
    return $conexion;
}
$db=conexion();
 /**Datos Personales */
 //if(isset($_POST['foto'])){$post['foto'] = $_POST['foto'];}else{$post['foto']='';}
 $post['foto'] = $_FILES;
 if(isset($_POST['dni'])){ $post['dni'] = $_POST['dni'];}else{ $post['dni'] = '';}
 if($_POST['nombre']){$post['nombre'] = $_POST['nombre'];}else{$post['nombre'] = '';}
 if($_POST['apellido']){$post['apellido'] = $_POST['apellido'];}else{$post['apellido'] = '';}
 $post['direccion'] = $_POST['direccion'];
 if($_POST['localidad']){$post['localidad'] = $_POST['localidad'];}else{$post['localidad'] = '';}
 $post['provincia'] = $_POST['provincia'];
 $post['cp'] = $_POST['cp'];
 $post['nacionalidad'] = $_POST['nacionalidad'];
 $post['nacimiento'] = $_POST['nacimiento'];
 $post['sexo'] = $_POST['sexo'];
 if($_POST['estadocivil']){$post['estadocivil'] = $_POST['estadocivil'];}else{$post['estadocivil'] = '';}
 $post['conyuge'] = $_POST['conyuge'];
 if(isset($_POST['conyugeC'])){$post['conyugeC'] = $_POST['conyugeC'];}else{$post['conyugeC'] = '';};
 $post['hijos'] = $_POST['hijos'];
 if($_POST['oficio']){$post['oficio'] = $_POST['oficio'];}else{$post['oficio'] = '';}
 
 /**Datos de Contacto */
 $post['telefono'] = $_POST['telefono'];
 $post['celular'] = $_POST['celular'];
 $post['mail'] = $_POST['mail'];

 /**Informacion Adicional */
 if(isset($_POST['miembro'])){$post['miembro'] = $_POST['miembro'];}else{$post['miembro']='';}
 $post['fechaMiembro'] = $_POST['fechaMiembro'];

 if (isset($_POST['bautizado'])){$post['bautizado'] = $_POST['bautizado'];}else{$post['bautizado'] = '';}
 
 $post['fechaB'] = $_POST['fechaB'];
 if(isset($_POST['BES'])){$post['BES'] = $_POST['BES'];}else{$post['BES']='';};
 $post['fconversion'] = $_POST['fconversion'];
 $post['iglesia'] = $_POST['iglesia'];
 $post['estudios'] = $_POST['estudios'];
 $post['estudiosb'] = $_POST['estudiosb'];
 $post['actividades'] = $_POST['actividades'];
 $post['observaciones'] = $_POST['observaciones'];
 
 $respuesta = array();
     
 $sql = "INSERT INTO miembros (dni, nombre, apellido, direccion, localidad, provincia, cpostal, nacionalidad, fechaNacimiento, sexo, EstadoCivil, conyuge, conyugeCreyente, hijos, oficio, telefono, celular, mail, miembro, Fmiembro, bautizado, FBautismo, BES, fconversion, iglesiaProviene, estudios, estudiosb, actividades, observaciones) ";
 $sql .= " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 
 try {
     $stmt = $db->prepare($sql);
     $stmt->bind_param("isssssissssssisssssssssssssss", $post['dni'], $post['nombre'], $post['apellido'], $post['direccion'], $post['localidad'], $post['provincia'], $post['cp'], $post['nacionalidad'], $post['nacimiento'], $post['sexo'], $post['estadocivil'], $post['conyuge'], $post['conyugeC'], $post['hijos'], $post['oficio'], $post['telefono'], $post['celular'], $post['mail'], $post['miembro'], $post['fechaMiembro'], $post['bautizado'], $post['fechaB'], $post['BES'], $post['fconversion'], $post['iglesia'], $post['estudios'], $post['estudiosb'], $post['actividades'], $post['observaciones']);   
     $stmt->execute();
     $lastId = $db->insert_id;
     
     if($lastId){
         move_uploaded_file($post['foto']['foto']['tmp_name'], 'img' .$lastId.'.jpg');

     $respuesta = array(
                 'codigo' => '200',
                 'descripcion' => 'Registro Ingresado',
                 'lastId' => $lastId );
     }else{
     $respuesta = array(
                 'codigo' => '500',
                 'descripcion' => 'No se pudo grabar registro',
                 'lastId' => '' );
     }
     

     var_dump($db->error);

 } catch (\Throwable $th) {
    $respuesta = array('error' =>$th);
    var_dump($respuesta);
     
 }




?>