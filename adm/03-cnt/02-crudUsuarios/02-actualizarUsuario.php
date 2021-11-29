<?php
	include dirname(__FILE__).'../../../01-mdl/cnx.php';
	$id=$_REQUEST['id'];
	$valor=$_REQUEST['valor'];
	$campo=$_REQUEST['campo'];	
	$tabla='usuarios ';
	$sql=mysqli_query($cnx,"UPDATE ".$tabla." SET ".$campo."='".$valor."' WHERE usuarioID=".$id);
	mysqli_close($cnx);	
?>