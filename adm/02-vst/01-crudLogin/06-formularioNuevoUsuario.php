<div id="separador" style="display:none;"></div>
	<div id="appsFormulario" class="appsFormularioNuevoUsuario"> 	
		<div id="handler">
			<a class="cerrar">X</a>
			<p>REGISTRO DE NUEVO USUARIO</p>
		</div> 
		<div id="mostrarFoto"> 
			<img class="foto" src="../appsArt/usuario.svg">
		</div>   
		<form name="formularioNuevoUsuario">
			<table class="registro-usuario" border=0>
				<tr>
					<td><span>ID: <br></span><input class="input" type="text" name="usuarioCED" id="usuarioCED" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Foto: <br></span><input class="submit upload" type="file" name="foto" id="foto" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>								
				<tr>
					<td><span>Nombres: <br></span><input class="input" type="text" name="nombres" id="nombres" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Apellidos: <br></span><input class="input" type="text" name="apellidos" id="apellidos" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>				
				<tr>
					<td><span>Correo Electrónico: <br></span><input class="input" type="text" name="correo" id="correo" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Usuario: <br></span><input class="input" type="text" name="usuario" id="usuario" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Contraseña: <img id="barraContrasena" style="width:60px" src=""><br></span><input class="input" type="password" name="contrasena" id="contrasena" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Confirmar Contraseña: <br></span><input class="input" type="password" name="confirmarContrasena" id="confirmarContrasena" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>									
				<tr>
					<td><input style="left:30px" type="button" class="submit" value="Enviar" onclick="registrarUsuario(1)"></td>
				</tr>			
			</table>
		</form>
		<div id="contrasenaCheckList">
			<span><img id="check01" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Mínimo 8 caracteres.</span><br>
			<span><img id="check02" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Al menos una mayúscula.</span><br>
			<span><img id="check03" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Al menos una minúscula.</span><br>
			<span><img id="check04" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Al menos un número.</span><br>
			<span><img id="check05" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Al menos un símbolo.</span><br>
		</div>
		
	</div>	
</div>