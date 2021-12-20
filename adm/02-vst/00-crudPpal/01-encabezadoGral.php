<div id="appsEncabezadoGral">
	<div class="appsBtnMenu">
		<img title ="Volver a página principal." src="../../appsArt/atras.svg"  onclick='location.href="../index.php"'>
	</div>
	<div class="appsLogo">
		<img src="../appsArt/DUA.png"/>
	</div>
	<div class="appsTituloCinta">
	   RH+<br>Apps
	</div>
	<div class="appsContenidoCinta">
		<ul>
			<li>EduInclusiva</li>
			<li>Version: 0.0.16</li>
			<li>Creado por: RH+ © 2021</a></li>
		</ul>	
	</div>
	<?php
		if(!isset($_SESSION['usuario'])){
			echo 
				'
					<div class="appsInicioSesionCinta" title="Click para iniciar sesión." onclick="mostrarLogin()">
						Iniciar Sesión
					</div>
				';
		}else{
			include dirname(__FILE__).'../../../01-mdl/cnx.php';	
			include dirname(__FILE__).'../../../03-cnt/01-crudLogin/03-capturarDatosUsuario.php';	
			if($foto==""){
				echo 
					'
					<div id="appsSesionLogedIn">
						<div class="appsSesionImg" >
							<img src="../appsArt/usuario.svg" title="Click para ver información del usuario."  onclick="mostrarDatosUsuario()">
						</div>
					</div>
					';
			}else{
				echo 
					'
					<div id="appsSesionLogedIn">
						<div class="appsSesionImg" >
							<img src="../eduInclusiva/adm/img/'.$foto.'" title="Click para ver información del usuario."  onclick="mostrarDatosUsuario()">
						</div>
					</div>
					';
			}			
			echo '
					
			';
		}
	?>
</div>