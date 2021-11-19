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
                            <td colspan="2"><?=$row[5]?>, <?=$row[6]?></td>
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
                    </table>
                    <?php
                        }
                    ?>
                </div>
                <div id="cpestana2">
                
                </div>
                <div id="cpestana3">
                    JavaScript es un lenguaje de programación interpretado, dialecto del estándar ECMAScript. Se define como orientado a objetos,3 basado en prototipos, imperativo, débilmente tipado y dinámico.
                </div>
                <div id="cpestana4">
                    PHP es un lenguaje de programación de uso general de script del lado del servidor originalmente diseñado para el desarrollo web de contenido dinámico. Fue uno de los primeros lenguajes de programación del lado del servidor que se podían incorporar directamente en el documento HTML en lugar de llamar a un archivo externo que procese los datos. El código es interpretado por un servidor web con un módulo de procesador de PHP que genera la página Web resultante. PHP ha evolucionado por lo que ahora incluye también una interfaz de línea de comandos que puede ser usada en aplicaciones gráficas independientes. PHP puede ser usado en la mayoría de los servidores web al igual que en casi todos los sistemas operativos y plataformas sin ningún costo.
                </div>
            </div>
    </div>
</body>

</html>