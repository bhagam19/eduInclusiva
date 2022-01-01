<?php
	//error_reporting(0);
	$respuesta="";
	for ($i=0;$i<count($_SESSION['campos']);$i++){
		$campos[$i]=$_SESSION['campos'][$i];
	}
	$case="esfk";
	include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
	//echo "<br><br>".$consulta1;
	$query2=$query1;
	if ($cont1!=0) {
		$j=0;
		while($fila1=mysqli_fetch_array($query2)){   //$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.
			$fk=$fila1[0];
			$tblRef=$fila1[1];
			$campoRef=$fila1[2];
			include dirname(__FILE__).'../../../01-mdl/cnx.php';
			$clmns=$cnx->query("SHOW COLUMNS FROM ".$tblRef);
			/*echo "<br>";
			echo "<br>";
			//var_dump($clmns);
			echo "<br>";
			echo "<br>";*/
			$todosCampos=array();
			$nomCampoRef;
			$i=0;
			echo "<br><br>".$j.": ".$fk." ".$tblRef." ".$campoRef." "."<br>";
			echo "<br><br>".$j.": llega hasta acáxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
			while($fl=mysqli_fetch_row($clmns)){
				$todosCampos[$i] = "{$fl[0]}\n";
				$i++;
			}
			echo $j.": ".$fk." ".$tblRef." ".$campoRef." ".$todosCampos[1]."<br>";
			$case="innerJoinx2";
			$id=1;
			$t1=$tbl;
			$p11="id";
			$p12=$fk;
			$t2=$tblRef;
			$p21=$campoRef;
			if ($tblRef!="estudiantes" && $tblRef!="usuarios") {
				$clmnSeleccionar=$t2.".".$todosCampos[1];
			}elseif($tblRef=="estudiantes"){
				$clmnSeleccionar=$t2.".".trim($todosCampos[1]).", ".$t2.".".trim($todosCampos[2]).", ".$t2.".".trim($todosCampos[3]).", ".$t2.".".trim($todosCampos[4]);
			}elseif($tblRef=="usuarios"){
				$clmnSeleccionar=$t2.".".trim($todosCampos[6]).", ".$t2.".".trim($todosCampos[7]);
			}
			echo "<br><br>".$clmnSeleccionar;
			include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
			//echo "<br><br>".$consulta1;
			$j++;	
		}
		//echo $consulta1;
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
			include dirname(__FILE__).'../../../01-mdl/cnx.php';
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