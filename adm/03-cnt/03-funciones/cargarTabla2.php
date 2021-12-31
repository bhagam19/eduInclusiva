<?php
	$respuesta="";
	/*****************************************************************************************************************************************
	***************************************************SE LEEN LOS PARÁMETROS ENVIADOS********************************************************
	******************************************************************************************************************************************/
	function isValidJSON($str) {
		json_decode($str);
		return json_last_error() == JSON_ERROR_NONE;
	}
	
	$json_params = file_get_contents("php://input");
	
	if (strlen($json_params) > 0 && isValidJSON($json_params)){
		$decoded_params = json_decode($json_params);
		$tbl = $decoded_params->tbl;
		$flag = $decoded_params->flag;
		$campos = $decoded_params->campos;
	}
	/*for ($i=0;$i<count($campos);$i++){
		$campo = rtrim($campos[$i],'\n');
		$respuesta.= "<br>campos[".$i."] es igual a: ".$campos[$i]."<br>";
	}*/
	$case="esfk";
	include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
	include dirname(__FILE__).'../../../01-mdl/cnx.php';
	if ($cont1!=0) {
		echo "<br><br><br><br>";
		while($fila1=mysqli_fetch_array($query1)){   //$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.
			echo $fila1[0]."<br>";			
		}
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
							<img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarInputUsuario(this.parentNode.id,'.$fila1[trim($campos[$i])].',\'nombres\',\'nombresAct'.$fila1[trim($campos[$i])].'\')">
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