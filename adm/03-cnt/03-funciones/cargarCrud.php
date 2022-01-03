<?php	
	//$paginaLogs="../bdUsuarios/01-bdUsuarios";//para escribir los Logs
	//$linkLogs="Usuarios";//para escribir los Logs
	//include('../bdLogs/01-bdEscribirLogs.php');
	if(!isset($_SESSION['usuario'])){		
		echo 
			'
				Lo siento. No tienes permisos suficientes.<br><br>
				Si crees que deberías poder ingresar a esta opción, ponte en contacto con el administrador.
				<br><br>			
			';
	}else{
		$codigo=$_SESSION['permiso'];
		if($codigo==6){
			$respuesta="";
			$tbl=$_REQUEST['tabla'];	
			$cns=$cnx->query("SHOW COLUMNS FROM ".$tbl);
			global $campos;
			while($fl=mysqli_fetch_row($cns)){
				$campos[] = "{$fl[0]}\n";
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
			}
			echo'
				<div id="baseDeDatos">
					<div class="baseDeDatos">
						<div class="tituloBD">ADMINISTRACIÓN DE '.strtoupper($tbl).'</div>
						<div id="reestablecerTabla">
							    <form enctype="multipart/form-data" action="" method="POST">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                                    <input name="subir_archivo" type="file" />
                                    <input type="submit" value="Carga Rápida / Reestablecer BD" />
                                </form>						
						</div>	
						<div class="contenedorTablar">					
						<table class="tablaBD">
							<thead >
								<tr class="stickyHead1">
				';
/*********************************************************************************************************************************************************************
****************************************************************ACÁ COMIENZA EL TBODY*********************************************************************************
**********************************************************************************************************************************************************************/
			for($i=0;$i<count($campos);$i++){
				echo'
									<th class="sticky'.($i+1).'" class="encabezadoTablaUsuarios" style="">'.$campos[$i].'</th>					
				';
			}
			echo'				
									<th class="" class="encabezadoTablaUsuarios" style="">Acciones</th>
								</tr>
								<tr class="stickyHead2">

				';
				for($i=0;$i<count($campos);$i++){
					echo'
									<td class="sticky'.($i+1).'" class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" 
									onclick="ordenarUsuario(\''.$campos[$i].'\',\'AZ\')"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" title="Ordenar Z-A" 
									onclick="ordenarUsuario(\''.$campos[$i].'\',\'ZA\')"/></td>						
					';
				}
			echo'
									<td class="encabezadoTablaUsuarios" style="text-align:center"></td>			
								</tr>   								
   							</thead>
   							<tbody id="actualizable"> 							   
   			';
/*********************************************************************************************************************************************************************
****************************************************************ACÁ COMIENZA EL TBODY*********************************************************************************
**********************************************************************************************************************************************************************/
			include('adm/03-cnt/03-funciones/cargarTabla1.php');
			echo'				
                            </tbody>	
						</table>
						</div>
					</div>
				</div>
			';
		}
	}
?>