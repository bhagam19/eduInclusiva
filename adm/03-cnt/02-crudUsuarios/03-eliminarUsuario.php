<?php
	include dirname(__FILE__).'../../../01-mdl/cnx.php';	
	$usuarioID=$_REQUEST["usuarioID"];
	$tabla="usuarios";	
	mysqli_query($cnx,"DELETE FROM ".$tabla." WHERE usuarioID=".$usuarioID);
	mysqli_close($cnx);
?>