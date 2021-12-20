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
			$tbl="discapacidades";	
			$cns=$cnx->query("SHOW COLUMNS FROM ".$tbl);
			$campos = array();
			while($fl=mysqli_fetch_row($cns)){
				$campos[] = "{$fl[0]}\n";
			}
			echo'
				<div id="baseDeDatos">
					<div class="baseDeDatos">
						<div class="tituloBD">ADMINISTRACIÓN DE DISCAPACIDADES</div>
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
									<td class="sticky'.($i+1).'" class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\''.$campos[$i].'\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" title="Ordenar Z-A" onclick="ordenarUsuario(\''.$campos[$i].'\',1)"/></td>						
					';
				}
			echo'
   								
   									
									<td class="encabezadoTablaUsuarios" style="text-align:center"></td>			
								</tr>   								
   							</thead>
   							<tbody id="actualizable"> 							   
   			';			
			include('adm/03-cnt/03-funciones/cargarTabla.php');
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