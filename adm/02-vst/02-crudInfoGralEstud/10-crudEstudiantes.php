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
				<div id="contenedorTabla">
					<div class="tituloTabla">ADMINISTRACIÓN DE ESTUDIANTES</div>
                    <div class="reestablecerTabla">
                            <form enctype="multipart/form-data" action="" method="POST">
                                <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                                <input name="subir_archivo" type="file" />
                                <input type="submit" value="Carga Rápida / Reestablecer BD" />
                            </form>						
                    </div>
            ';
            $encabezados=array('NO.', 'FOTO', 'ID','NOMBRES','APELLIDOS','CORREO','USUARIO','CONTRASEÑA','RESPONSABLE','PERMISOS','ACCIÓN');
            $cnt=count($encabezados);
            for($i=0;$i<$cnt;++$i){
                echo"
                    <div class='encabezadoTabla'>".$encabezados[$i]."</div>
                ";
            }
            include dirname(__FILE__).'../../../01-mdl/cnx.php';
            $tbl="usuarios";
            $cns=mysqli_query($cnx,"SHOW COLUMNS FROM ".$tbl);
            $cnt=0;//Este contador nos establecera cuantos campos hay en la tabla. Será muy útil para escribir los registros.	
            while($fl=mysqli_fetch_row($cns)){
                echo"
                    <div class='encabezadoTabla'>
                        <img src='../appsArt/ordenarAZOn.png' title='Ordenar A-Z' onclick='ordenarUsuario('{$fl[0]}\n',0)'/><img class='imgOrden' src='../appsArt/ordenarZAOn.png' onclick='ordenarUsuario('{$fl[0]}\n/',1)'/>
                    </div>
                ";
                $cnt++;                
            }
            echo'
                    <div class="encabezadoTabla">ACCIÓN</div>
                    <div class="cuerpoTabla" id="actualizable">
            ';			
			include('adm/02-vst/02-crudInfoGralEstud/10-cargarEstudiantes.php');
			echo'				
                    </div>
                </div>
			';
		}
	}
?>