function mostrarDatosEstudiantes(id){
    //alert("Se va a mostrar los datos del estudiante No. "+id+".");
    let url='adm/02-vst/02-crudInfoGralEstud/00-verInfoGralEstud.php';
    let data={
        id:id,
    };
    flag=0;
    hacerFetch2(url, data, flag);
}
function hacerFetch2(url, data, flag){
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
        //console.log(textoInText);
        //alert(textoInText.trim());
        //alert(textoInText.trim());
        document.getElementById("actualizable").innerHTML="";
        document.getElementById("contenedor").innerHTML="";
        document.getElementById("contenedor").innerHTML=textoInText.trim();
    }
    ).catch(
        function(error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        }
    );       
}