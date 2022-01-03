function cargarActualizable(tbl, campos, campo, direccion){
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
            console.log(textoInText);
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
            cargarActualizable(tbl, campos, 'id', 'AZ');
        },
        function() {
            alertify.error('Eliminación cancelada.');
        }
    );
}