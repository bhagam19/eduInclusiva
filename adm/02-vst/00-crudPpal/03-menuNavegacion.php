<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<?php	
	include dirname(__FILE__).'../../../03-cnt/00-crudPpal/03-crudMenu.php';	
	if(!isset($_SESSION['usuario'])){
		//Por ahora en este proyecto, la sesión de usuario visitante no tendrá ningún menú asignado. Ni siquiera se carga en la estructura.
		//Por ahora dejo el siguiente código, por si después se decide asignar algún menú.
		echo'
			<div id="menuNavegacion"> 	
				<ul>
					<li><a href="">Opción 01</a> </li>
					<li><a href="">Opción 02</a></li>
				</ul>				
			</div>
		';
	}else{
		$codigo=$_SESSION['permiso'];
		if($codigo==1){
			//Por ahora en este proyecto, la sesión de usuario nivel 1 no tendrá ningún menú asignado. Ni siquiera se carga en la estructura.
			//Por ahora dejo el siguiente código (para que sirva como guía, por si después se decide asignar algún menú)
			echo 
			'
				<div id="menuNavegacion" class="menuNavegacion" onmouseenter="mostrarMenu()" onmouseleave="ocultarMenu()"> 	
					<ul class="menu" >
						<li class="li"><a id="invBienes" href="?pg=$p01"><img style="width:15px;height:15px" src="../art/inventario.png"></a></li>
						<li class="li"><a id="expExcel" href="?pg=$p23"><img style="width:15px;height:15px" src="../art/exportar.svg"></a></li>
					</ul>				
				</div>
			';
		}elseif($codigo==6){
			echo'
				<div id="menuNavegacion" class="menuNavegacion" onmouseenter="mostrarMenu()" onmouseleave="ocultarMenu()"> 
					<ul class="menu" >						
						<li class="li"><a id="home" href="?pg=$pzz'.crypt($pzz,"$2y$10$".$salt).'"><img src="../appsArt/homeOnPasiva.png"></a></li>
						<li class="li"><a id="verBD" href="?pg=$p00'.crypt($pzz,"$2y$10$".$salt).'"><img src="../appsArt/bdOnPasiva.png"></a></li>
						<li class="li"><a id="admon" onclick="mostrarSubMenu()"><img src="../appsArt/adminOnPasiva.png"></a></li>                        							
							<ul class="submenuAdmon">
								<li class="li"><a href="?pg=$p01'.crypt($p01,"$2y$10$".$salt).'">Usuarios</a></li>
								<li class="li"><a href="?pg=$p02'.crypt($p02,"$2y$10$".$salt).'">Estudiantes</a></li>
								<li class="li"><a href="?pg=$p03'.crypt($p03,"$2y$10$".$salt).'">Crud Estudiantes</a></li>
								<li class="li"><a href="?pg=$p04'.crypt($p04,"$2y$10$".$salt).'">Discapacidades</a></li>
								<li class="li"><a href="?pg=$p05'.crypt($p05,"$2y$10$".$salt).'">Capacidades y Talentos</a></li>
								<li class="li"><a href="?pg=$p06'.crypt($p06,"$2y$10$".$salt).'">Transtornos</a></li>
								<li class="li"><a href="?pg=$p07'.crypt($p07,"$2y$10$".$salt).'">Niveles de Reconocimiento</a></li>
								<li class="li"><a href="?pg=$p08'.crypt($p08,"$2y$10$".$salt).'">Alertas</a></li>
								<li class="li"><a href="?pg=$p09'.crypt($p09,"$2y$10$".$salt).'">Identificaciones</a></li>
							</ul>
						
					</ul>				
				</div>
			';
		}					
	}
?>