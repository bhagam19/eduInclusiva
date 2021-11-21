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
                        include('../../01-mdl/cnx.php');
                        function buscarEnBD($case, $tabla, $id) {
                            include('../../03-cnt/03-funciones/buscarEnBD.php');
                            $columna=mysqli_fetch_row($query1);
                            return $columna[2];   
                        }
                        $case="todo";
                        $tabla="estudiantes";
                        include('../../03-cnt/03-funciones/buscarEnBD.php');
                        while($row=mysqli_fetch_row($query1)){
                    ?>
                    <table border="1">
                        <tr>
                            <td>Nombres:</td>
                            <td><?=$row[1]?>&nbsp;<?=$row[2]?></td>
                            <td>Apellidos:</td>
                            <td><?=$row[3]?>&nbsp;<?=$row[4]?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Lugar de Nacimiento:</td>
                            <?php
                                $nombreMunicipio=buscarEnBD("id", "municipios", $row[5]);
                                $nombreDepartamento=buscarEnBD("id", "departamentos", $row[6]);
                            ?>
                            <td colspan="2"><?=$nombreMunicipio?>, <?=$nombreDepartamento?></td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento:</td>
                            <td><?=$row[7]?></td>
                            <td>Edad:</td>
                            <td><?=$row[8]?></td>
                        </tr>
                        <tr>
                            <td>Tipo de Identificación:</td>
                            <td><?=$row[9]?></td>
                            <td>Número de Identificación:</td>
                            <td><?=$row[10]?></td>
                        </tr>
                        <tr>
                            <td>Departamento Donde Vive:</td>
                            <td><?=$row[11]?></td>
                            <td>Municipio Donde Vive:</td>
                            <td><?=$row[12]?></td>
                        </tr>
                        <tr>
                            <td>Dirección de Vivienda:</td>
                            <td><?=$row[13]?></td>
                            <td>Barrio / Vereda:</td>
                            <td><?=$row[14]?></td>
                        </tr>
                        <tr>
                            <td>Teléfono:</td>
                            <td><?=$row[15]?></td>
                            <td>Correo Electrónico:</td>
                            <td><?=$row[16]?></td>
                        </tr>
                        <tr>
                            <td>¿Está en Centro de Protección?: <?=$row[17]?></td>
                            <td>¿Dónde?:</td>
                            <td><?=$row[18]?></td>
                            <td>Grado al que aspira a ingresar:</td>
                            <td><?=$row[19]?></td>
                        </tr>
                        <tr>
                            <td>¿Se reconoce o pertenece a un grupo étnico?: <?=$row[20]?></td>
                            <td>¿Cuál?:</td>
                            <td><?=$row[21]?></td>
                        </tr>
                        <tr>
                            <td>¿Se reconoce como víctima del conflicto armado?:</td>
                            <td><?=$row[22]?></td>
                            <td>¿Cuenta con el respectivo registro?:</td>
                            <td><?=$row[23]?></td>
                        </tr>
                    </table>
                </div>
                <div id="cpestana2">
                    <table border="1">
                        <tr>
                            <td>¿Está afiliado al sistema de salud?: <?=$row[1]?></td>
                            <td>EPS: <?=$row[1]?>/td>
                            <td>Régimen:</td>
                            <td><?=$row[3]?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Lugar donde lo atienden en caso de emergencia:</td>
                            <td colspan="2"><?=$row[5]?></td>
                        </tr>
                        <tr>
                            <td>¿El niño está siendo atendido por el sector salud?:</td>
                            <td><?=$row[7]?></td>
                            <td>Frecuencia de atención:</td>
                            <td><?=$row[8]?></td>
                        </tr>
                        <tr>
                            <td>¿Tiene diagnóstico médico?:</td>
                            <td><?=$row[9]?></td>
                            <td>¿Cuál?:</td>
                            <td><?=$row[10]?></td>
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
                    }
                ?>
            </div>
    </div>
</body>

</html>