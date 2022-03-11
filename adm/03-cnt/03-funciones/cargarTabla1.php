<?php
	//error_reporting(0);
	$respuesta="";
	$campo;
	$case="todo";
	include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
/*********************************************************************************************************************************************************************
***********************************************  ACÁ COMIENZA EL FORMULARIO PARA EL NUEVO REGISTRO (CREATE)  *********************************************************
**********************************************************************************************************************************************************************/
	$respuesta.='	
		<tr class="stickyHead3">							
			<td class="sticky1">Nuevo:</td>
				';
	for($i=1;$i<count($campos);$i++){
		$respuesta.='
			<td class="sticky'.($i+1).'"><input type="text" name"'.$campos[$i].'" id="'.$campos[$i].'" style="" onkeyup="cambiarFondoInput(this.id)"></td>					
		';
	}
	$respuesta.="
			<td class='img'><img src='../appsArt/okOn.png' title='Guardar' onclick='crearRegistro(\"".trim($tbl)."\", ".json_encode($campos).")'/></td>
		</tr> 
	";
/*********************************************************************************************************************************************************************
****************************************************************  ACÁ COMIENZA EL LISTADO DE REGISTROS  **************************************************************
**********************************************************************************************************************************************************************/
	while($fila1=mysqli_fetch_array($query1)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.
		$respuesta.='
			<tr>
		';
		for($i=0;$i<count($campos);$i++){
			if($i==0){
				$respuesta.='
				<td class="sticky'.($i+1).'" id"">'.$fila1[trim($campos[$i])].'</td>					
				';
			}else{
				$respuesta.="
					<td class='sticky".($i+1)."' style='text-align:left' id='".trim($campos[$i]).$fila1[trim($campos[0])]."'>
						<img style='width:10px;height:10px;!important' title='Click para modificar' src='../appsArt/editarOn.png' onclick='actualizarInputRegistro(this.parentNode.id,".$fila1[trim($campos[0])].",\"".trim($campos[$i])."\",\"".trim($campos[$i])."Act".$fila1[trim($campos[0])]."\",\"".$tbl."\",".json_encode($campos).")'>
						".$fila1[trim($campos[$i])]."
					</td>				
				";				
			}
		}
		$respuesta.="	
			<td class='img'>
				
				<img src='../appsArt/eliminarOn.png' title='Eliminar' onclick='eliminarRegistros(".$fila1[trim($campos[0])].", \"".trim($tbl)."\", ".json_encode($campos).")'/>
			</td>			
		</tr>
		";		
	}
	echo $respuesta;
?>