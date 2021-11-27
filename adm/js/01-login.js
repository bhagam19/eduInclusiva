//Scripts para el login
function mostrarLogin(){
	if( $('.appsFormularioLogin').css('visibility') !== 'hidden' ) {
	    $('.appsFormularioLogin').css('visibility', 'hidden');	    
	  } else {
	    $('.appsFormularioLogin').css('visibility', 'visible');	    
	  }	
}
function validarLogin(usuario,contrasena){
	var xmlhttp = new XMLHttpRequest();        
        xmlhttp.open("GET", "adm/03-cnt/01-crudLogin/01-login.php?usuario="+usuario+"&contrasena="+contrasena, false);
        xmlhttp.send();
        //alert(xmlhttp.responseText.trim());        
        if("si" === xmlhttp.responseText.trim()){
        	return true;
        }else if(xmlhttp.responseText.trim()==="cambiar"){
        	alert("Recuerde cambiar la contraseña asignada por el administrador. Es poco segura.");
        	return true;
    	}else{        	
        	alert("El usuario y la contraseña no coinciden.");
        	document.getElementById("usuarioLogin").value=usuario;
        	document.getElementById("contrasenaLogin").value="";
        	document.getElementById("contrasenaLogin").focus();
        	return false;
        }
}
//Scripts para el registro de nuevo usuario.
function cambiarFondoInput(id){//Esta función reestablece el color del fondo de un input después de haberse puesto rojo como validación de dato fatante o equivocado.	
	//alert(id);
	document.getElementById(id).style.boxShadow="0 1px 10px #abe2f8 inset, 0 0 8px #0076fc";
	if(id=="nombres"||id=="apellidos"){
		var valor=document.getElementById(id).value;
		valor=ucwords(valor.toLowerCase());	
		document.getElementById(id).value = valor;//escribimos la palabra con la primera letra mayuscula
	}
	if(id=="correo"||id=="usuario"){
		var valor=document.getElementById(id).value;
		valor=valor.toLowerCase();
		document.getElementById(id).value = valor;//escribimos el correo en minúsculas
	}
	if(id=="contrasena"){
		document.getElementById("contrasenaCheckList").style.visibility="visible";
		validarContrasenaSegura(id);
	}
	if(id=="nuevaContrasena"){//Este ID pertenece al formulario Nueva Contraseña de la sesión de usuario logueado.
		document.getElementById("contrasenaCheckList").style.visibility="visible";
		validarContrasenaSegura(id);
	}
}
function validarContrasenaSegura(id){
	var input=document.getElementById(id);
	var contrasena=input.value;
	//alert(contrasena);
	var cnt=0;
	var cantidad01=false;
	var cantidad02=false;
	var mayuscula=false;
	var minuscula=false;
	var numero=false;
	var simbolo=false;
	var checklist="";	
	if(contrasena.length>=5){
		cantidad01=true;
	}
	if(contrasena.length>=8){
		cantidad02=true;
	}
	for(var i=0;i<contrasena.length;i++){
		if(contrasena.charCodeAt(i)>=65&&contrasena.charCodeAt(i)<=90){
			mayuscula=true;
		}else if(contrasena.charCodeAt(i)>=97&&contrasena.charCodeAt(i)<=122){
			minuscula=true;
		}else if(contrasena.charCodeAt(i)>=48&&contrasena.charCodeAt(i)<=57){
			numero=true;
		}else{
			simbolo=true;
		}
	}	
	if(cantidad01==true){
		cnt=cnt+1;
	}
	if(cantidad02==true){
		cnt=cnt+1;
		document.getElementById('check01').src ="../appsArt/bien.png";		
	}else{
		document.getElementById('check01').src ="../appsArt/mal.png";
	}
	if(mayuscula==true){	
		cnt=cnt+1;		
		document.getElementById('check02').src ="../appsArt/bien.png";	
	}else{
		document.getElementById('check02').src ="../appsArt/mal.png";
	}
	if(minuscula==true){
		cnt=cnt+1;		
		document.getElementById('check03').src ="../appsArt/bien.png";		
	}else{
		document.getElementById('check03').src ="../appsArt/mal.png";
	}
	if(numero==true){	
		cnt=cnt+1;		
		document.getElementById('check04').src ="../appsArt/bien.png";		
	}else{
		document.getElementById('check04').src ="../appsArt/mal.png";
	}
	if(simbolo==true){
		cnt=cnt+1;		
		document.getElementById('check05').src ="../appsArt/bien.png";		
	}else{
		document.getElementById('check05').src ="../appsArt/mal.png";
	}	
	switch (cnt) {			
		case 1:
			//alert(cnt);
			document.getElementById('barraContrasena').src ="../appsArt/contrasena00.png";
			document.getElementById(id).style.boxShadow="0 1px 10px #ff6105 inset, 0 0 8px #0076fc";
			break;
		case 2:
			//alert(cnt);
			document.getElementById('barraContrasena').src ="../appsArt/contrasena01.png";
			document.getElementById(id).style.boxShadow="0 1px 10px #ff8a05 inset, 0 0 8px #0076fc";
			break;
		case 3:
			//alert(cnt);
			document.getElementById('barraContrasena').src ="../appsArt/contrasena02.png";
			document.getElementById(id).style.boxShadow="0 1px 10px #e6ff07 inset, 0 0 8px #0076fc";
			break;
		case 4:
			//alert(cnt);
			document.getElementById('barraContrasena').src ="../appsArt/contrasena03.png";
			document.getElementById(id).style.boxShadow="0 1px 10px #8bff07 inset, 0 0 8px #0076fc";
			break;
		case 5:
			//alert(cnt);
			document.getElementById('barraContrasena').src ="../appsArt/contrasena04.png";
			document.getElementById(id).style.boxShadow="0 1px 10px #02aa64 inset, 0 0 8px #0076fc";
			break;
		case 6:
			//alert(cnt);
			document.getElementById('barraContrasena').src ="../appsArt/contrasena05.png";
			document.getElementById(id).style.boxShadow="0 1px 10px #02aa64 inset, 0 0 8px #0076fc";
			break;	
		default:
			document.getElementById('barraContrasena').src ="";					
	}	
	if(cnt==6){
		return true;
	}else{		
		return false;
	}
}
function mostrarUpload(){
	document.getElementById("uploadInvisible").style.visibility="visible";
}
$(document).ready(function() {
    $(".upload").on('change', function() {		
		var usuarioCED = document.getElementById("usuarioCED").value;
		if(usuarioCED=""){
			alert("Por favor, ingrese su número de identificación.");
		}else{
			var formData = new FormData();
			var files = $('#foto')[0].files[0];
			formData.append('file',files);
			$.ajax({		
				url: 'adm/03-cnt/01-crudLogin/03.1-subirImagen.php',
				type: 'post',
				data: formData,
				contentType: false,
				processData: false,
				success: function(response){			
					if(response !=0){	
						var name =response.substr(10,response.length);	
						$(".foto").attr("src", response, "width","80px","height","80px","border-radius","30px");
							
					}else{
						alert('Formato de imagen incorrecto.');
					}
				}
			});
			return false;
		}
    });
	$("#uploadInvisible").on('change', function() {		
		var usuarioCED = document.getElementById("usuarioCED").value;
		alert(usuarioCED);
		if(usuarioCED=""){
			alert("Por favor, ingrese su número de identificación.");
		}else{
			var formData = new FormData();
			var files = $('#foto')[0].files[0];
			formData.append('file',files);
			$.ajax({		
				url: 'adm/03-cnt/01-crudLogin/03.1-subirImagen.php',
				type: 'post',
				data: formData,
				contentType: false,
				processData: false,
				success: function(response){			
					if(response !=0){	
						var name =response.substr(10,response.length);	
						$(".foto").attr("src", response, "width","80px","height","80px","border-radius","30px");
							
					}else{
						alert('Formato de imagen incorrecto.');
					}
				}
			});
			return false;
		}
    });
});
function registrarUsuario(id){ //id=0 representa que no hay formulario que ocultar. (e.g. formularioNuevoUsuario.php)
	//alert("Registro de usuario nuevo");
	//valor=ucwords(valor.toLowerCase());
	
	var usuarioCED= document.getElementById("usuarioCED").value;
	var foto =$("#foto").val().substr(12,$("#foto").val().length);
	var nombres= document.getElementById("nombres").value;
	var apellidos= document.getElementById("apellidos").value;
	var correo= document.getElementById("correo").value;
	var usuario= document.getElementById("usuario").value;
	var contrasena= document.getElementById("contrasena").value;
	var confirmarContrasena=document.getElementById("confirmarContrasena").value;
	if(usuarioCED===""){
		alert("Por favor, ingrese número de identidad.");
		document.getElementById("usuarioCED").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("usuarioCED").focus();
		return false;		
	}else if(nombres===""){
		alert("Por favor, ingrese el nombre.");
		document.getElementById("nombres").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("nombres").focus();
		return false;
	}else if(apellidos===""){
		alert("Por favor, ingrese los apellidos.");
		document.getElementById("apellidos").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("apellidos").focus();
		return false;
	}else if(correo===""){
		alert("Por favor, ingrese un correo.");
		document.getElementById("correo").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("correo").focus();
		return false;
	}else if(usuario===""){
		alert("Por favor, ingrese un usuario.");
		document.getElementById("usuario").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("usuario").focus();
		return false;
	}else if(confirmarContrasena===""){
		alert("Por favor, confirme la Contraseña.");
		document.getElementById("contrasena").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("contrasena").focus();
		return false;
	}else{
		if(correo!==""){
			re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(!re.exec(correo)){
				alert("Por favor, revise que el correo esté bien escrito (p.e micorreo@dominio.com) ");
				document.getElementById("correo").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
				document.getElementById("correo").focus();
				return false;			
			}	
		}
		if(validarContrasenaSegura("contrasena")){
			if(contrasena===confirmarContrasena){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", "adm/03-cnt/02-crudUsuarios/crearUsuario.php?usuarioCED="+usuarioCED+"&foto="+foto+"&nombres="+nombres+"&apellidos="+apellidos+"&correo="+correo+"&usuario="+usuario+"&contrasena="+contrasena, false);
				xmlhttp.send();
				if(xmlhttp.responseText.trim()==="si"){
					if(id===1){
						var elemento=$("#handler").parent();		
						elemento.animate({'top':'-500px'},500,function(){
							$('#separador').fadeOut('fast');
						});
						alert("Te damos una cordial bienvenida, "+usuario);
						validarLogin(usuario,contrasena);
						window.location.href="index.php";						
						return true;
					}else{
						return true;
					}
				}else{
					if(xmlhttp.responseText.trim()==="NoUsuario"){
						//alert(xmlhttp.responseText.trim());
						alert("Ya existe un usuario "+usuario+". Intenta con otro.");
						document.getElementById("usuario").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
						document.getElementById("usuario").value="";
						document.getElementById("usuario").focus();
						return false;
					}else if(xmlhttp.responseText.trim()==="NoUsuarioCED"){
						//alert(xmlhttp.responseText.trim());
						alert("Ya existe un registro con el número de identificación "+usuarioCED+".");
						document.getElementById("usuarioCED").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
						document.getElementById("usuarioCED").value="";
						document.getElementById("usuarioCED").focus();
						return false;
					}else if(xmlhttp.responseText.trim()==="NoCorreo"){
						//alert(xmlhttp.responseText.trim());
						alert("Ya hay registrado un correo "+correo+". Intenta con otro.");
						document.getElementById("correo").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
						document.getElementById("correo").value="";
						document.getElementById("correo").focus();
						return false;
					}				
				}
			}else{
				alert("Las contraseñas no coinciden. Vuelve a ingresarlas.");
				document.getElementById("contrasena").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
				document.getElementById("contrasena").focus();
				return false;
			}
		}else{
			alert("La contraseña no es lo suficientemente segura.");
			document.getElementById("contrasena").focus();
		}
	}
	
}
//Scripts para usuario logueado.
function mostrarDatosUsuario(){
	//alert("Hola");
	if( $('.appsFormularioDatosUsuario').css('visibility') !== 'hidden' ) {
	    $('.appsFormularioDatosUsuario').css('visibility', 'hidden');
	    if( $('.appsFormularioDatosUsuario').css('visibility') !== 'hidden' ) {
		    $('.appsFormularioDatosUsuario').css('visibility', 'hidden');
		}
	  } else {	  	
	    $('.appsFormularioDatosUsuario').css('visibility', 'visible');
	    $('.appsFormularioDatosUsuario').fadeIn('fast');	
	  }
}
function mostrarCambiarContrasena(){
	if( $('.appsFormularioNuevaContrasena').css('visibility') !== 'hidden' ) {
	    $('.appsFormularioNuevaContrasena').css('visibility', 'hidden');
	  } else {	  	
	    $('.appsFormularioNuevaContrasena').css('visibility', 'visible');
	  }
}
function validarNuevaContrasena(actual,nueva,confirmacion){

	if(actual===""){
		alert("Por favor, ingrese la contraseña actual para poder continuar.");
		document.getElementById("contrasenaActual").focus();
	}else if(nueva===""){
		alert("Por favor, ingrese una nueva contraseña.");
		document.getElementById("nuevaContrasena").focus();
	}else{
		if(nueva!==confirmacion){
			alert("Las contraseñas no coinciden.");
	    	document.getElementById("nuevaContrasena").value=nueva;
	    	document.getElementById("confirmacionContrasena").value=confirmacionContrasena;
	    	document.getElementById("confirmacionContrasena").focus();
		}else{
			if(validarContrasenaSegura("nuevaContrasena")){
				//alert("La nueva contrasena es segura.");
				var xmlhttp = new XMLHttpRequest();			        
				xmlhttp.open("GET", "adm/03-cnt/01-crudLogin/04-cambiarContrasena.php?actual="+actual+"&nueva="+nueva, false);
				xmlhttp.send();
				//alert(xmlhttp.responseText.trim());	        
				if("si" === xmlhttp.responseText.trim()){
					alert("La contraseña se cambió exitosamente");
					document.getElementById("contrasenaActual").value="";
					document.getElementById("nuevaContrasena").value="";
					document.getElementById("confirmacionContrasena").value="";
					$('.appsFormularioNuevaContrasena').css('visibility', 'hidden');
					document.getElementById("contrasenaCheckList").style.visibility="hidden";	        	
				}else{        	
					alert("La contraseña actual es incorrecta.");
					document.getElementById("contrasenaActual").focus();
				}
			}else{
				alert("La nueva contrasena no es lo suficientemente segura.");
				document.getElementById("nuevaContrasena").focus();
			}
					
		}
	}		
}