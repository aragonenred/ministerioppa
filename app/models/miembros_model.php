<?php
    class miembros_model{        
        private $db;
           
        public function __construct(){
            $this->db = Conectar::conexion(); //el :: es para ivocar un metodo estatico sin necesidad de instaciar un objeto de esa clase
        }

        public function getMiembros($post){
            
            try {
                $sql = "SELECT idMiembro, dni, nombre, apellido, direccion, localidad, provincia, cpostal, nacionalidad, fechaNacimiento, sexo, EstadoCivil, conyuge, conyugeCreyente, hijos, oficio, telefono, celular, mail, miembro, Fmiembro, bautizado, FBautismo, BES, fconversion, iglesiaProviene, estudios, estudiosb, actividades, observaciones FROM miembros ";
                $sql .= " WHERE DNI like ? and Nombre like ? and Apellido like ? and EstadoCivil like ? and localidad like ? and oficio like ? and bautizado like ?";
    
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("sssssss", $post['dni'], $post['nombre'], $post['apellido'], $post['estadocivil'], $post['localidad'], $post['oficio'], $post['bautizado']);
                $stmt->execute();
                $stmt->bind_result($idmiembro, $dni, $nombre, $apellido, $direccion, $localidad, $provincia, $cp, $nacionalidad, $nacimiento, $sexo, $estadocivil, $conyuge, $conyugeC, $hijos, $oficio, $telefono, $celular, $mail, $miembro, $fechaMiembro, $bautizado, $fechaB, $BES, $fconversion, $iglesia, $estudios, $estudiosb, $actividades, $observaciones);
                
                while ($stmt->fetch() ) {
                    $datos[] = array(
                                    'idmiembro' => $idmiembro,
                                    'dni' => $dni,
                                    'nombre' => $nombre,
                                    'apellido' => $apellido,
                                    'direccion' => $direccion,
                                    'localidad' => $localidad,
                                    'provincia' => $provincia,
                                    'cp' => $cp,
                                    'nacionalidad' => $nacionalidad,
                                    'nacimiento' => $nacimiento,
                                    'sexo' => $sexo,
                                    'estadocivil' => $estadocivil,
                                    'conyuge' => $conyuge,
                                    'conyugeC' => $conyugeC,
                                    'hijos' => $hijos,
                                    'oficio' => $oficio,
                                    'telefono' => $telefono,
                                    'celular' => $celular,
                                    'mail' => $mail,
                                    'miembro' => $miembro,
                                    'fechaMiembro' => $fechaMiembro,
                                    'bautizado' => $bautizado,
                                    'fechaB' => $fechaB,
                                    'BES' => $BES,
                                    'fconversion' => $fconversion,
                                    'iglesia' => $iglesia,
                                    'estudios' => $estudios,
                                    'estudiosb' => $estudiosb,
                                    'actividades' => $actividades,
                                    'observaciones' => $observaciones
                                    );
                    }
                
                return $datos;
                
            }catch (\Exception $e) {
                //$json['respuesta'] = "Ocurrió un error al realizar la consulta: " . $e;
            }
                       
        }


        public function getMiembro($id){
            try {
   
                $sql = "SELECT idMiembro, dni, nombre, apellido, direccion, localidad, provincia, cpostal, nacionalidad, fechaNacimiento, sexo, EstadoCivil, conyuge, conyugeCreyente, hijos, oficio, telefono, celular, mail, miembro, Fmiembro, bautizado, FBautismo, BES, fconversion, iglesiaProviene, estudios, estudiosb, actividades, observaciones, foto, foto64 FROM miembros ";
                $sql .= " WHERE idMiembro = ?";
            
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($idmiembro, $dni, $nombre, $apellido, $direccion, $localidad, $provincia, $cp, $nacionalidad, $nacimiento, $sexo, $estadocivil, $conyuge, $conyugeC, $hijos, $oficio, $telefono, $celular, $mail, $miembro, $fechaMiembro, $bautizado, $fechaB, $BES, $fconversion, $iglesia, $estudios, $estudiosb, $actividades, $observaciones, $foto, $foto64);
                
                
                while ($stmt->fetch()) {
                    $datos = Array(
                        'idmiembro' =>$idmiembro, 
                        'dni'=>$dni, 
                        'nombre'=>$nombre,
                        'apellido'=> $apellido,
                        'direccion'=> $direccion,
                        'localidad'=> $localidad,
                        'provincia'=> $provincia,
                        'cp'=> $cp,
                        'nacionalidad'=> $nacionalidad,
                        'nacimiento'=> $nacimiento,
                        'sexo'=> $sexo,
                        'estadocivil'=> $estadocivil,
                        'conyuge'=> $conyuge,
                        'conyugeC'=> $conyugeC,
                        'hijos'=> $hijos,
                        'oficio'=> $oficio,
                        'telefono'=>$telefono,
                        'celular'=> $celular,
                        'mail'=> $mail,
                        'miembro'=> $miembro,
                        'fechaMiembro'=> $fechaMiembro,
                        'bautizado'=> $bautizado,
                        'fechaB'=> $fechaB,
                        'BES'=> $BES,
                        'fconversion'=> $fconversion,
                        'iglesia'=> $iglesia,
                        'estudios'=> $estudios,
                        'estudiosb'=> $estudiosb,
                        'actividades'=> $actividades,
                        'observaciones'=> $observaciones,
                        'foto'=> $foto,
                        'foto64'=> $foto64
                    );
                    return $datos;
                }

                
            } catch (\Throwable $th) {
                echo $th;
            }


        }

        public function update($post){
            
            $sql = "UPDATE miembros SET dni = ?, nombre = ? , apellido = ? , direccion = ? , localidad = ? , provincia = ?, cpostal = ?, nacionalidad = ?, fechaNacimiento = ?, sexo = ?, EstadoCivil = ?, conyuge = ?, conyugeCreyente = ?, hijos = ?, oficio = ?, telefono = ?, celular = ?, mail = ?, miembro = ?, Fmiembro = ?, bautizado = ?, FBautismo = ?, BES = ?, fconversion = ?, iglesiaProviene = ?, estudios = ?, estudiosb = ?, actividades = ?, observaciones = ? ";
            $sql .= " WHERE IDMiembro = ?";

            try {
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("isssssissssssisssssssssssssssi", $post['dni'], $post['nombre'], $post['apellido'], $post['direccion'], $post['localidad'], $post['provincia'], $post['cp'], $post['nacionalidad'], $post['nacimiento'], $post['sexo'], $post['estadocivil'], $post['conyuge'], $post['conyugeC'], $post['hijos'], $post['oficio'], $post['telefono'], $post['celular'], $post['mail'], $post['miembro'], $post['fechaMiembro'], $post['bautizado'], $post['fechaB'], $post['BES'], $post['fconversion'], $post['iglesia'], $post['estudios'], $post['estudiosb'], $post['actividades'], $post['observaciones'], $post['idmiembro']);   
            $stmt->execute();

            //Guardar Foto
            $sql = "UPDATE miembros SET Foto64 = ? WHERE IDMiembro =" . $post['idmiembro'] ;
            $stmt = $this->db->prepare($sql);
            $null = NULL;
            $stmt->bind_param("b", $null);
            $stmt->send_long_data(0, $post['foto']);
            $stmt->execute();

            $respuesta = array();
            if ($this->db->affected_rows) {
                $respuesta = array(
                'codigo' => '200',
                'descripcion' => 'Registro Actualizado',
                'affected_rows' => $this->db->affected_rows );
            }else{
                $respuesta = array(
                'codigo' => '500',
                'descripcion' => 'No se pudo actualizar el registro',
                'affected_rows' => $this->db->affected_rows );

            }

            } catch (\Throwable $th) {
                $respuesta = array(
                'codigo' => '500',
                'descripcion' => 'No se pudo actualizar el registro, error en try-catch',
                'descripcion_larga' => $th,
                'affected_rows' => '');
            }
            
            return $respuesta;

        }






    }

?>