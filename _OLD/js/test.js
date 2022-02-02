
     document.addEventListener('DOMContentLoaded', function(){

        
        var picker = document.querySelector('#fila');
        var imagen = document.querySelector('#dw');
        imagen.scr = 'imgCod';

        picker.addEventListener('change', function(e) {
            var files = this.files;      
            setURL64(this.files, imagen);
           
        })
    
        function setURL64(archivo, img){
            reader = new FileReader(); 
            reader.onloadend = function(){
              img.setAttribute('src', reader.result);
            }
            reader.readAsDataURL(archivo[0]);           
        }

    


     });


