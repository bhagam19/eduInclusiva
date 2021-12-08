<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/pestannas/pestannas.css" />
    <script type="text/javascript" src="../../js/pestannas/cambiarPestanna.js"></script>
    <script type="text/javascript" src="../../js/pestannas/jquery-1.7.2.min.js"></script>
    <title></title>
</head>

<body>
    <div class="contenedor">
        <div class="titulo">INFORMACIÓN DEL ESTUDIANTE</div>
        <div id="pestanas">
            <ul id=lista>
                <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>1. GENERAL</a></li>
                <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>2. ENTORNO SALUD</a></li>
                <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>3. ENTORNO HOGAR</a></li>
                <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>4. ENTORNO EDUCATIVO</a></li>
            </ul>
        </div>

        <body onload="javascript:cambiarPestanna(pestanas,pestana1);">

            <div id="contenidopestanas">
                <div id="cpestana1">
                    <br>
                    <br>
                    <br>
<?php
    function buscarEnBD($case, $tabla, $id) {
        include('../../01-mdl/cnx.php');
        include('../../03-cnt/03-funciones/buscarEnBD.php');
        return $query1;
    }
    $id=1;
    $query=buscarEnBD("id", "estudiantes", $id);
    while($row=mysqli_fetch_row($query)){
?>
                    <table border="1">
                        <tr>
                            <td><span class="heads">Nombres:</span></td>
                            <td><?=$row[1]?>&nbsp;<?=$row[2]?></td>
                            <td>Apellidos:</td>
                            <td><?=$row[3]?>&nbsp;<?=$row[4]?></td>
                        </tr>
<?php
    $nombreMunicipio=mysqli_fetch_row(buscarEnBD("id", "municipios", $row[5]))[2];
    $nombreDepartamento=mysqli_fetch_row(buscarEnBD("id", "departamentos", $row[6]))[2];
?>
                        <tr>
                            <td>Lugar de Nacimiento:</td>
                            <td colspan="3"><?=$nombreMunicipio?>, <?=$nombreDepartamento?></td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento:</td>
                            <td><?=$row[7]?></td>
                            <td>Edad:</td>
                            <td><?=$row[8]?></td>
                        </tr>
<?php
    $tipoIdentificacion=mysqli_fetch_row(buscarEnBD("id", "tiposDocumento", $row[9]))[1];
?>
                        <tr>
                            <td>Tipo de Identificación:</td>
                            <td><?=$tipoIdentificacion?></td>
                            <td>Número de Identificación:</td>
                            <td><?=$row[10]?></td>
                        </tr>
<?php
    $nombreMunicipio=mysqli_fetch_row(buscarEnBD("id", "municipios", $row[12]))[2];
    $nombreDepartamento=mysqli_fetch_row(buscarEnBD("id", "departamentos", $row[11]))[2];
?>
                        <tr>
                            <td>Departamento Donde Vive:</td>
                            <td><?=$nombreDepartamento?></td>
                            <td>Municipio Donde Vive:</td>
                            <td><?=$nombreMunicipio?></td>
                        </tr>
<?php
    $nomenclatura1=mysqli_fetch_row(buscarEnBD("id", "barrios", $row[14]))[3];
    $nomenclatura2=mysqli_fetch_row(buscarEnBD("id", "barrios", $row[14]))[2];
    $nomenclatura3=mysqli_fetch_row(buscarEnBD("id", "nomenclaturas", $nomenclatura2))[1];
?>
                        <tr>
                            <td>Dirección de la vivienda:</td>
                            <td colspan="3"><?=$row[13]?>,&nbsp;<?=$nomenclatura3?>&nbsp;<?=$nomenclatura1?></td>
                        </tr>
                        <tr>
                            <td>Teléfono:</td>
                            <td><?=$row[15]?></td>
                            <td>Correo Electrónico:</td>
                            <td><?=$row[16]?></td>
                        </tr>
<?php
    $opcion=mysqli_fetch_row(buscarEnBD("id", "opciones", $row[17]))[1];
    $donde=mysqli_fetch_row(buscarEnBD("id", "centrosDEproteccion", $row[18]))[1];
?>
                        <tr>
                            <td>¿Está en Centro de Protección?:&nbsp;<?=$opcion?></td>
<?php
    if($opcion=="Si"){
?>
                            <td>¿Dónde?:</td>
                            <td><?=$donde?></td>
<?php
    }
?>
                        </tr>
<?php
    $grado=mysqli_fetch_row(buscarEnBD("id", "grados", $row[19]))[1];
?>
                        <tr>
                            <td>Grado al que aspira a ingresar:</td>
                            <td><?=$grado?></td>
                        </tr>
<?php
    $opcion=mysqli_fetch_row(buscarEnBD("id", "opciones", $row[20]))[1];
    $cual=mysqli_fetch_row(buscarEnBD("id", "gruposEtnicos", $row[21]))[1];
?>
                        <tr>
                            <td>¿Se reconoce o pertenece a un grupo étnico?:&nbsp;<?=$opcion?></td>
<?php
    if($opcion=="Si"){
?>
                            <td>¿Cuál?:</td>
                            <td><?=$cual?></td>
<?php
    }
?>
                        </tr>
<?php
    $opcion=mysqli_fetch_row(buscarEnBD("id", "opciones", $row[22]))[1];
    $opcion2=mysqli_fetch_row(buscarEnBD("id", "opciones", $row[23]))[1];
?>
                        <tr>
                            <td>¿Se reconoce como víctima del conflicto armado?:&nbsp;<?=$opcion?></td>
<?php
    if($opcion=="Si"){
?>
                            <td>¿Cuenta con el respectivo registro?:&nbsp;<?=$opcion2?></td>
<?php
    }
?>
                        </tr>
                    </table>
        </div>
        <div id="cpestana2">
                    <br>
                    <br>
                    <br>
                    <table border="1">
<?php
    $opcion=mysqli_fetch_row(buscarEnBD("id", "opciones", $row[22]))[1];
    $eps=mysqli_fetch_row(buscarEnBD("id", "eps", $row[23]))[1];
    $regimen=mysqli_fetch_row(buscarEnBD("id", "regimenes", $row[24]))[1];
?>
                        <tr>
                            <td>¿Está afiliado al sistema de salud?: <?=$opcion?></td>
                            <td>EPS: <?=$eps?></td>
                            <td>Régimen:</td>
                            <td><?=$regimen?></td>
                        </tr>
<?php
    $lugar=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[2];
?>
                        <tr>
                            <td>Lugar donde lo atienden en caso de emergencia:</td>
                            <td colspan="3"><?=$lugar?></td>
                        </tr>
<?php
    $opcion=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[3];
    $opcion=mysqli_fetch_row(buscarEnBD("id", "opciones", $opcion))[1];
    $frecuencia=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[4];
    $frecuencia=mysqli_fetch_row(buscarEnBD("id", "frecuencias", $frecuencia))[1];
?>
                        <tr>
                            <td>¿El niño está siendo atendido por el sector salud?:</td>
                            <td><?=$opcion?></td>
                            <td>Frecuencia de atención:</td>
                            <td><?=$frecuencia?></td>
                        </tr>
<?php
    $opcion=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[5];
    $opcion=mysqli_fetch_row(buscarEnBD("id", "opciones", $opcion))[1];
    $descripcion=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[6];
?>
                        <tr>
                            <td>¿Tiene diagnóstico médico?:</td>
                            <td><?=$opcion?></td>
                            <td>¿Cuál?:</td>
                            <td><?=$descripcion?></td>
                        </tr>
<?php
    $opcion=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[7];
    $opcion=mysqli_fetch_row(buscarEnBD("id", "opciones", $opcion))[1];
    $terapia1=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[8];
    $frecuencia1=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[9];
    $frecuencia1=mysqli_fetch_row(buscarEnBD("id", "frecuencias", $frecuencia1))[1];
    $terapia2=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[10];
    $terapia3=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[12];
?>
                        <tr>
                            <td rowspan="3">¿Está asistiendo a terapias?:</td>
                            <td rowspan="3"><?=$opcion?></td>
<?php
    if($opcion=="Si"){
?>
                            <td>Terapia 1:<br><?=$terapia1?></td>
                            <td>Frecuencia:<br><?=$frecuencia1?></td>
                        </tr>
<?php
    if($terapia2!="" AND $terapia2!="NULL"){
        $frecuencia2=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[11];
        $frecuencia2=mysqli_fetch_row(buscarEnBD("id", "frecuencias", $frecuencia2))[1];
?>
                        <tr>
                            <td>Terapia 2:<br><?=$terapia2?></td>
                            <td>Frecuencia:<br><?=$frecuencia2?></td>
                        </tr>
<?php
    if($terapia3!="" AND $terapia3!="NULL"){
        $frecuencia3=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[13];
        $frecuencia3=mysqli_fetch_row(buscarEnBD("id", "frecuencias", $frecuencia3))[1];
?>
                        <tr>
                        <td>Terapia 3:<br><?=$terapia3?></td>
                        <td>Frecuencia:<br><?=$frecuencia3?></td>
                        </tr>
<?php
    }else{
?>
                        <tr>
                        <td>Terapia 3:<br></td>
                        <td>Frecuencia:<br></td>
                        </tr>
<?php
        }  
    }else{
?>
                        <tr>
                            <td>Terapia 2:<br></td>
                            <td>Frecuencia:<br></td>
                        </tr>
                        <tr>
                            <td>Terapia 3:<br></td>
                            <td>Frecuencia:<br></td>
                        </tr>
<?php
        }
    }
    $opcion=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[14];
    $opcion=mysqli_fetch_row(buscarEnBD("id", "opciones", $opcion))[1];
    $cual=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[15];
?>   
                        <tr>
                            <td>¿Actualmente recibe tratamiento médico por alguna enfermedad en particular?: <br></td>
                            <td><?=$opcion?></td>
                            <td>¿Cuál?:</td>
                            <td><?=$cual?></td>
                        </tr>
<?php
    function buscarInnerJoinX4($case, $t1, $t2, $t3, $t4, $p1, $p2, $p31, $p32, $p41, $p42, $id){
        include('../../01-mdl/cnx.php');
        include('../../03-cnt/03-funciones/buscarEnBD.php');
        return $query1;
    }
    $case="innerJoinx4";
    $t1="estudiantes";
    $t2="afiliaciones";
    $t3="prescripciones";
    $t4="medicamentos";
    $p1="idAfiliacion";
    $p2="id";
    $p31="idAfiliacion";
    $p32="idMedicamento";
    $p41="id";
    $p42="nombre";
    $opcion=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[16];
    $opcion=mysqli_fetch_row(buscarEnBD("id", "opciones", $opcion))[1];
    $cual=mysqli_fetch_row(buscarEnBD("id", "afiliaciones", $row[25]))[1];
    $medicamento=buscarInnerJoinX4($case, $t1, $t2, $t3, $t4, $p1, $p2, $p31, $p32, $p41, $p42, $id);
    $t4="frecuencias";
    $p32="idFrecuencia";
    $p42="descripcion";
    $frecuencia=buscarInnerJoinX4($case, $t1, $t2, $t3, $t4, $p1, $p2, $p31, $p32, $p41, $p42, $id);
    $i=0;
    while($row=mysqli_fetch_row($medicamento)){
        $medicamentos[$i] = $row[0];
        $i++;
    }
    $i=0;
    while($row=mysqli_fetch_row($frecuencia)){
        $frecuencias[$i] = $row[0];
        $i++;
    }
?>
                        <tr>
<?php
    if($opcion=="Si"){
?>
                            <td rowspan="4">¿Consume medicamentos?:</td>
                            <td rowspan="4"><?=$opcion?></td>
                            <td><?=$medicamentos[0]?></td>
                            <td><?=$frecuencias[0]?></td>
                        </tr>
                        <tr>
                            <td><?=$medicamentos[1]?></td>
                            <td><?=$frecuencias[1]?></td>
                        </tr>
                        <tr>
                            <td><?=$medicamentos[2]?></td>
                            <td><?=$frecuencias[2]?></td>
                        </tr>
                        <tr>
                            <td><?=$medicamentos[3]?></td>
                            <td><?=$frecuencias[3]?></td>
                        </tr>
<?php
    }else{
?>
                            <td>¿Consume medicamentos?:</td>
                            <td colspan="3"><?=$opcion?></td>
                        </tr>
<?php
    }
    function buscarInnerJoinX6($case, $t1, $t2, $t3, $t4, $t5, $t6, $p1, $p2, $p31, $p32, $p33, $p41, $p42, $p51, $p52, $p61, $p62, $id){
        include('../../01-mdl/cnx.php');
        include('../../03-cnt/03-funciones/buscarEnBD.php');
        return $query1;
    }
    $case="innerJoinx6";
    $t4="medicamentos";
    $t5="horariosMedicamentos";
    $t6="horas";
    $p32="idMedicamento";
    $p33="id";
    $p42="nombre";
    $p51="idPrescripcion";
    $p52="idHora";
    $p61="id";
    $p62="hora";
    $horarios=buscarInnerJoinX6($case, $t1, $t2, $t3, $t4, $t5, $t6, $p1, $p2, $p31, $p32, $p33, $p41, $p42, $p51, $p52, $p61, $p62, $id);
    $i=0;
    while($row=mysqli_fetch_row($horarios)){
        $medicamentos[$i] = $row[0];
        $horario[$i] = $row[1];
        $i++;
    }
?>
                        <tr>
<?php
    include('../../03-cnt/03-funciones/extraerTextos.php');
?>                      
                            <td rowspan=<?=count($medicaments)?>>Horarios:</td>
<?php
    for ($i=1; $i <= count($medicaments); $i++) {
?>
                            <td><?=$medicaments[$i]?></td>
                            <td colspan="2">
<?php
        for ($j=1; $j <= count($horaris[$i]); $j++) {
            echo $horaris[$i][$j]."<br>";
        }
?>
                            </td>
                        </tr>
<?php
    }
    $case="innerJoinx3";
    $t1="afiliaciones";
    $t2="prescripciones";
    $t3="horariosMedicamentos";
    $p1="id";
    $p21="idAfiliacion";
    $p22="id";
    $p31="idPrescripcion";
    $p32="idOpcEnClase";
    $enClase="No";
    include('../../01-mdl/cnx.php');
    include('../../03-cnt/03-funciones/buscarEnBD.php');
    while($row=mysqli_fetch_row($query1)){
        if($row[0]==1){
            $enClase="Si";
        }
    }
?>
                        






                        <tr>
                            <td rowspan=<?=count($medicaments)?>>¿Debe consumir algún medicamento en horario de clase?: <?=$enClase?></td>
<?php
    for ($i=1; $i <= count($medicaments); $i++) {
?>
                            <td><?=$medicaments[$i]?></td>
                            <td colspan="2">
<?php
        for ($j=1; $j <= count($horaris[$i]); $j++) {
            echo $horaris[$i][$j]."<br>";
        }
?>
                            </td>
                        </tr>






                            
<?php
    }
?>
                        </tr>
                        <tr>
                            <td>¿Cuenta con productos de apoyo para favorecer su movilidad, comunicación e independencia? : <?=$row[17]?></td>
                            <td>¿Cuáles?:</td>
                            <td><?=$row[18]?></td>
                        </tr>
                    </table>
        </div>
        <div id="cpestana3">
            
        </div>
        <div id="cpestana4">
            
        </div>
    </div>
        <?php
            }
        ?>
</div>
</body>

</html>