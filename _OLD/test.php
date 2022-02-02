<?php
    try {
        include_once('includes/funciones/db.php');
   
        $sql = "INSERT INTO miembros (Foto64) VALUES (?)";
        $id = '73';
       // $resultado =$conn->query($sql);
    
        $foto = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAAA6CAIAAACLRxgTAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAH3SURBVGhD7ZixUsQgEEBTWlpa+gl+wpWWlna2lv6BleMnWNraWVr6CX6GvadJ7nIjbsLewsVJwpIlMDe82cYdgTwC3JJCHQVZIyWyRkpkjZTIGimRNVIia6SEnEbzpr7P29g+Y2ZB5DTWZ+qr6OIEMwsip4EOXSxObA1YgbAO7bZeyzKeht5LdisT7GUZQKO+xcw4gw5dMAmg4Uj9aJr8DybxNABYPNSqF0wkNJoXVd34PMHQC3FclhYSGpuHg4eIgdCoNK/8iRQhzuSJkzVSImukRNYIyu5dlSv3UjdJjd9PU6e44fB/dDvdPGEmNPAbqh1+LjAzhYOGXVHX95gMB0wWDde8YnIKB41eAQd/BoXu9OUlZhxwXHxV2ymaBPti0LsPwqDOOGoAlTVAGMy3lUJV15h0g/NMNEYgqP/WgfEqAJbG/hDcfWBGFtLgw2kDk6SHKa8wI4h9QPHhtIGXMGOkCWhjMHeFhvlAtK7Ej13dLQRzV2iYGvXdfjzpY9do+MBtZh27grUJlIDUrRf8ZrSuIERqE3tzQ3jBb9arTeYcvtAWVun61PTm+2HFzx5qk5UZmwJKiZEbwti35y68NrfG8yUeHL4iMe8Dl68GQLcC74DfCugELnqzmaHRo7dnhmLerA8hpxGVrJESWSMlskZKHIWGUn9lE4xSM4VqEgAAAABJRU5ErkJggg==';

        $stmt = $conn->prepare($sql);
        $null = NULL;
        if($stmt){
            $stmt->bind_param("b", $null);
        }else{
            echo "error en conn";
        }
        
        $stmt->send_long_data(0, $foto);
        $ultimoId = $stmt->insert_id();
        $stmt->execute();
        
        echo "el ultimo es" . $ultimoId;

        /*$stmt->bind_result($id2, $foto, $foto64);
      

        while ($stmt->fetch()) {
            
            
            if($foto64){
                echo "foto64";
                echo '<img id="foto1" src="' . $foto64 . '"/>';

            }else{
                 if ($foto){
                     echo "foto normal";
                    echo '<img id="foto1" src="data:image/jpeg;base64,'. base64_encode($foto) .' "/>';
                 }else{
                     echo "no hay";
                 }
            }
            

            

            echo '<img src="data:image/jpeg;base64,'. base64_decode($foto2) .' "/>';
        }

      */

       //echo '<img src="data:image/jpeg;base64,'.base64_encode($foto['foto']) .' "/>';
        
    
    } catch (\Throwable $th) {
        echo $th;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<img id="dw" src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAAA6CAIAAACLRxgTAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAH3SURBVGhD7ZixUsQgEEBTWlpa+gl+wpWWlna2lv6BleMnWNraWVr6CX6GvadJ7nIjbsLewsVJwpIlMDe82cYdgTwC3JJCHQVZIyWyRkpkjZTIGimRNVIia6SEnEbzpr7P29g+Y2ZB5DTWZ+qr6OIEMwsip4EOXSxObA1YgbAO7bZeyzKeht5LdisT7GUZQKO+xcw4gw5dMAmg4Uj9aJr8DybxNABYPNSqF0wkNJoXVd34PMHQC3FclhYSGpuHg4eIgdCoNK/8iRQhzuSJkzVSImukRNYIyu5dlSv3UjdJjd9PU6e44fB/dDvdPGEmNPAbqh1+LjAzhYOGXVHX95gMB0wWDde8YnIKB41eAQd/BoXu9OUlZhxwXHxV2ymaBPti0LsPwqDOOGoAlTVAGMy3lUJV15h0g/NMNEYgqP/WgfEqAJbG/hDcfWBGFtLgw2kDk6SHKa8wI4h9QPHhtIGXMGOkCWhjMHeFhvlAtK7Ej13dLQRzV2iYGvXdfjzpY9do+MBtZh27grUJlIDUrRf8ZrSuIERqE3tzQ3jBb9arTeYcvtAWVun61PTm+2HFzx5qk5UZmwJKiZEbwti35y68NrfG8yUeHL4iMe8Dl68GQLcC74DfCugELnqzmaHRo7dnhmLerA8hpxGVrJESWSMlskZKHIWGUn9lE4xSM4VqEgAAAABJRU5ErkJggg==' alt="">
<form action="#" method="get" target="_blank">

  <input id="fila" type="file">
  <input id="btn" type="button" value="">

</form>

<script src="js/test.js"></script>
</body>
</html>