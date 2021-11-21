<?php
	include dirname(__FILE__).'../../../01-mdl/cnx.php';
	include dirname(__FILE__).'../../../03-cnt/01-crudLogin/03-capturarDatosUsuario.php';
	
?>

<div id="appsFormulario" class="appsFormularioDatosUsuario">
	<div id="">
		<div class="sesionImgInside" title="Click para cambiar foto." onclick="">
			<?php 
				if($foto==""){
					echo '<img src="../appsArt/usuario.svg"/>';
				}else{
					echo '<img src="../eduInclusiva/adm/img/'.$foto.'"/>';
				}			
			?>			
		</div>		
		<div class="datosPersonales">
			<table class="" border=0>						
				<tr>
					<td><span class="etiqueta">Nombres: <br></span></td>
					<td><span class="datos"><?php echo $nombres ?></span></td>
				</tr>
				<tr>
					<td><span class="etiqueta">Apellidos: <br></span></td>
					<td><span class="datos"><?php echo $apellidos ?></span></td>
				</tr>
				<tr>
					<td><span class="etiqueta">ID: <br></span></td>
					<td><span class="datos"><?php echo $usuarioCED ?></span></td>
				</tr>
				<tr>				
			</table> 
		</div>
		<div class="datosPersonales" style="cursor:pointer" title="Click para mostrar y ocultar." onclick="mostrarCambiarContrasena()">
			<span class="etiqueta">Cambiar Contraseña</span></td>
		</div>	
		<div class="btn" title="Click para cerrar sesión." onclick="location.href='adm/03-cnt/01-crudLogin/02-cerrarSesion.php'">
			Cerrar Sesión 
		</div>
	</div> 
	<script type="text/javascript">document.getElementById("usuarioLogin").focus();</script>
</div>
