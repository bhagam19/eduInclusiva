<?php	
	//$paginaLogs="../bdUsuarios/01-bdUsuarios";//para escribir los Logs
	//$linkLogs="Usuarios";//para escribir los Logs
	//include('../bdLogs/01-bdEscribirLogs.php');
	function esFK($campoAVerificar,$c){
        global $camposFK;
        global $contenidosFK;
        global $flq1;
        global $campos;
        $check="";
        $checkj=-1;
        for ($jfk=0;$jfk<count($camposFK);$jfk++) {            
            if ($campoAVerificar==$camposFK[$jfk]) {
                $check="isFK";
                $checkj=$jfk;
            }      
        };        
        if($check=="isFK"){
            $contenidoDelCampo= $contenidosFK[$checkj];
        }else{
            $contenidoDelCampo=$flq1[trim($campos[$c])];
        } 
		return $contenidoDelCampo;   
    } 
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
			global $campos;			
			$case="columnas";			
			include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
			while($fl=mysqli_fetch_row($query1)){
				$campos[] = $fl[0];
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
						<div class="contenedorTabla">					
						<table class="tablaBD">
							<thead >
								<tr class="stickyHead1">
				';
/*********************************************************************************************************************************************************************
****************************************************************ACÁ COMIENZA EL ENCABEZADO*********************************************************************************
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
					echo"
									<td class='sticky".($i+1)."' class='encabezadoTablaUsuarios' style='text-align:center'><img src='../appsArt/ordenarAZOn.png' title='Ordenar A-Z' 
									onclick='ordenarRegistros(\"".$tbl."\",".json_encode($campos).", \"".$campos[$i]."\", \"ASC\")'/><img class='imgOrden' src='../appsArt/ordenarZAOn.png' title='Ordenar Z-A' 
									onclick='ordenarRegistros(\"".$tbl."\",".json_encode($campos).", \"".$campos[$i]."\", \"DESC\")'/></td>						
					";
				}
			echo'
									<td class="encabezadoTablaUsuarios" style="text-align:center"></td>			
								</tr>   								
   							</thead>
   							<tbody id="actualizable"> 							   
   			';
/*********************************************************************************************************************************************************************
****************************************************************  ACÁ COMIENZA EL TBODY (ACTUALIZABLE)  **************************************************************
**********************************************************************************************************************************************************************/
				$case="esfk";
				include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
				//echo "<br><br>".$consulta1;
				$query2=$query1;
				if ($cont1!=0) {
					//cargarTablaFK1.php
					include('adm/03-cnt/03-funciones/cargarTablaFK1.php');
				}else{
					//cargarTablaSencilla1.php
					include('adm/03-cnt/03-funciones/cargarTabla1.php');
				}			
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