<?php
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moneda
	@$campo=$_REQUEST['campo'];
	@$direccion=$_REQUEST['direccion'];	
	if($campo){			
		switch ($direccion) {
			case 0:
				$sql01=$cnx->query("SELECT * FROM ".$tbl." ORDER BY ".$campo." ASC");
				break;
			case 1:
				$sql01=$cnx->query("SELECT * FROM ".$tbl." ORDER BY ".$campo." DESC");
				break;
		}
	}else{
		$sql01=$cnx->query("SELECT * FROM ".$tbl);				
	}
	$respuesta="";
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
		$respuesta.='	
			<td class="img">
				<img src="../appsArt/eliminarOn.png" title="Eliminar" onclick="eliminarRegistroDiscapacidades('.$fila1[trim($campos[0])].')"/>
			</td>			
           </tr>
        ';		
	}	
	mysqli_free_result($sql01);
	echo $respuesta;
	mysqli_close($cnx);
?>