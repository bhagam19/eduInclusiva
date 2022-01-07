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
						<li class="li"><a id="reiniciarBD" href="#" onclick="reinstalarBD()"><img src="../appsArt/bdOnPasiva.png"></a></li>
						<li class="li"><a id="admon" onclick="mostrarSubMenu(\'.submenuAdmon\')"><img src="../appsArt/adminOnPasiva.png"></a></li>                        							
							<ul class="submenuAdmon">
								<li class="li"><a href="?pg=$p01'.crypt($p01,"$2y$10$".$salt).'">Usuarios</a></li>
								<li class="li"><a href="?pg=$p02'.crypt($p02,"$2y$10$".$salt).'">Estudiantes</a></li>
								<li class="li"><a href="?pg=$p03'.crypt($p03,"$2y$10$".$salt).'">Crud Estudiantes</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=discapacidades">Discapacidades</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=ctes">Capacidades y Talentos</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=tacs">Transtornos</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=nivelesReconocimiento">Niveles de Reconocimiento</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=alertas">Alertas</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=identificaciones">Identificaciones</a></li>
							</ul>
						<li class="li"><a id="hogar" onclick="mostrarSubMenu(\'.submenuHogar\')"><img src="../appsArt/familiaOnPasiva.png"></a></li>                        							
							<ul class="submenuHogar">  								
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=madres">Madres</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=padres">padres</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=cuidadores">Cuidadores</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=centrosDEproteccion">Centros de Protección</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=entornoFamiliar">Entorno Familiar</a></li>
							</ul>
						<li class="li"><a id="salud" onclick="mostrarSubMenu(\'.submenuSalud\')"><img src="../appsArt/familiaOnPasiva.png"></a></li>                        							
							<ul class="submenuSalud">  								
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=regimenes">Regimenes</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=eps">EPS</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=frecuencias">Frecuencias</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=diagnosticos">Diagnósticos</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=terapia">Terapias</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=tratamientos">Tratamientos</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=medicamentos">Medicamentos</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=apoyosAbarreras">Apoyos</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=afiliaciones">Afiliaciones</a></li>
							</ul>
						<li class="li"><a id="educativo" onclick="mostrarSubMenu(\'.submenuEducativo\')"><img src="../appsArt/familiaOnPasiva.png"></a></li>                        							
							<ul class="submenuEducativo">  								
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=continentes">Continentes</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=paises">Paises</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=departamentos">Departamentos</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=municipios">Municipios</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=instEducativas">Instituciones Educativas</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=sedes">Sedes</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=jornadas">Jornadas</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=jornadasXsede">Jornadas por Sede</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=grados">Grados</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=gradosXjornada">Grados por Jornada</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=grupos">Grupos</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=gruposXgrado">Grupos por Grado</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=areas">Áreas</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=areasXgrupo">Áreas por Grupo</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=periodos">Periodos</a></li>
								<li class="li"><a href="?pg=$pag'.crypt($pag,"$2y$10$".$salt).'&tabla=periodosXarea">Periodos por Área</a></li>
							</ul>
					</ul>				
				</div>
			';
		}					
	}
?>