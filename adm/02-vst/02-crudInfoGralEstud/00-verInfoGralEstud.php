<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="adm/css/pestannas/pestannas.css" />
    <script type="text/javascript" src="adm/js/pestannas/cambiarPestanna.js"></script>
    <script type="text/javascript" src="adm/js/pestannas/jquery-1.7.2.min.js"></script>
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
<!--########################################################################################################################################################################################################
###############################################################################   PESTAÑA 1   ##############################################################################################################
#########################################################################################################################################################################################################-->
                <div id="cpestana1">
                    <br>
                    <br>
                    <br>
<?php
    function buscarEnBD($case, $tabla, $id) {
        include dirname(__FILE__).'../../../01-mdl/cnx.php';
        include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
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
<!--########################################################################################################################################################################################################
###############################################################################   PESTAÑA 2   ##############################################################################################################
#########################################################################################################################################################################################################-->
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
        include dirname(__FILE__).'../../../01-mdl/cnx.php';
        include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
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
        include dirname(__FILE__).'../../../01-mdl/cnx.php';
        include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
        return $query1;
    }
    $case="innerJoinx6";
    $p32="idMedicamento";
    $p33="id";
    $t4="medicamentos";
    $p42="nombre";
    $t5="horariosMedicamentos";
    $p51="idPrescripcion";
    $p52="idHora";
    $t6="horas";
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
    include dirname(__FILE__).'../../../03-cnt/03-funciones/extraerTextos.php';
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
    $case="innerJoinx4con3";
    $t1="afiliaciones";
    $p1="id";
    $t2="prescripciones";
    $p21="idMedicamento";
    $p22="id";
    $p23="idAfiliacion";
    $t3="medicamentos";
    $p31="id";
    $p32="nombre";
    $t4="horariosMedicamentos";
    $p41="idPrescripcion";
    $p42="idOpcEnClase";
    $p43="idHora";
    $enClase="No";
    $cont=0;
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    while($row=mysqli_fetch_row($query1)){
        $cont++;
        if($cont==1 && $cont1>=1){
            $enClase="Si";
?>
                        <tr>
                            <td rowspan=<?=$cont1?>>¿Debe consumir algún medicamento en horario de clase?: <?=$enClase?></td>
<?php
        }
        if ($row[1]==1) {
?>
                            <td><?=$row[0]?></td>
                            <td colspan="2">
<?php
            $case="id";
            $tabla="horas";
            $hora=mysqli_fetch_row(buscarEnBD($case, $tabla, $row[2]));
        
?>
                            <?=$hora[1]?></td>
                        </tr>         
<?php
        }
    }
    if ($cont1==0) {
?>
                        <tr>
                            <td rowspan="4">¿Debe consumir algún medicamento en horario de clase?: <?=$enClase?></td>
                        </tr>
<?php
    }
    $case="innerJoinx3";
    $t1="estudiantes";
    $p11="id";
    $p12="idAfiliacion";
    $t2="afiliaciones";
    $p21="id";
    $p22="idOpcionApoyo";
    $t3="opciones";
    $p31="id";
    $p32="opcion";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);
?>
                        <tr>
                            <td>¿Cuenta con productos de apoyo para favorecer su movilidad, comunicación e independencia? : <?=$row[0]?></td>
<?php
    $p22="idApoyo";
    $t3="apoyosAbarreras";
    $p31="id";
    $p32="nombre";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);
?>
                            <td>¿Cuáles?:</td>
                            <td><?=$row[0]?></td>
                        </tr>
                    </table>
        </div>
<!--########################################################################################################################################################################################################
###############################################################################   PESTAÑA 3   ##############################################################################################################
#########################################################################################################################################################################################################-->
        <div id="cpestana3">
            
        <br>
                    <br>
                    <br>
                    <table border="1">
<?php
    $case="innerJoinx3";
    $t1="estudiantes";
    $p11="id";
    $p12="idEntornoFamiliar";
    $t2="entornoFamiliar";
    $p21="id";
    $p22="idMadres";
    $t3="madres";
    $p31="id";
    $p32="nomMadre";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);

?>
                        <tr>
                            <td>Nombre de la Madre: </td>
                            <td><?=$row[0]?></td>
<?php
    $p22="idPadres";
    $t3="padres";
    $p31="id";
    $p32="nomPadre";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);
