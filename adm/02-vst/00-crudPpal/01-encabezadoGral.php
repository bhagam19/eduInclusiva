<div id="appsEncabezadoGral">
	<div class="appsBtnMenu">
		<img title ="Menú" src="../../appsArt/menu.svg" onclick='alert("Inicia sesión para activar el menú.")'>
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
			<li>Version: 0.0.10</li>
			<li>Creado por: RH+ © 2021</a></li>
		</ul>	
	</div>
	<?php
		if(!isset($_SESSION['usuario'])){
			echo 
				'
					<div class="appsInicioSesionCinta" title="Clicko para iniciar sesión." onclick="mostrarLogin()">
						Iniciar Sesión
					</div>
				';
		}else{
			include dirname(__FILE__).'../../../01-mdl/cnx.php';					
			echo '
					<div id="appsSesionLogedIn">
						<div class="appsSesionImg" >
							<img src="../appsArt/usuario.svg"/ title="Click para ver información del usuario."  onclick="mostrarDatosUsuario()">
						</div>
					</div>
			';
		}
	?>
</div>