function ordenarUsuario(campo, direccion){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","adm/03-cnt/02-crudUsuarios/00-cargarUsuarios.php?campo="+campo+"&direccion="+direccion,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}
function registrarNuevoUsuario(){
	var usuarioCEDU= document.getElementById("usuarioCEDU").value;  
    var foto =$("#foto").val().substr(12,$("#foto").val().length);
    var nombres= document.getElementById("nombres").value;
    var apellidos= document.getElementById("apellidos").value;
    var correo= document.getElementById("correo").value;
	var usuario= document.getElementById("usuario").value;
	var contrasena= document.getElementById("contrasena").value;
	var defUsuario= document.getElementById("defUsuario").value;
	var permiso= document.getElementById("permiso").value;	
	//alert(usuario+", "+contrasena+", "+usuarioCEDU+", "+apellidos+", "+nombres+", "+defUsuario+", "+permiso);
	if(usuarioCEDU==""){
		alert("Por favor, ingrese el número de identificación del usuario.");
		document.getElementById("usuarioCEDU").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
        document.getElementById("usuarioCEDU").focus();
		return false;
    }else if(nombres==""){
		alert("Por favor, ingrese los nombres del usuario.");
        document.getElementById("nombres").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("nombres").focus();
		return false;
	}else if(apellidos==""){
		alert("Por favor, ingrese los apellidos del usuario.");
        document.getElementById("apellidos").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("apellidos").focus();
		return false;
	}else if(correo==""){
		alert("Por favor, ingrese un correo válido.");
        document.getElementById("correo").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("correo").focus();
		return false;
	}else if(usuario==""){
		alert("Por favor, ingrese el nombre de usuario.");
        document.getElementById("usuario").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";		
		document.getElementById("usuario").focus();
		return false;
	}else if(contrasena==""){
		alert("Por favor, ingrese una contraseña.");
        document.getElementById("contrasena").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";	
		document.getElementById("contrasena").focus();
		return false;
	}else if(defUsuario==""||!(defUsuario==0||defUsuario==1)){
		alert('Por favor, seleccione "SI" o "NO" para definir la responsabilidad del usuario');
        document.getElementById("defUsuario").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("defUsuario").focus();
		return false;
	}else if(permiso==""||!(permiso==0||permiso==1||permiso==2||permiso==3||permiso==4||permiso==5||permiso==6)){
		alert("Por favor, seleccione el tipo de usuario para definir sus permisos.");
        document.getElementById("permiso").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("permiso").focus();
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
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "adm/03-cnt/02-crudUsuarios/01-crearUsuario.php?usuarioCED="+usuarioCEDU+"&foto="+foto+"&nombres="+nombres+"&apellidos="+apellidos+"&correo="+correo+"&usuario="+usuario+"&contrasena="+contrasena, false);
        xmlhttp.send();
        //alert(xmlhttp.responseText.trim());
        if(xmlhttp.responseText.trim()=="si"){
            document.getElementById("contrasenaCheckList").style.visibility="hidden";
            alert("El usuario "+usuario+" fue registrado con exito.");
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","adm/03-cnt/02-crudUsuarios/00-cargarUsuarios.php",false);
            xmlhttp.send();
            document.getElementById("actualizable").innerHTML=""
            document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
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
                alert("Ya existe un registro con el número de identificación "+usuarioCEDU+".");
                document.getElementById("usuarioCEDU").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
                document.getElementById("usuarioCEDU").value="";
                document.getElementById("usuarioCEDU").focus();
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
	}			
}
function actualizarSeleccionUsuario(tdId,numReg,campo,selId,value){
	// alert(tdId+", "+numReg+", "+campo+", "+selId+", "+value);
	cancelarAccionUsuarios();		
	var td=document.getElementById(tdId);	
	var textoOpcion;
	if(campo=="defUsuario"){
		if(value==1){
			textoOpcion= '<option value=0>NO</option></select>'
		}else{
			textoOpcion= '<option value=1>SÍ</option></select>'
		}
	}else{
		if(value==1){
			textoOpcion= 	'<option value=2>SSO</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=5>Rector</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==2){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=5>Rector</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==3){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=2>SSO</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=5>Rector</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==4){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=2>SSO</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=5>Rector</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==5){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=2>SSO</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==6){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=2>SSO</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=5>Rector</option></select>'
		}
	}
	var contenido =	'<select name="'+selId+'" id="'+selId+'">'+
						'<option value='+value+'>'+td.innerHTML+'</option>'+textoOpcion+' '+				
					'<input type="image" style="width:15px; height:15px;position:relative;top:4px;border-radius:50px;!important" src="../appsArt/okOn.png" onclick="actualizarRegistroUsuario('+numReg+','+selId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px;position:relative;top:4px;border-radius:50px;!important" src="../appsArt/cancelarOn.png" onclick="cancelarAccionUsuarios()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(selId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";	
	}			
}
function actualizarInputUsuario(tdId,numReg,campo,inpId){
	alert("hola");
	alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionUsuarios();
	var td=document.getElementById(tdId);
    var texto="";	
	inicio=td.innerHTML.indexOf(">");    
	texto=td.innerHTML.substring(inicio+1,td.innerHTML.length);
    var contenido="";
    var contenido =	'<input type="text" id="'+inpId+'" value="'+texto+'" style="width:150px;height:15px;">'+" "+
		   			'<input type="image" title="Aceptar" style="width:15px;height:15px;position:relative;top:4px;border-radius:50px;!important" src="../appsArt/okOn.png" onclick="actualizarRegistroUsuario('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" title="Cancelar" style="width:15px;height:15px;position:relative;top:4px;border-radius:50px;!important" src="../appsArt/cancelarOn.png" onclick="cancelarAccionUsuarios()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}
function actualizarRegistroUsuario(id,valor,campo){
	// alert(id+", "+valor+", "+campo);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "adm/03-cnt/02-crudUsuarios/02-actualizarUsuario.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","adm/03-cnt/02-crudUsuarios/00-cargarUsuarios.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}
function cancelarAccionUsuarios(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","adm/03-cnt/02-crudUsuarios/00-cargarUsuarios.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}
function eliminarRegistroUsuario(id){
    alertify.confirm("¿Con seguridad desea eliminar el registro No. "+id+"?",
        function() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","adm/03-cnt/02-crudUsuarios/03-eliminarUsuario.php?usuarioID="+id,false);
            xmlhttp.send();		
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","adm/03-cnt/02-crudUsuarios/00-cargarUsuarios.php",false);
            xmlhttp.send();
            document.getElementById("actualizable").innerHTML=""
            document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
            alertify.success('El Registro '+id+" se eliminó de manera exitosa.");
        },
        function() {
            alertify.error('Eliminación cancelada.');
        }
    );
}
function mostrarUploadCrudUsuarios(id){
	const items = document.getElementsByClassName("uploadUsuario");
	// alert(items.length);
	for(i=1;i<items.length;i++){
		document.getElementById(items[i].id).style.visibility="hidden";
	}
	document.getElementById(id).style.visibility="visible";
}
$(document).ready(function() {
    $(".uploadUsuario").on('change', function() {	
		var id=$(this).attr("id");
		document.getElementById(id).style.visibility="hidden";
		var idnum = id.substr(12,id.length);
		alert(idnum);	
		var td=document.getElementById("tdUsuarioCED"+idnum);
		var texto="";	
		inicio=td.innerHTML.indexOf(">");    
		texto=td.innerHTML.substring(inicio+1,td.innerHTML.length);
		var usuarioCED=texto;		
		alert(usuarioCED);
		var formData = new FormData();
		var files = $('#'+id)[0].files[0];
		formData.append('file',files);
		$.ajax({		
			url: 'adm/03-cnt/01-crudLogin/03.1-subirImagen.php',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response){			
				if(response !=0){
					alert("La imagen "+fotoInicial+" se cargó exitosamente.");							
					var fotoInicial =response.substr(10,response.length);	
					renombrarImagen(idnum,fotoInicial,usuarioCED);						
					cancelarAccionUsuarios();						
				}else{
					alert('Formato de imagen incorrecto.');
				}
			}
		});		
    });	
});
function renombrarImagen(id,fotoInicial,fotoFinal){	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","adm/03-cnt/02-crudUsuarios/04-renombrarImagen.php?id="+id+"&fotoInicial="+fotoInicial+"&fotoFinal="+fotoFinal,false);
	xmlhttp.send();
}
function reestablecerTablaUsuarios(archivoFuente){

	af=archivoFuente.replace(/\\/g, "/");
	u=af.lastIndexOf("/");
	l=af.length;
	af=af.substr(u+1,l);
	alert(af);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUsuarios/06-cargarUsuariosExcel.php?archivoFuente="+archivoFuente,false);
	xmlhttp.send();
	//xhttp.open("POST", "../bdUsuarios/06-cargarUsuariosExcel.php", true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhttp.send(archivoFuente);

	alert(xmlhttp.responseText.trim());
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUsuarios/02-cargarUsuarios.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}