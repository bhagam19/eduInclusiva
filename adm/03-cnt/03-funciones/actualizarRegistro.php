<?php
    function isValidJSON($str) {
        json_decode($str);
        return json_last_error() == JSON_ERROR_NONE;
    }    
    $json_params = file_get_contents("php://input");    
    if (strlen($json_params) > 0 && isValidJSON($json_params)){
        $decoded_params = json_decode($json_params);
        $tbl = $decoded_params->tbl;
        $registroID = $decoded_params->registroID;
        $campo = $decoded_params->campo;
        $valor = $decoded_params->valor;
    }
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    $consulta="UPDATE ".$tbl." SET ".$campo."='".$valor."' WHERE id=".$registroID;    
    echo "<br>".$consulta."<br>";
    $msg="";
    if (!$cnx->query($consulta)) {
        $msg = $cnx->errno;
        $msg.= " ". $cnx->error;
        echo $msg;
    }

    mysqli_close($cnx);
?>