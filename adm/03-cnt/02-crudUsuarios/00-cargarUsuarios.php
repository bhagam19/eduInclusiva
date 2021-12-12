<?php
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moneda	
	$tabla="usuarios";
	@$campo=$_REQUEST['campo'];
	@$direccion=$_REQUEST['direccion'];	
	if($campo){			
		switch ($direccion) {
			case 0:
				$sql01=mysqli_query($cnx,"SELECT * FROM ".$tabla." ORDER BY ".$campo." ASC");
				break;
			case 1:
				$sql01=mysqli_query($cnx,"SELECT * FROM ".$tabla." ORDER BY ".$campo." DESC");
				break;
		}
	}else{
		$sql01=mysqli_query($cnx,"SELECT * FROM ".$tabla);				
	}
	$respuesta="";
	$respuesta.='	
		<tr class="stickyHead3">							
			<td class="sticky1">Nuevo:</td>
			<td class="sticky2"><input type="text" name"nombres" id="nombres" style="width:120px" onkeyup="cambiarFondoInput(this.id)"></td>
			<td><input type="text" name"apellidos" id="apellidos" style="width:120px" onkeyup="cambiarFondoInput(this.id)"></td>
			<td><input class="submit upload" type="file" name"foto" id="foto" style="width:120px"></td>
			<td><input type="text" name"usuarioCEDU" id="usuarioCEDU" style="width:120px" onkeyup="cambiarFondoInput(this.id)"></td>
			<td><input type="text" name"correo" id="correo" style="width:120px" onkeyup="cambiarFondoInput(this.id)"></td>
			<td><input type="text" name"usuario" id="usuario" style="width:120px" onkeyup="cambiarFondoInput(this.id)"></td>
			<td><input type="password" name"contrasena" id="contrasena" style="width:120px" onkeyup="cambiarFondoInput(this.id)"></td>
			<td><select name="defUsuario" id="defUsuario" style="width:100px" onchange="cambiarFondoInput(this.id)">
				<option>Seleccione...</option>
				<option value=1>SÍ</option>
				<option value=0>NO</option> </td>
			<td><select name="permiso" id="permiso" style="width:100px" onchange="cambiarFondoInput(this.id)">
				<option>Seleccione...</option>
				<option value=1>Responsable</option>
				<option value=2>SSO</option>
				<option value=3>Responsable Inventario</option>
				<option value=4>Administrador 01</option>
				<option value=5>Rector</option> 
				<option value=6>Desarrollador</option></td>
			<td class="img"><img src="../appsArt/okOn.png" title="Guardar" onclick="registrarNuevoUsuario()"/></td>
		</tr> 
	';
	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.
		$responsabilidad="";
		$permiso="";
		if($fila1['defUsuario']==1){
			$responsabilidad="SI";
		}else{
			$responsabilidad="NO";
		}
		if($fila1['permiso']==6){
			$permiso="Desarrollador";
		}else if($fila1['permiso']==5){
			$permiso="Rector";
		}else if($fila1['permiso']==4){
			$permiso="Administrador 01";
		}else if($fila1['permiso']==3){
			$permiso="Resp Inventario";
		}else if($fila1['permiso']==2){
			$permiso="Servidor Social";
		}else if($fila1['permiso']==1){
			$permiso="Responsable";
		}else if($fila1['permiso']==0){
			$permiso="Visitante";
		}
		$respuesta.='
            <tr>                
                <td class="sticky1" style="text-align:center">'.$fila1["usuarioID"].'</td>
				<td class="sticky2" style="text-align:left;!important" id="nombres'.$fila1["usuarioID"].'"><img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarInputUsuario(this.parentNode.id,'.$fila1["usuarioID"].',\'nombres\',\'nombresAct'.$fila1["usuarioID"].'\')">'.$fila1["nombres"].'</td>	
                <td style="text-align:left;!important" id="apellidos'.$fila1["usuarioID"].'"><img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarInputUsuario(this.parentNode.id,'.$fila1["usuarioID"].',\'apellidos\',\'apellidosAct'.$fila1["usuarioID"].'\')">'.$fila1["apellidos"].'</td>	
                
		';
		if($fila1["foto"]==""){
			$respuesta.='			
				<td id="foto'.$fila1["usuarioID"].'"><div class="fotoImg" style="z-index:10;!important"><img style="width:50px;height:50px;!important" title="adm/img/'.$fila1["foto"].'" src="../appsArt/usuario.svg" onclick="mostrarUploadCrudUsuarios(\'fotoUploader'.$fila1["usuarioID"].'\')"></div><input class="submit uploadUsuario" type="file" name"foto" id="fotoUploader'.$fila1["usuarioID"].'" style="width:120px;visibility:hidden"></td>                
			';
		}else{
			$respuesta.='
			<td id="foto'.$fila1["usuarioID"].'"><div class="fotoImg" style="z-index:10;!important"><img style="width:50px;height:50px;!important" title="'.$fila1["foto"].'" src="adm/img/'.$fila1["foto"].'" onclick="mostrarUploadCrudUsuarios(\'fotoUploader'.$fila1["usuarioID"].'\')"></div><input class="submit uploadUsuario" type="file" name"foto" id="fotoUploader'.$fila1["usuarioID"].'" style="width:120px;visibility:hidden"></td>	
            ';
		}
		$respuesta.='
                <td style="padding:0px 15px; text-align:left;!important" id="tdUsuarioCED'.$fila1["usuarioID"].'"><img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarInputUsuario(this.parentNode.id,'.$fila1["usuarioID"].',\'usuarioCED\',\'usuarioCEDAct'.$fila1["usuarioID"].'\')">'.$fila1["usuarioCED"].'</td>	
                <td style="text-align:left;!important" id="correo'.$fila1["usuarioID"].'"><img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarInputUsuario(this.parentNode.id,'.$fila1["usuarioID"].',\'correo\',\'correoAct'.$fila1["usuarioID"].'\')">'.$fila1["correo"].'</td>
                <td style="text-align:left;!important" id="usuario'.$fila1["usuarioID"].'"><img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarInputUsuario(this.parentNode.id,'.$fila1["usuarioID"].',\'usuario\',\'usuarioAct'.$fila1["usuarioID"].'\')">'.$fila1["usuario"].'</td>
                <td style="text-align:left;!important" id="constrasena'.$fila1["usuarioID"].'"><img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarInputUsuario(this.parentNode.id,'.$fila1["usuarioID"].',\'contrasena\',\'contrasenaAct'.$fila1["usuarioID"].'\')">'.$fila1["contrasena"].'</td>
                <td style="text-align:center;!important" id="responsabilidad'.$fila1["usuarioID"].'"><img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarSeleccionUsuario(this.parentNode.id,'.$fila1["usuarioID"].',\'defUsuario\',\'responsabilidadAct'.$fila1["usuarioID"].'\','.$fila1['defUsuario'].')">'.$responsabilidad.'</td>	
                <td style="text-align:center;!important" id="permiso'.$fila1["usuarioID"].'"><img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarSeleccionUsuario(this.parentNode.id,'.$fila1["usuarioID"].',\'permiso\',\'permisoAct'.$fila1["usuarioID"].'\','.$fila1['permiso'].')">'.$permiso.'</td>	
                <td class="img"><img src="../appsArt/eliminarOn.png" title="Eliminar" onclick="eliminarRegistroUsuario('.$fila1["usuarioID"].')"/></td>
            </tr>
        ';		
	}	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($cnx);
?>