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
        <div class="items">Nuevo:</div>
        <div class="items"><input class="submit upload" type="file" name"foto" id="foto" style="width:120px"></div>
    ';
    $tbl="usuarios";
    $cns=mysqli_query($cnx,"SHOW COLUMNS FROM ".$tbl);
    $campos = array();
    while($fl=mysqli_fetch_row($cns)){
        $campos[] = "{$fl[0]}\n";
    }
    for($i=2;$i<7;$i++){
        $respuesta.="
            <div class='items'><input type='text' title='".$campos[$i]."' name='".$campos[$i]."' id='".$campos[$i]."' onkeyup='cambiarFondoInput(this.id)'></div>
        ";
    }
    $respuesta.="
        <div class='items'><input type='password' name='contrasena' id='contrasena' onkeyup='cambiarFondoInput(this.id)'></div>
        <div class='items'><select name='defUsuario' id='defUsuario' onchange='cambiarFondoInput(this.id)'>
                            <option>Seleccione...</option>
                            <option value=1>SÍ</option>
                            <option value=0>NO</option>
                            </select>        
        </div>
        <div class='items'><select name='permiso' id='permiso' onchange='cambiarFondoInput(this.id)'>
                            <option>Seleccione...</option>
                            <option value=1>Responsable</option>
                            <option value=2>SSO</option>
                            <option value=3>Responsable Inventario</option>
                            <option value=4>Administrador 01</option>
                            <option value=5>Rector</option> 
                            <option value=6>Desarrollador</option>
                            </select>
        </div>
		<div class='items'><img src='../appsArt/okOn.png' title='Guardar' onclick='registrarNuevoUsuario()'/></div>
	";
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
		$respuesta.="
            <div class='items'>".$fila1['usuarioID']."</div>
		";
		if($fila1["foto"]==""){
			$respuesta.="			
                <div class='items' id='foto".$fila1['usuarioID']."'>
                    <div class='fotoImg'>
                        <img style='width:50px;height:50px;!important' title='adm/img/".$fila1['foto']."' src='../appsArt/usuario.svg' onclick='mostrarUploadCrudUsuarios(\"fotoUploader".$fila1['usuarioID']."\")'>
                    </div>
                    <input class='submit uploadUsuario' type='file' name'foto' id='fotoUploader".$fila1['usuarioID']."' style='width:120px;visibility:hidden'>
                </div>               
			";
		}else{
			$respuesta.="
                <div class='items' id='foto".$fila1['usuarioID']."'>
			        <div class='fotoImg'>
                        <img style='width:50px;height:50px;!important' title='".$fila1["foto"]."' src='adm/img/".$fila1['foto']."' onclick='mostrarUploadCrudUsuarios(\"fotoUploader".$fila1['usuarioID']."\")'>
                    </div>
                    <input class='submit uploadUsuario' type='file' name'foto' id='fotoUploader".$fila1['usuarioID']."' style='width:120px;visibility:hidden'>
                </div>
            ";
		}
        for($i=2;$i<10;$i++){
            $respuesta.="
                <div class='items' title='".trim($campos[$i]).$fila1['usuarioID']."' id='".trim($campos[$i]).$fila1['usuarioID']."'>
                    <img style='width:10px;height:10px;!important' title='Click para modificar' src='../appsArt/editarOn.png' onclick='actualizarInputUsuario(this.parentNode.id,".$fila1['usuarioID'].",\"".trim($campos[$i])."\",\"".trim($campos[$i])."Act".$fila1["usuarioID"]."\")'>".$fila1[trim($campos[$i])]."
                </div>
            ";
        }
		$respuesta.="
            <div class='items'><img src='../appsArt/eliminarOn.png' title='Eliminar' onclick='eliminarRegistroUsuario(".$fila1['usuarioID'].")'/></div>            
        ";		
	}	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($cnx);
?>