?>
                        
                        <td>Nombre del Padre:</td>
                            <td><?=$row[0]?></td>
                        </tr>
<?php
    $case="innerJoinx4";
    $t1="estudiantes";
    $p11="id";
    $p12="idEntornoFamiliar";
    $t2="entornoFamiliar";
    $p21="id";
    $p22="idMadres";
    $t3="madres";
    $p31="id";
    $p32="idOcupacion";
    $t4="ocupaciones";
    $p41="id";
    $p42="name";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);
?>
                        <tr>
                            <td>Ocupación de la Madre:</td>
                            <td><?=$row[0]?></td>
<?php
    $p22="idPadres";
    $t3="padres";
    $p31="id";
    $p32="idOcupacion";
    $t4="ocupaciones";
    $p41="id";
    $p42="name";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);
?>
                            <td>Ocupación del Padre:</td>
                            <td><?=$row[0]?></td>
                        </tr>
<?php
    $p22="idMadres";
    $t3="madres";
    $p31="id";
    $p32="idNivelEdu";
    $t4="nivelesEducativos";
    $p41="id";
    $p42="name";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);
?>
                        <tr>
                            <td>Nivel Educativo de la madre:</td>
                            <td><?=$row[0]?></td>
<?php
    $p22="idPadres";
    $t3="padres";
    $p31="id";
    $p32="idNivelEdu";
    $t4="nivelesEducativos";
    $p41="id";
    $p42="name";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);
?>
                            <td>Nivel Educativo del padre:</td>
                            <td><?=$row[0]?></td>
                        </tr>
<?php
    $case="innerJoinx3";
    $t1="estudiantes";
    $p11="id";
    $p12="idEntornoFamiliar";
    $t2="entornoFamiliar";
    $p21="id";
    $p22="idCuidadores";
    $t3="cuidadores";
    $p31="id";
    $p32="nomCuidador";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);  
?>
                        <tr>
                            <td>Nombre del Cuidador:</td>
                            <td><?=$row[0]?></td>
<?php
    $case="innerJoinx4";
    $t1="estudiantes";
    $p11="id";
    $p12="idEntornoFamiliar";
    $t2="entornoFamiliar";
    $p21="id";
    $p22="idCuidadores";
    $t3="cuidadores";
    $p31="id";
    $p32="idParentesco";
    $t4="parentescos";
    $p41="id";
    $p42="name";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);
?>
                            <td>Parentesco con el estudiante:</td>
                            <td><?=$row[0]?></td>
                        </tr>
<?php
$p22="idCuidadores";
$t3="cuidadores";
$p31="id";
$p32="idNivelEdu";
$t4="nivelesEducativos";
$p41="id";
$p42="name";
include dirname(__FILE__).'../../../01-mdl/cnx.php';
include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
$row=mysqli_fetch_row($query1);
?>
                        <tr>
                            <td>Nivel Educativo del cuidador:</td>
                            <td><?=$row[0]?></td>
<?php
?>
                            <td>Teléfono del cuidador:</td>
                            <td><?=$frecuencia1?></td>
                        </tr>
<?php
?>
                        <tr>
                            <td>Correo electrónico del cuidador:</td>
                            <td colspan="3"><?=$frecuencia2?></td>
                        </tr>
<?php
?>
                        <tr>
                            <td>Número de hermanos:</td>
                            <td><?=$frecuencia3?></td>
                            <td>Lugar que ocupa:</td>
                            <td><?=$frecuencia3?></td>
                        </tr>
<?php
?>   
                        <tr>
                            <td>Personas con quien vive:</td>
                            <td><?=$opcion?></td>
                            <td>¿Quienes apoyan la crianza del estudiante?:</td>
                            <td><?=$cual?></td>
                        </tr>
<?php
?>
                        <tr>
                            <td>¿Está bajo protección? :</td>
                            <td><?=$row[0]?></td>
<?php
    $p22="idApoyo";
    $t3="apoyosAbarreras";
    $p31="id";
    $p32="nombre";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);
?>
                            <td>¿La familia recibe algún subsidio de alguna entidad o institución?:</td>
                            <td><?=$row[0]?></td>
                        </tr>
<?php
    if($opcion=="Si"){
?>
                            <td colspan="2">¿De qué entidad recibe subsidio?:</td>
                            <td colspan="2"><?=$cual?></td>
<?php
    }
