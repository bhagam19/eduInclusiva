<?php
  #Parámetros de conexión a la base de datos del aplicativo
  include('dtcnx.php');
  if(!($cnx = new mysqli($host, $user, $password, $dbname, $port, $socket))){
      die ("No se puede conectar a la Base de Datos." .mysqli_connect_error());
      }else{ 
        /*$msj="Conectado a la base de datos ".$dbname." Exitosamente <h2>Bienvenido</h2>";
        echo $msj;
        echo "<br /><br /><br /><p><a href='../index.php'>Inicio</a></p>";*/
      }
?>