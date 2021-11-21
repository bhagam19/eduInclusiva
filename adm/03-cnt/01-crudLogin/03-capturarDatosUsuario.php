<?php
	include dirname(__FILE__).'../../../01-mdl/cnx.php';
	$foto="";
	$nombre="";
	$nombres="";
	$apellidos="";
	$consulta=mysqli_query($cnx,"SELECT * FROM usuarios WHERE usuario='".$_SESSION['usuario']."'");	
	while($fila=mysqli_fetch_array($consulta)){
		$foto=$fila['foto'];
		$nombres=$fila['nombres'];
		$apellidos=$fila['apellidos'];
		$nombre=$fila['nombres']." ".$fila['apellidos'];
		$usuarioCED=$fila['usuarioCED'];
	}
?>