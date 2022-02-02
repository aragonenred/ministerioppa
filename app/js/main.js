
     document.addEventListener('DOMContentLoaded', function(){

        var response;

/** Inputs: */
        /**Login */
        const boton_login = document.querySelector('#user-login a');
 
       /**Informacion Personal */
        const foto = document.querySelector('#foto-contacto');
        const idmiembro = document.querySelector("#idmiembro");
        const dni = document.querySelector('#dni');
        const nombre = document.querySelector('#nombre');
        const apellido = document.querySelector('#apellido');
        const direccion = document.querySelector('#direccion');
        const localidad = document.querySelector('#localidad');
        const provincia = document.querySelector('#provincia');
        const cp = document.querySelector('#cp');
        const nacionalidad = document.querySelector('#nacionalidad');
        const nacimiento = document.querySelector('#nacimiento');
        const sexo = document.querySelector('#sexo');
        const estadocivil = document.querySelector('#estadocivil');
        const conyuge = document.querySelector('#conyuge');
        const conyugeC_rd1= document.querySelector('#conyugeC-rd1');
        const conyugeC_rd2= document.querySelector('#conyugeC-rd2');
        const hijos = document.querySelector('#hijos');
        const oficio = document.querySelector('#oficio');

        /**Informacion de contacto */
        const telefono = document.querySelector('#telefono');
        const celular = document.querySelector('#celular');
        const mail= document.querySelector('#mail');
       
        /**Informacion adicional */
        
        const miembro_rd1 = document.querySelector('#miembro-rd1');
        const miembro_rd2 = document.querySelector('#miembro-rd2');
        const fechaMiembro = document.querySelector('#fechaMiembro');
        const bautizado_rd1 = document.querySelector('#bautizado-rd1');
        const bautizado_rd2 = document.querySelector('#bautizado-rd2');
        const fechaB = document.querySelector('#fechaB');
        const BES_rd1 = document.querySelector('#BES-rd1');
        const BES_rd2 = document.querySelector('#BES-rd2');
        const fconversion = document.querySelector('#fconversion');
        const iglesia = document.querySelector('#iglesia');
        const estudios = document.querySelector('#estudios');
        const estudiosb = document.querySelector('#estudiosb');
        const actividades = document.querySelector('#actividades');
        const observaciones = document.querySelector('#observaciones');
        
        /**Campos Busqueda  Usuario*/
        const usuario = document.querySelector('#usuario');  

        /**Campos modificar Usuario */
        const pass = document.querySelector('#pass');
        const pass2 = document.querySelector('#pass2');


        //Botones
       const boton_buscar = document.querySelector("#btn-buscar");
       const boton_agregar = document.querySelector("#btn-agregar");
       const boton_modificar = document.querySelector("#btn-modificar");
       const boton_buscar_usr = document.querySelector('#btn-buscar-usr');  
       const boton_modificar_usr = document.querySelector('#btn-modificar-usr');   
       const boton_agregar_usr = document.querySelector('#btn-agregar-usr');
       
      
        /**Menu Usuario*/
        if(boton_login){
            boton_login.addEventListener('click', function(e){
                e.preventDefault();
                var menu = document.querySelector('#menu-usr');
                if(menu.classList.contains('campo-oculto')){
                    menu.classList.remove('campo-oculto'); 
                }else{
                    menu.classList.add('campo-oculto');
                }  
            });        
        }
    

        /** Boton Buscar Miembro*/
        if(boton_buscar){
            boton_buscar.addEventListener('click', function(e) {
            console.log("clik en buscar");
            e.preventDefault();           
            buscarPersonas();   
            });
        }

        /** Boton Agregar Miembro */
        if(boton_agregar){
            boton_agregar.addEventListener('click', function(e) {
                console.log("clik en agregar");
                e.preventDefault();
               if(window.confirm("¿Desea agregar nuevo Miembro?")){;
                agregarPersona();     
               }     
            });
        }
        if(boton_modificar){
            boton_modificar.addEventListener('click', function(e) {
                console.log("clik en actualizar");
                e.preventDefault();
               if(window.confirm("¿Desea actualizar los datos?")){;
                actualizaPersona();     
               }     
            });
        }

        /**Botones de la tabla */
        tabla = document.querySelector('#tabla-buscar tbody');
        if(tabla){
            tabla.addEventListener('click', function(e){
                /**Boton eliminar */
                if(e.target.parentElement.classList.contains('td-borrar')){
                    e.preventDefault();
                    id = e.target.parentElement.getAttribute('data-id');
                    console.log("click en borrar");
                    if(window.confirm("¿Confirma eliminar registro?")){
                        borraPersona(id);
                    }
                    
                }
            });
        }

        /** Boton Buscar Usuario*/
        if(boton_buscar_usr){
            boton_buscar_usr.addEventListener('click', function(e) {
            console.log("clik en buscar usuario");
            e.preventDefault();           
            buscarUsuario();   
            });
        }

        /** Boton Modificar usuario */
        if(boton_modificar_usr){
            boton_modificar_usr.addEventListener('click', function(e){
                e.preventDefault();

                if(window.confirm("¿Guardar los cambios?")){
                    modificarUsuario();
                }
            });
        }
     
        /**Boton Agregar Usuario */
        if(boton_agregar_usr){
            boton_agregar_usr.addEventListener('click', function(e){
                e.preventDefault();
                if(window.confirm("¿Desea agregar nuevo usuario?")){
                    agregarUsuario();
                }
            });
        }


        /** Picker para foto: */
        const photoInput = document.querySelector("#photo-input");
        if(photoInput){
            photoInput.addEventListener('change', function(){

                if(this.files[0].size > 10485760){
                    alert("Selecciona una imagen que se menor a 10MB de tamaño");
                }else{ 
                    setURL64(this.files, foto);  
                }
            });
        }
    
        /**Checkbox Usuarios */
        const ch_reset = document.querySelector('#reset');
        if(ch_reset){
            ch_reset.addEventListener('change', function() {
                if(ch_reset.checked){
                    console.log("seleccionado");
                    campos = document.querySelectorAll('.campo-oculto');
                    for(i=0; i < campos.length; i++){
                        campos[i].classList.remove('campo-oculto');
                    }
                }else{
                    for(i=0; i < campos.length; i++){
                        campos[i].classList.add('campo-oculto');
                    }
                }

            });
        }

/**Funciones */
        function buscarPersonas() {
            //Paso los datos de los inputs a un objeto tipo Form
            const infoPersona = new FormData();
            infoPersona.append('accion', 'get');
            infoPersona.append('dni', dni.value);
            infoPersona.append('nombre', nombre.value);
            infoPersona.append('apellido', apellido.value);
            infoPersona.append('estadocivil', estadocivil.value);
            infoPersona.append('localidad', localidad.value);
            infoPersona.append('oficio', oficio.value);
            if (bautizado_rd1.checked) {
                infoPersona.append('bautizado', bautizado_rd1.value);   
            }else{
                if (bautizado_rd2.checked) {
                    infoPersona.append('bautizado', bautizado_rd2.value);   
                }else{
                    infoPersona.append('bautizado', '');
                }
            }
            
            //Armado del objeto AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'index.php?c=miembros&a=getMiembros', true);
            var resultado;
            xhr.onload = function() {
                if(this.status === 200){

                    tabla = document.querySelector('#tabla-buscar tbody');
                    
                   //Limpiar la tabla
                    elementos = tabla.childElementCount;

                    if(document.querySelector('.rta')){
                        document.querySelector('.rta').remove();
                    }
                    for(i=2; i <= elementos; i++){
                        tabla.childNodes.item(2).remove(); 
                    }
                    //console.log(xhr.responseText);
                    resultado = JSON.parse(xhr.responseText); 
                    
                    if(resultado.personas){
                        for(i=0; i < resultado.personas.length; i++){
                            row = document.createElement('tr');
                            row.innerHTML = '<td style="display:none;">' + resultado.personas[i].idmiembro + '</td> ';
                            row.innerHTML += '<td><span>' + resultado.personas[i].dni + '</span></td> ';
                            row.innerHTML += '<td><span>' + resultado.personas[i].nombre + '</span></td> ';
                            row.innerHTML += '<td><span>' + resultado.personas[i].apellido + '</span></td> ';
                            row.innerHTML += '<td class="titulo-oculto"><span >' + resultado.personas[i].estadocivil + '</span></td> ';
                            row.innerHTML += '<td class="titulo-oculto"><span>' + resultado.personas[i].oficio + '</span></td> ';
                            row.innerHTML += '<td class="titulo-oculto"><span>' + resultado.personas[i].localidad + '</span></td> ';
                            row.innerHTML += '<td class="titulo-oculto"><span>' + resultado.personas[i].bautizado + '</span></td> ';
                            row.innerHTML += '<td class="tb-icono"><a href="index.php?c=miembros&a=detalle&id=' + resultado.personas[i].idmiembro + '" class="td-detalle"> <i class="far fa-eye"></i></a></td> '
                            row.innerHTML += '<td class="tb-icono"><a href="index.php?c=miembros&a=edit&id='+ resultado.personas[i].idmiembro + '" class="td-editar"><i class="far fa-edit"></i></a></td>'
                            row.innerHTML += '<td class="tb-icono"><a href=""  class="td-borrar" data-id="' + resultado.personas[i].idmiembro + '"><i class="far fa-trash-alt"></i></a></td>'
                            
                            tabla.appendChild(row);
                        } 
                    }else{
                        rta = document.createElement('div');
                        rta.classList.add('rta');
                        rta.innerHTML = '<p style="text-align: center;"> No se encontraron resultados </p>';
                        document.querySelector('#resultados').appendChild(rta);
                         
                    }
                }   
            }  
            xhr.send(infoPersona);            
        }

        function agregarPersona() { 
            const infoPersona = new FormData();
            //Informacion Personal
            infoPersona.append('accion','post');
            infoPersona.append('foto', foto.getAttribute('src'));
            infoPersona.append('dni', dni.value);
            infoPersona.append('nombre',nombre.value);
            infoPersona.append('apellido', apellido.value);
            infoPersona.append('direccion', direccion.value);
            infoPersona.append('localidad', localidad.value);
            infoPersona.append('provincia', provincia.value);
            infoPersona.append('cp', cp.value);
            infoPersona.append('nacionalidad', nacionalidad.value);    
            infoPersona.append('nacimiento', nacimiento.value);
            infoPersona.append('sexo', sexo.value);
            infoPersona.append('estadocivil', estadocivil.value);
            infoPersona.append('conyuge', conyuge.value);
            if (conyugeC_rd1.checked) {
                infoPersona.append('conyugeC', conyugeC_rd1.value);   
            }
            if (conyugeC_rd2.checked) {
                infoPersona.append('conyugeC', conyugeC_rd2.value);
            }
            infoPersona.append('hijos', hijos.value);
            infoPersona.append('oficio', oficio.value);
           

            //Datos de Contacto
            infoPersona.append('telefono', telefono.value);
            infoPersona.append('celular', celular.value);
            infoPersona.append('mail', mail.value);
            
            //Informacion Adicional
            if (miembro_rd1.checked) {
                infoPersona.append('miembro', miembro_rd1.value);   
            }
            if (miembro_rd2.checked) {
                infoPersona.append('miembro', miembro_rd2.value);
            }
            infoPersona.append('fechaMiembro', fechaMiembro.value);
            if (bautizado_rd1.checked) {
                infoPersona.append('bautizado', bautizado_rd1.value);   
            }
            if (bautizado_rd2.checked) {
                infoPersona.append('bautizado', bautizado_rd2.value);   
            }
            infoPersona.append('fechaB', fechaB.value);
            if (BES_rd1.checked) {
                infoPersona.append('BES', BES_rd1.value);   
            }
            if (BES_rd2.checked) {
                infoPersona.append('BES', BES_rd2.value);   
            }
            infoPersona.append('fconversion', fconversion.value);
            infoPersona.append('iglesia', iglesia.value);
            infoPersona.append('estudios', estudios.value);
            infoPersona.append('estudiosb', estudiosb.value);
            infoPersona.append('actividades', actividades.value);
            infoPersona.append('observaciones', observaciones.value);
  
            validarCampos();
            validarCamposNumerico();
                        
            if(validarCamposNumerico() && validarCampos()){
                boton_agregar.setAttribute('disabled', 'true');
                const xhr =  new XMLHttpRequest();
                xhr.open('POST','index.php?c=miembros&a=postMiembro', true);
                xhr.onload = function () {
                    if (this.status == 200){
                        console.log(xhr.responseText);
                        $respuesta = JSON.parse(xhr.responseText);
                        mostrarMensaje($respuesta.descripcion, $respuesta.codigo);
                        if($respuesta.codigo == '200'){
                            formulario = document.querySelector('#formulario');
                            //formulario.reset();
                            //foto.setAttribute('src', 'img/silueta.png');
                            setTimeout(() => {
                                location.replace('index.php?c=miembros&a=postMiembro');
                            }, 2000); 

                        }else{
                            boton_agregar.setAttribute('disabled', 'false');
                        }
                        
                        console.log(JSON.parse(xhr.responseText));
                    }
                }
                xhr.send(infoPersona);
                     
            }else{
                alert("Existen campos no válidos");
            }
        }

        function borraPersona(id){
            const infoPersona = new FormData();
            infoPersona.append('id', id);
            infoPersona.append('accion', 'delete');
            console.log("borrar: " + id);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'index.php?c=miembros&a=deleteMiembro', true);
            xhr.onload = function(){

                if(this.status == 200){
                    console.log(xhr.responseText);
                    $respuesta = JSON.parse(xhr.responseText);
                   mostrarMensaje($respuesta.descripcion, $respuesta.codigo);
                   setTimeout(() => {
                        location.replace('index.php');
                    }, 3000); 
                }
            }
            xhr.send(infoPersona);

        }


        function buscarUsuario(){
            const infoUsuario = new FormData();
            infoUsuario.append('accion','get');
            infoUsuario.append('usuario', usuario.value);
            infoUsuario.append('nombre', nombre.value);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'index.php?c=usuarios&a=getUsuarios');
            xhr.onload = function(){
                if(this.status == 200){
                    tabla = document.querySelector('#tabla-buscar tbody');
                    
                   //Limpiar la tabla
                    elementos = tabla.childElementCount;
                    if(document.querySelector('.rta')){
                        document.querySelector('.rta').remove();
                    }
                    for(i=2; i <= elementos; i++){
                        tabla.childNodes.item(2).remove(); 
                    }     
                    resultado = JSON.parse(xhr.responseText); 
                    if(resultado.usuarios){
                        for(i=0; i < resultado.usuarios.length; i++){
                            row = document.createElement('tr');
                            row.innerHTML += '<td><span>' + resultado.usuarios[i].usuario + '</span></td> ';
                            row.innerHTML += '<td><span>' + resultado.usuarios[i].nombre + '</span></td> ';
                            row.innerHTML += '<td class="tb-icono"><a href="index.php?c=usuarios&a=editarUsuario&usuario='+ resultado.usuarios[i].usuario + '" class="td-editar"><i class="far fa-edit"></i></a></td>';
                            row.innerHTML += '<td class="tb-icono"><a href=""  class="td-borrar-usr" data-id="' + resultado.usuarios[i].usuario + '"><i class="far fa-trash-alt"></i></a></td>';
                            tabla.appendChild(row);
                        } 
                    }else{
                        rta = document.createElement('div');
                        rta.classList.add('rta');
                        rta.innerHTML = '<p style="text-align: center;"> No se encontraron resultados </p>';
                        document.querySelector('#resultados').appendChild(rta);
                    }
                }
              }
            xhr.send(infoUsuario);
        }

        function modificarUsuario() {
            const infoUsuario = new FormData();
            infoUsuario.append('accion', 'put');
            infoUsuario.append('usuario', usuario.value);
            infoUsuario.append('nombre', nombre.value);
            if(ch_reset.checked){
                infoUsuario.append('pass', pass.value);
            }   
            boton_modificar_usr.setAttribute('disabled', 'true');     
            const xhr = new XMLHttpRequest();
            xhr.open('POST','index.php?c=usuarios&a=editarUsuario');
            xhr.onload = function(){
                if (this.status == 200){
                    console.log(xhr.responseText);
                    $respuesta = JSON.parse(xhr.responseText);
                    mostrarMensaje($respuesta.descripcion, $respuesta.codigo);
                    console.log($respuesta);
                    if($respuesta.codigo == '200'){
                        setTimeout(() => {
                            location.replace('index.php?c=usuarios&a=index');
                        }, 3000); 

                    }else{
                       boton_modificar_usr.removeAttribute('disabled');
                    }
                }
            }
            xhr.send(infoUsuario);
        }

        
        function agregarUsuario(){
            const infoUsuario = new FormData();
            infoUsuario.append('accion', 'post');
            infoUsuario.append('usuario', usuario.value);
            infoUsuario.append('nombre', nombre.value);
            infoUsuario.append('pass', pass.value);

            boton_agregar_usr.setAttribute('disabled', 'true');

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'index.php?c=usuarios&a=agregarUsuario');
            xhr.onload = function(){
                if(this.status ==200){
                    $respuesta = JSON.parse(xhr.responseText);
                    mostrarMensaje($respuesta.descripcion, $respuesta.codigo);
                    if($respuesta.codigo == '200'){
                        setTimeout(() => {
                            location.replace('index.php?c=usuarios&a=index');
                        }, 3000); 
                    }else{
                        boton_agregar_usr.removeAttribute('disabled');
                    }               
                    console.log(JSON.parse(xhr.responseText));
                }
            }
            xhr.send(infoUsuario);
        }

        
        function mostrarMensaje(mensaje, codigo) {
            const mensajes = document.querySelector("#mensajes");
            mensajes.innerHTML= mensaje;
            mensajes.classList.remove('ocultar-mensajes');
            mensajes.classList.add('mostrar-mensajes');
            
            //para el color de fondo:
            switch (codigo) {
                case '200':
                        mensajes.classList.add('rta-ok')
                    break;
                case '500':
                        mensajes.classList.add('rta-error')
                    break;
            
                default:
                    mensajes.classList.add('rta-ok')
                    break;
            }           
            //Muestra el mensaje
            setTimeout(() => {
                mensajes.classList.add('ocultar-mensajes');
                mensajes.classList.remove('mostrar-mensajes');
            }, 3000);   
            setTimeout(() => {
                mensajes.innerHTML = "";
            }, 3000);  
                    
        }
        
        function setURL64(archivo, img){
            reader = new FileReader(); 
            reader.onloadend = function(){
              img.setAttribute('src', reader.result);
            }
            reader.readAsDataURL(archivo[0]);           
        }

        function validarCampos(){
            var notnull = document.getElementsByClassName("notnull");
            var expresion = new RegExp('^[A-Z-\u00f1\u00d1]+$', 'i');
            var resultado = true;
            for(i=0; i < notnull.length; i++){
                    notnull[i].classList.remove('campo-invalido');
                if(notnull[i].value == null || notnull[i].value.length == 0 || notnull[i].value.trim() == "" || !expresion.test(notnull[i].value)){
                    notnull[i].classList.add('campo-invalido');
                    resultado = false;
                }
            }
            return resultado
        }

        function validarCamposNumerico(){
            var notnull = document.getElementsByClassName("numerico");
            var expresion = new RegExp('^[0-9-\u00f1\u00d1]+$', 'i');
            var resultado = true;
            for(i=0; i < notnull.length; i++){
                notnull[i].classList.remove('campo-invalido');
                if(notnull[i].value == null || notnull[i].value.length == 0 || notnull[i].value.trim() == "" || !expresion.test(notnull[i].value)){
                    notnull[i].classList.add('campo-invalido');
                    console.log('campo numerico invalido');
                    resultado = false;
                }
            }
            return resultado
        }


        function  actualizaPersona() {
            const infoPersona = new FormData();
            //Informacion Personal        
            infoPersona.append('accion','put');
            infoPersona.append('foto',foto.getAttribute('src'));
            infoPersona.append('idmiembro', idmiembro.value);
            infoPersona.append('dni', dni.value);
            infoPersona.append('nombre',nombre.value);
            infoPersona.append('apellido', apellido.value);
            infoPersona.append('direccion', direccion.value);
            infoPersona.append('localidad', localidad.value);
            infoPersona.append('provincia', provincia.value);
            infoPersona.append('cp', cp.value);
            infoPersona.append('nacionalidad', nacionalidad.value);    
            infoPersona.append('nacimiento', nacimiento.value);
            infoPersona.append('sexo', sexo.value);
            infoPersona.append('estadocivil', estadocivil.value);
            infoPersona.append('conyuge', conyuge.value);
            if (conyugeC_rd1.checked) {
                infoPersona.append('conyugeC', conyugeC_rd1.value);   
            }
            if (conyugeC_rd2.checked) {
                infoPersona.append('conyugeC', conyugeC_rd2.value);
            }
            infoPersona.append('hijos', hijos.value);
            infoPersona.append('oficio', oficio.value);
           

            //Datos de Contacto
            infoPersona.append('telefono', telefono.value);
            infoPersona.append('celular', celular.value);
            infoPersona.append('mail', mail.value);
            
            //Informacion Adicional
            if (miembro_rd1.checked) {
                infoPersona.append('miembro', miembro_rd1.value);   
            }
            if (miembro_rd2.checked) {
                infoPersona.append('miembro', miembro_rd2.value);
            }
            infoPersona.append('fechaMiembro', fechaMiembro.value);
            if (bautizado_rd1.checked) {
                infoPersona.append('bautizado', bautizado_rd1.value);   
            }
            if (bautizado_rd2.checked) {
                infoPersona.append('bautizado', bautizado_rd2.value);   
            }
            infoPersona.append('fechaB', fechaB.value);
            if (BES_rd1.checked) {
                infoPersona.append('BES', BES_rd1.value);   
            }
            if (BES_rd2.checked) {
                infoPersona.append('BES', BES_rd2.value);   
            }
            infoPersona.append('fconversion', fconversion.value);
            infoPersona.append('iglesia', iglesia.value);
            infoPersona.append('estudios', estudios.value);
            infoPersona.append('estudiosb', estudiosb.value);
            infoPersona.append('actividades', actividades.value);
            infoPersona.append('observaciones', observaciones.value);
            
            
            const xhr =  new XMLHttpRequest();
            xhr.open('POST','index.php?c=miembros&a=putMiembro', true);
            xhr.onload = function () {
                
                if (this.status == 200){
                    console.log(xhr.responseText);
                    $respuesta = JSON.parse(xhr.responseText);
                    mostrarMensaje($respuesta.descripcion, $respuesta.codigo);
                    setTimeout(() => {
                        location.replace('index.php?c=miembros&a=index');
                    }, 3000); 
                    
                }
            }
            xhr.send(infoPersona);
        }

     });


