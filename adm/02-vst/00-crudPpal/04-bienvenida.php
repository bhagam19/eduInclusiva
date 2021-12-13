<?php
    echo '
        <div id="contenedor" onmouseover="ocultarMenu()">';
            $datosApp=array(
                array("planeaApp/00-index.php","../appsArt/planeador.png","Planeador"),
                array("eduInclusiva/00-index.php","../appsArt/DUA.png","EduInclusiva")
            );
    foreach ($datosApp as $App) {
        echo '
            <div id="boton">
                <a href='.$App[0].'><img src='.$App[1].'><p>'.$App[2].'</p></a>
            </div>
        ';
    }
    echo'
        </div>
        <div id="h2">
            <H2>¡Click y disfruta nuestras apps!</H2>
        </div>        
    ';
?>