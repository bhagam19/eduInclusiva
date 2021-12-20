<?php
	include('./cnx.php'); //Establecemos la conexión.
	function borrarTabla(){
		global $sql;
		global $cnx;	
		global $tabla;	
        if($cnx->query($sql)){
			echo "<div>===== BORRAR TABLA ".$tabla." =====<br><br></div>";
			echo "<div>Se borró la tabla exitosamente.<br><br></div>";			
		}else{
			echo "<div>===== BORRAR TABLA ".$tabla." =====<br><br></div>";
			echo "<div>No se pudo borrar la tabla. <span>".mysqli_error($cnx)."</span><br><br></div>";		
		}
	}
    $resultado= $cnx->query('SHOW TABLES in '.$dbname);  
    $cnx->query('SET FOREIGN_KEY_CHECKS = 0');
   	$cont=0;   	
   	while($fila=mysqli_fetch_row($resultado)){
        $cnx->query("DROP TABLE {$fila[0]}\n");
   	}
   	mysqli_free_result($resultado);
 //Cerrar
	mysqli_close($cnx);
    header("Location: ../01-mdl/bd.php");
?>