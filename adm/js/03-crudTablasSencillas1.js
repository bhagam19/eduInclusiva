function eliminarRegistros(id, tbl, flag, campos){
    //alert("eliminarRegistros");
    alertify.confirm("¿Con seguridad desea eliminar el registro No. "+id+" de la tabla: "+tbl+"?",
        function() {
            let url = 'adm/03-cnt/03-funciones/eliminarRegistros.php';
            let datos = {
                registroID: id,
                tbl: tbl
            };
            console.log(datos);
            var request = new Request(
                url, {
                    method: 'POST',
                    body: JSON.stringify(datos),
                    headers:{
                        'Content-Type': 'application/json'
                    }
                    //headers: {"Content-type": "application/json; charset=UTF-8"}
                }
            );
            console.log(request);
            fetch(request)
            .then(texto => {
                return texto.text();
            }).then(textoInText=> {
                    console.log(textoInText);
                    document.getElementById("actualizable").innerHTML=""
                    document.getElementById("actualizable").innerHTML=textoInText.trim();
                    //alertify.success('El Registro '+id+" se eliminó de manera exitosa.");
                    //alert(resp.status);
                }
            ).catch(
                function(error) {
                    console.log('Hubo un problema con la petición Fetch:' + error.message);
                }
            );
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
            url = 'adm/03-cnt/03-funciones/cargarTabla2.php';
            data = {
                flag: flag,
                tbl: tbl,
                campos: campos
            }
            console.log(data);
            var request = new Request(
                url, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers:{
                        'Content-Type': 'application/json'
                    }
                }
            );
            fetch(request)
            .then(texto => {
                return texto.text();
            }).then(textoInText=> {
                    console.log(textoInText);
                    document.getElementById("actualizable").innerHTML=""
                    document.getElementById("actualizable").innerHTML=textoInText.trim();
                }
            ).catch(
                function(error) {
                    console.log('Hubo un problema con la petición Fetch:' + error.message);
                }
            );       
        },
        function() {
            alertify.error('Eliminación cancelada.');
        }
    );
}