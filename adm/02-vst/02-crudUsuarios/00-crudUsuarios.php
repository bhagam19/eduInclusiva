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
			echo'
				<div id="baseDeDatos">
					<div class="baseDeDatos">
						<div class="tituloBD">ADMINISTRACIÓN DE USUARIOS</div>
						<div id="reestablecerTabla">
							    <form enctype="multipart/form-data" action="" method="POST">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                                    <input name="subir_archivo" type="file" />
                                    <input type="submit" value="Carga Rápida / Reestablecer BD" />
                                </form>						
						</div>	
						<div class="contenedorTabla">					
						<table class="tablaBD">
							<thead >
								<tr class="stickyHead1">
									<th class="sticky1" class="encabezadoTablaUsuarios" style="width:80px">ID</th>
									<th class="sticky2" class="encabezadoTablaUsuarios" style="width:200px">NOMBRES</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">APELLIDOS</th>
									<th class="encabezadoTablaUsuarios" style="width:130px">FOTO</th>
									<th class="encabezadoTablaUsuarios" style="width:230px">DOC. IDENTIDAD</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">CORREO</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">USUARIO</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">CONTRASEÑA</th>
									<th class="encabezadoTablaUsuarios" style="width:130px">RESPONSABLE</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">PERMISOS</th>
									<th class="encabezadoTablaUsuarios" style="width:50px"></th>
								</tr>
   								<tr class="stickyHead2">
   									<td class="sticky1" class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'usuarioID\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'usuarioID\',1)"/></td>
									<td class="sticky2" class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'nombres\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'nombres\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'apellidos\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'apellidos\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'foto\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'foto\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'usuarioCED\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'usuarioCED\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'correo\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'correo\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'usuario\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'usuario\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'contrasena\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'contrasena\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'defUsuario\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'defUsuario\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'permiso\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'permiso\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"></td>			
								</tr>   								
   							</thead>
   							<tbody id="actualizable"> 							   
   			';			
			include('adm/03-cnt/02-crudUsuarios/00-cargarUsuarios.php');
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