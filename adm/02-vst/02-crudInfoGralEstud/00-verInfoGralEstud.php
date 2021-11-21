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
                            $retorno=mysqli_fetch_row($query1);
                            mysqli_close($cnx);
                            return $retorno;  
                        }
                        $row=buscarEnBD("todo", "estudiantes", "");
                        /*while($row){*/
                    ?>
                    <table border="1">
                        <tr>
                            <td><span class="heads">Nombres:</span></td>
                            <td><?=$row[1]?>&nbsp;<?=$row[2]?></td>
                            <td>Apellidos:</td>
                            <td><?=$row[3]?>&nbsp;<?=$row[4]?></td>
                        </tr>
                        <?php
                            $nombreMunicipio=buscarEnBD("id", "municipios", $row[5])[2];
                            $nombreDepartamento=buscarEnBD("id", "departamentos", $row[6])[2];
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
                            $tipoIdentificacion=buscarEnBD("id", "tiposDocumento", $row[9])[1];
                        ?>
                        <tr>
                            <td>Tipo de Identificación:</td>
                            <td><?=$tipoIdentificacion?></td>
                            <td>Número de Identificación:</td>
                            <td><?=$row[10]?></td>
                        </tr>
                        <?php
                            $nombreMunicipio=buscarEnBD("id", "municipios", $row[12])[2];
                            $nombreDepartamento=buscarEnBD("id", "departamentos", $row[11])[2];
                        ?>
                        <tr>
                            <td>Departamento Donde Vive:</td>
                            <td><?=$nombreDepartamento?></td>
                            <td>Municipio Donde Vive:</td>
                            <td><?=$nombreMunicipio?></td>
                        </tr>
                        <?php
                            $nomenclatura1=buscarEnBD("id", "barrios", $row[14])[3];
                            $nomenclatura2=buscarEnBD("id", "barrios", $row[14])[2];
                            $nomenclatura3=buscarEnBD("id", "nomenclaturas", $nomenclatura2)[1];
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
                            $opcion=buscarEnBD("id", "opciones", $row[17])[1];
                            $donde=buscarEnBD("id", "centrosDEproteccion", $row[18])[1];
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
                            $grado=buscarEnBD("id", "grados", $row[19])[1];
                        ?>
                        <tr>
                            <td>Grado al que aspira a ingresar:</td>
                            <td><?=$grado?></td>
                        </tr>
                        <?php
                            $opcion=buscarEnBD("id", "opciones", $row[20])[1];
                            $cual=buscarEnBD("id", "gruposEtnicos", $row[21])[1];
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
                            $opcion=buscarEnBD("id", "opciones", $row[22])[1];
                            $opcion2=buscarEnBD("id", "opciones", $row[23])[1];
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
                <?php
                    /*}*/
                ?>
                </div>
                <div id="cpestana2">
                    <br>
                    <br>
                    <br>
                    <table border="1">
                        <?php
                            $opcion=buscarEnBD("id", "opciones", $row[22])[1];
                        ?>
                        <tr>
                            <td>¿Está afiliado al sistema de salud?: <?=$row[24]?></td>
                            <td>EPS: <?=$row[25]?>/td>
                            <td>Régimen:</td>
                            <td><?=$row[26]?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Lugar donde lo atienden en caso de emergencia:</td>
                            <td colspan="2"><?=$row[27]?></td>
                        </tr>
                        <tr>
                            <td>¿El niño está siendo atendido por el sector salud?:</td>
                            <td><?=$row[28]?></td>
                            <td>Frecuencia de atención:</td>
                            <td><?=$row[29]?></td>
                        </tr>
                        <tr>
                            <td>¿Tiene diagnóstico médico?:</td>
                            <td><?=$row[30]?></td>
                            <td>¿Cuál?:</td>
                            <td><?=$row[31]?></td>
                        </tr>
                        <tr>
                            <td>¿Está asistiendo a tereapias?:</td>
                            <td><?=$row[11]?></td>
                            <td>Terapia 1:</td>
                            <td><?=$row[12]?></td>
                            <td>Terapia 2:</td>
                            <td><?=$row[12]?></td>
                            <td>Terapia 3:</td>
                            <td><?=$row[12]?></td>
                        </tr>
                        <tr>
                            <td>¿Actualmente recibe tratamiento médico por alguna enfermedad en particular?:</td>
                            <td><?=$row[13]?></td>
                            <td>¿Cuál?:</td>
                            <td><?=$row[14]?></td>
                        </tr>
                        <tr>
                            <td>¿Consume medicamentos?:</td>
                            <td><?=$row[15]?></td>
                            <td>Frecuencia:</td>
                            <td><?=$row[16]?></td>
                            <td>Horarios:</td>
                            <td><?=$row[16]?></td>
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
                <?php
                    /*}*/
                ?>
            </div>
    </div>
</body>

</html>