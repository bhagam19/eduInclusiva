<?php
	$respuesta="";
	for ($i=0;$i<count($_SESSION['campos']);$i++){
		$campos[$i]=$_SESSION['campos'][$i];
	}
	$case="esfk";
	include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
	echo $consulta1;
	if ($cont1!=0) {
		while($fila1=mysqli_fetch_array($query1)){   //$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.
			$fk=$fila1[0];
			$tblRef=$fila1[1];
			$campoRef=$fila1[2];
			$cns=$cnx->query("SHOW COLUMNS FROM ".$tblRef);
			$nomCampoRef= array();
			while($fl=mysqli_fetch_row($cns)){
				$nomCampoRef = "{$fl[0]}\n";
			}
			echo $fk." ".$tblRef." ".$campoRef."<br>";
			$case="innerJoinx2";
			$id=1;
			$t1=$tbl;
			$p11="id";
			$p12=$fk;
			$t2=$tblRef;
			$p21=$campoRef;
			$p22="nombre1";
			include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';		
		}
		echo $consulta1;
		echo "<br><br><br><br>";
	}else{
		if (isset($_REQUEST['campo'])){
			$campo=$_REQUEST['campo'];
			if (isset($_REQUEST['direccion'])){
				$direccion=$_REQUEST['direccion'];			
				switch ($direccion) {
					case 0:
						$sql01=$cnx->query("SELECT * FROM ".$tbl." ORDER BY ".$campo." ASC");
					break;
					case 1:
						$sql01=$cnx->query("SELECT * FROM ".$tbl." ORDER BY ".$campo." DESC");
					break;
				}
			}
		}else{
			$sql01=$cnx->query("SELECT * FROM ".$tbl);
		}
		//$respuesta="";
		$respuesta.='	
			<tr class="stickyHead3">							
				<td class="sticky1">Nuevo:</td>
					';
		for($i=1;$i<count($campos);$i++){
			$respuesta.='
				<td class="sticky'.($i+1).'"><input type="text" name"'.$campos[$i].'" id="'.$campos[$i].'" style="" onkeyup="cambiarFondoInput(this.id)"></td>					
			';
		}
		$respuesta.='
				<td class="img"><img src="../appsArt/okOn.png" title="Guardar" onclick="registrarDiscapacidad()"/></td>
			</tr> 
		';
		while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.
			$respuesta.='
				<tr>
			';
			for($i=0;$i<count($campos);$i++){
				if($i==0){
					$respuesta.='
					<td class="sticky'.($i+1).'" id"">'.$fila1[trim($campos[$i])].'</td>					
					';
				}else{
					$respuesta.='
						<td class="sticky'.($i+1).'" style="text-align:left">
							<img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarInputUsuario(this.parentNode.id,'.$fila1[trim($_SESSION['campos'][$i])].',\'nombres\',\'nombresAct'.$fila1[trim($_SESSION['campos'][$i])].'\')">
							'.$fila1[trim($campos[$i])].'
						</td>				
					';				
				}
			}
			$respuesta.="	
				<td class='img'>
					
					<img src='../appsArt/eliminarOn.png' title='Eliminar' onclick='eliminarRegistros(".$fila1[trim($campos[0])].", \"".trim($tbl)."\", 1, ".json_encode($campos).")'/>
				</td>			
			</tr>
			";		
		}
		mysqli_free_result($sql01);
		echo $respuesta;
		mysqli_close($cnx);
	}
?>