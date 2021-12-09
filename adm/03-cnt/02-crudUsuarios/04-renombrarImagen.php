<?php
	include dirname(__FILE__).'../../../01-mdl/cnx.php';
	//Obtener variables.
    $id=$_REQUEST['id'];
	$usuarioCED=$_REQUEST['fotoFinal'];
	$foto=$_REQUEST['fotoInicial'];
    $ext= pathinfo($foto, PATHINFO_EXTENSION);
    rename("../../img/".$foto,"../../img/".$usuarioCED.".".$ext);
    $foto=$usuarioCED.".".$ext;    
	$tabla='usuarios';
	$sql=mysqli_query($cnx,"SELECT * FROM ".$tabla);
	$sql=mysqli_query($cnx,"UPDATE ".$tabla." SET foto='".$foto."' WHERE usuarioID=".$id);
    mysqli_close($cnx);
?>