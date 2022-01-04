<?php
	session_name("eduInclusiva");
    session_start();
	if(!isset($_SESSION['usuario'])){//Usuario visitante (sin privilegios. No puede acceder a las Apps) 
		echo ' 
			Lo siento. No tienes permisos suficientes.<br><br>
			Si crees que deberías poder ingresar a esta opción, ponte en contacto con el administrador.
			<br><br>			
		';
	}else{
		$codigo=$_SESSION['permiso'];
		if ($codigo==1) {//Usuario con resp [sug. add, sug. mod, sug. del], bienes propios unic. No admin. (Doc, Aux no conf.). Puede acceder a las Apps			
		echo ' 
			Lo siento. No tienes permisos suficientes.<br><br>
			Si crees que deberías poder ingresar a esta opción, ponte en contacto con el administrador.
			<br><br>			
		';
		}elseif($codigo==2){//User no resp de bienes. Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (SSO)
		}elseif($codigo==3){//User resp de bienes y Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (Docente apoyo inventario)
		}elseif($codigo==4){//User resp de bienes y Admin avdc. [add, mod, del], todos los bienes.(Coord., Secret., Aux. de Confianza)
		}elseif($codigo==5){//Usuario SuperAdministrador Frontend (Rector)	
		}elseif($codigo==6){//Usuario SuperAdministrador Frontend y Backend (Desarrollador) 
			include dirname(__FILE__).'/cnx.php'; //Establecemos la conexión.
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
			//header("Location: bd.php");
			echo "
				<html>
					<head>
						<meta HTTP-equiv='REFRESH' content='0;url=./bd.php'>
					</head>
				</html>
			"; 
		}
	}
?>