?>
                        </tr>
                    </table>
        </div>
<!--########################################################################################################################################################################################################
###############################################################################   PESTAÑA 4   ##############################################################################################################
#########################################################################################################################################################################################################-->
        <div id="cpestana4">
                    <br>
                    <h3>Información de la Trayectoria Educativa</h3>
                    <br>
                    <table border="1">
<?php
    $case="innerJoinx3";
    $t1="estudiantes";
    $p11="id";
    $p12="idEntornoFamiliar";
    $t2="entornoFamiliar";
    $p21="id";
    $p22="idMadres";
    $t3="madres";
    $p31="id";
    $p32="nomMadre";
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    $row=mysqli_fetch_row($query1);

?>
                        <tr>
                            <td>¿Ha estado vinculado en otra institución educativa, fundación o modalidad de educación inicial?: </td>
                            <td><?=$row[0]?></td>
<?php
if($opcion=="Si"){
?>
                        <td>¿Cuáles?:</td>
                        <td><?=$cual?></td>
<?php
}else{
?>
                        <td>¿Por qué?:</td>
                        <td><?=$cual?></td>
<?php
}
?>
                    </tr>
<?php
$p22="idPadres";
$t3="padres";
$p31="id";
$p32="nomPadre";
include dirname(__FILE__).'../../../01-mdl/cnx.php';
include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
$row=mysqli_fetch_row($query1);
?>
                        <tr>
                            <td>Último grado cursado:</td>
                            <td><?=$row[0]?></td>
<?php
$case="innerJoinx4";
$t1="estudiantes";
$p11="id";
$p12="idEntornoFamiliar";
$t2="entornoFamiliar";
$p21="id";
$p22="idMadres";
$t3="madres";
$p31="id";
$p32="idOcupacion";
$t4="ocupaciones";
$p41="id";
$p42="name";
include dirname(__FILE__).'../../../01-mdl/cnx.php';
include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
$row=mysqli_fetch_row($query1);
?>
                            <td>¿Aprobó?;</td>
                            <td><?=$row[0]?></td>
                            </tr>
<?php
$p22="idPadres";
$t3="padres";
$p31="id";
$p32="idOcupacion";
$t4="ocupaciones";
$p41="id";
$p42="name";
include dirname(__FILE__).'../../../01-mdl/cnx.php';
include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
$row=mysqli_fetch_row($query1);
?>
                        <tr>
                            <td>Observaciones:</td>
                            <td colspan="3"><?=$row[0]?></td>
                        </tr>
<?php
$p22="idMadres";
$t3="madres";
$p31="id";
$p32="idNivelEdu";
$t4="nivelesEducativos";
$p41="id";
$p42="name";
include dirname(__FILE__).'../../../01-mdl/cnx.php';
include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
$row=mysqli_fetch_row($query1);
?>
                        <tr>
                            <td>¿Se recibe informe pedagógico cualitativo que describa el proceso de desarrollo y aprendizaje del estudiante y/o PIAR?:</td>
                            <td><?=$row[0]?></td>
<?php
$p22="idPadres";
$t3="padres";
$p31="id";
$p32="idNivelEdu";
$t4="nivelesEducativos";
$p41="id";
$p42="name";
include dirname(__FILE__).'../../../01-mdl/cnx.php';
include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
$row=mysqli_fetch_row($query1);
?>
                            <td>¿De qué institución o modalidad proviene el informe?:</td>
                            <td><?=$row[0]?></td>
                        </tr>
                    </table>
                    <br>
                    <h3>Información de la institución educativa en la que se matricula:</h3>
                    <br>
                    <table border="1">
<?php
?>
                        <tr>
                            <td>Nombre de la Institución educativa a la que se matricula:</td>
                            <td><?=$opcion?></td>
                            <td>Sede:</td>
                            <td><?=$descripcion?></td>
                        </tr>
<?php
?>
                        <tr>
                            <td>Medio que usará el estudiante para transportarse a la institución educativa:</td>
                            <td><?=$opcion?></td>
<?php
?>
                            <td>Distancia entre la institución educativa o sede y el hogar del estudiante (Tiempo):</td>
                            <td><?=$frecuencia1?></td>
                        </tr>

                    </table>
            
        </div>
    </div>
        <?php
            }
        ?>
</div>
</body>

</html>
