<?php
  $SERVIDOR = 'localhost';
  $USUARIO = 'root';
  $PASS = '123456';
  $DB = 'ppa';

  $conn = new mysqli($SERVIDOR, $USUARIO, $PASS, $DB);

  if($conn->connect_error){
    echo $conn->connect_error;
  }
 ?>