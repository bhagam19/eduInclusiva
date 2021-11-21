<?php
    switch ($case){
        case 'todo':
            $consulta1="SELECT * FROM $tabla";
            $query1 = $cnx->query($consulta1);
            $cont1=mysqli_num_rows($query1);
        break;
        case 'id':
            $consulta1="SELECT * FROM $tabla WHERE id=$id";
            $query1 = $cnx->query($consulta1);
            $cont1=mysqli_num_rows($query1);
        break;
    }