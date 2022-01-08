function cargarActualizable(tbl, campos, campo, direccion){
    //alert(tbl+", "+direccion+", "+campo+", "+campos);
    url = 'adm/03-cnt/03-funciones/cargarTabla2.php';
            data = {
                tbl: tbl,
                campos: campos,
                campo: campo,
                direccion: direccion
            };
            flag=1;
            hacerFetch(url, data, flag);
}
function hacerFetch(url, data, flag){
    var request = new Request(
        url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers:{
                'Content-Type': 'application/json'
            }
        }
    );
    //fetch().then({}).then({}).catch();
    
    fetch(request)
    .then(texto => {
        return texto.text();
    }).then(textoInText=> {
            //console.log(textoInText);
            //alert(textoInText.trim());
            numError=textoInText.trim().substr(0,4);
            //alert(numError);
            if (numError=="1451"){
                final=textoInText.trim().indexOf("`",98);
                final=final - 98;
                nomTabla=textoInText.trim().substr(98,final);
                alert("No se puede borrar este registro, porque está siendo referenciado por la tabla '"+nomTabla+"'.");
            }            
            if (flag == 1){
            document.getElementById("actualizable").innerHTML=""
            document.getElementById("actualizable").innerHTML=textoInText.trim();
            }
        }
    ).catch(
        function(error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        }
    );       
}
function ordenarRegistros(tbl, campos, campo, direccion){
    cargarActualizable(tbl, campos, campo, direccion);
}

function eliminarRegistros(id, tbl, campos){
    alertify.confirm("¿Con seguridad desea eliminar el registro No. "+id+" de la tabla: "+tbl+"?",
        function() {
            let url = 'adm/03-cnt/03-funciones/eliminarRegistros.php';
            let data = {
                registroID: id,
                tbl: tbl
            };
            flag=0;
            hacerFetch(url, data, flag);
            cargarActualizable(tbl, campos, 'id', 'ASC');
        },
        function() {
            alertify.error('Eliminación cancelada.');
        }
    );
}

function crearRegistro(tbl, campos){
    var vacios= [];    
    var registros = new Array(campos.length-1);
    for(r=0;r<registros.length;r++){
        registros[r]=new Array(2)
    }
    var j=0;
    //alert("Se va a crear un registro en la tabla: "+tbl+" con los campos: "+campos);
    for (i=1;i<campos.length; i++){
        contenido = document.getElementById(campos[i]).value;        
        if(contenido==""){
            vacios[j]=i;
            j++;
        }else{            
            registros[i-1][0]=campos[i];
            registros[i-1][1]=contenido;
        }   
    }
    //alert(vacios.length);
    if(vacios.length>0){
        alert('Algunos campos están vacíos. Por favor diligencie la información solicitada.');
        for(i=0; i<vacios.length; i++){
            document.getElementById(campos[vacios[i]]).style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
        }
    }else{
        //alert("Vamos bien.");
        let url = 'adm/03-cnt/03-funciones/crearRegistro.php';
        let data = {
            tbl: tbl,
            registros: registros,
        };
        flag=0;
        hacerFetch(url, data, flag);
        cargarActualizable(tbl, campos, 'id', 'ASC');
    }   
}
function actualizarInputRegistro(tdId,numReg,campo,inpId,tbl,campos){
    //alert(tdId+", "+numReg+", "+campo+", "+inpId+", "+tbl+", "+campos);
	//cancelarAccionUsuarios();
	var td=document.getElementById(tdId);
    var texto="";	
	inicio=td.innerHTML.indexOf(">");    
	texto=td.innerHTML.substring(inicio+1,td.innerHTML.length);
    texto=texto.trim();
    var contenido="";
    var contenido =	'<input type="text" id="'+inpId+'" value="'+texto+'" style="width:150px;height:15px;">'+" "+
		   			'<input type="image" title="Aceptar" style="width:15px;height:15px;position:relative;top:4px;border-radius:50px;!important" src="../appsArt/okOn.png" onclick="actualizarRegistro('+numReg+','+inpId+'.value,\''+campo+'\',\''+tbl+'\', \''+campos+'\')">'+" "+
    				'<input type="image" title="Cancelar" style="width:15px;height:15px;position:relative;top:4px;border-radius:50px;!important" src="../appsArt/cancelarOn.png" onclick="cancelarAccion()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}
function actualizarRegistro(id,valor,campo,tbl,campos){
	//alert(tbl+", "+id+", "+valor+", "+campo+", "+campos);
    let url = 'adm/03-cnt/03-funciones/actualizarRegistro.php';
    let data = {
        tbl: tbl,
        registroID: id,
        valor: valor,
        campo: campo,
    };
    //alert("aqui");
    flag=0;
    hacerFetch(url, data, flag);
    var campos = campos.split(",");
    //alert("Los campos son: " +campos);
    cargarActualizable(tbl, campos, 'id', 'ASC');
}
function cancelarAccion(){
    alert('Se cancela la accion');
	/*
    var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","adm/03-cnt/02-crudUsuarios/00-cargarUsuarios.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
    */
}