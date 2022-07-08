<?php	
	//$paginaLogs="../bdUsuarios/01-bdUsuarios";//para escribir los Logs
	//$linkLogs="Usuarios";//para escribir los Logs
	//include('../bdLogs/01-bdEscribirLogs.php');
	if(!isset($_SESSION['usuario'])){		
		echo 
			'
            <div id="h2">
                <H2>¡Loguéate y has parte de la educación inclusiva!</H2>
            </div>   			
			';
	}else{		
		$codigo=$_SESSION['permiso'];
		if($codigo==6){
			echo'
				<div id="baseDeDatos">
					<div class="baseDeDatos">
						<div class="tituloBD">Estudiantes Identificados</div>
						<div id="gridFiltros">
							<div class="itemsGrid">Institución:</div> 
                            <div class="itemsGrid">IE Entrerríos</div> 	
                            <div class="itemsGrid">Sede:</div> 
                            <div class="itemsGrid"><select>Seleccione...
                                    <option>Liceo San Luis Beltrán</option>
                                    <option>Escuela Urbana de Entrerríos</option>
                                </select>
                            </div>
                            <div class="itemsGrid">Asignatura:</div> 
                            <div class="itemsGrid"><select>Seleccione...
                                    <option>Lengua Castellana</option>
                                    <option>Inglés</option>
                                    <option>Ética y Valores</option>
                                </select>
                            </div>	
                            <div class="itemsGrid">Grupo:</div> 
                            <div class="itemsGrid"><select>Seleccione...
                                    <option>06-01</option>
                                    <option>06-02</option>
                                    <option>06-03</option>
                                    <option>06-04</option>
                                    <option>06-05</option>
                                </select>
                            </div>				
						</div>	
						<div style="position:absolute;top:290px;!important;" class="contenedorTablar">					
						<table class="tablaBD">
							<thead >
								<tr class="stickyHead1">
									<th class="sticky1" class="encabezadoTablaUsuarios" style="width:80px">No.</th>
									<th class="sticky2" class="encabezadoTablaUsuarios" style="width:200px">Estudiante</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">Fecha Estado</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">Discapacidad</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">Capacidad/Talento</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">Transtorno del Aprendizaje</th>
									<th class="encabezadoTablaUsuarios" style="width:200px">Acción</th>
								</tr>
   								<tr class="stickyHead2">
   									<td class="sticky1" class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'usuarioID\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'usuarioID\',1)"/></td>
									<td class="sticky2" class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'nombres\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'nombres\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'apellidos\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'apellidos\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'foto\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'foto\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'usuarioCED\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'usuarioCED\',1)"/></td>
									<td class="encabezadoTablaUsuarios" style="text-align:center"><img src="../appsArt/ordenarAZOn.png" title="Ordenar A-Z" onclick="ordenarUsuario(\'correo\',0)"/><img class="imgOrden" src="../appsArt/ordenarZAOn.png" onclick="ordenarUsuario(\'correo\',1)"/></td>
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