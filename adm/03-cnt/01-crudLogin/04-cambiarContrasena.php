<?php
	session_name("eduInclusiva");
    session_start();
	include dirname(__FILE__).'../../../01-mdl/cnx.php';
	$usuario=$_SESSION['usuario'];
	$actual=$_REQUEST['actual'];
	$nueva=$_REQUEST['nueva'];
	$tabla='usuarios';
	$sql=mysqli_query($cnx,"SELECT * FROM ".$tabla." WHERE usuario='".$usuario."'");
	while($fila=mysqli_fetch_array($sql)){
		$dbHash=$fila['contrasena'];//Traemos la contraseña encriptada desde la BD
		$id=$fila["usuarioID"];		
		if ($actual==$dbHash||crypt($actual,$dbHash) == $dbHash){//Comparamos la contraseña ingresada con la actual sin encriptar o ya encriptada.			
			$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
			$salt = strtr($salt, array('+' => '.')); 
			$hash = crypt($nueva, '$2y$10$' . $salt);//Encriptamos la nueva contraseña			
			$sql2=mysqli_query($cnx,'UPDATE '.$tabla.' SET contrasena="'.$hash.'" WHERE usuarioID='.$id);
		echo "si";			
		}else{
			echo "no";
		}
	}	
	mysqli_close($cnx);//Cerrar Conexion
?>