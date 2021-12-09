<?php
	session_name("eduInclusiva");
	session_start();
	include('../../01-mdl/cnx.php');		
	//Obtener variables.
	$usuarioCED=$_REQUEST['usuarioCED'];
	$foto=$_REQUEST['foto'];	
	$nombres=$_REQUEST['nombres'];
	$apellidos=$_REQUEST['apellidos'];
	$correo=$_REQUEST['correo'];
	$usuario=$_REQUEST['usuario'];
	$contrasena=$_REQUEST['contrasena'];
	//$defUsuario=$_REQUEST['defUsuario']; // Por ahora, no se hará uso de este dato
	//$permiso=$_REQUEST['permiso']; // Por ahora, no se hará uso de este dato
	$tabla='usuarios';
	$sql=mysqli_query($cnx,"SELECT * FROM ".$tabla);
	$cntUsuario=0;
	$cntCorreo=0;
	$cntUsuarioCED=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['usuario']==$usuario){
			$cntUsuario++;
		}
		if($fila['usuarioCED']==$usuarioCED){
			$cntUsuarioCED++;
		}
		if($fila['correo']==$correo){
			$cntCorreo++;
		}
	}	
	if($cntUsuario==0 && $cntCorreo==0){
		$ext= pathinfo($foto, PATHINFO_EXTENSION);
		rename("../../img/".$foto,"../../img/".$usuarioCED.".".$ext);
		$foto=$usuarioCED.".".$ext;
		//Encriptamos la contraseña
		$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
		$salt = strtr($salt, array('+' => '.')); 
		$contrasenaEncriptada = crypt($contrasena, '$2y$10$' . $salt);	
		mysqli_query($cnx,"INSERT INTO ".$tabla." (foto,usuarioCED,usuario,contrasena,apellidos,nombres,correo,defUsuario,permiso) 
			VALUES ('$foto',$usuarioCED,'$usuario','$contrasenaEncriptada','$apellidos','$nombres','$correo',1,1)");		
		echo "si";
	}elseif($cntUsuario!=0){	
		echo "NoUsuario";
	}elseif($cntUsuarioCED!=0){	
		echo "NoUsuarioCED";
	}elseif($cntCorreo!=0){	
		echo "NoCorreo";
	}
	mysqli_close($cnx);
?>