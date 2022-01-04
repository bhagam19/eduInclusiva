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
    }
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    $consulta="DELETE FROM ".$tbl." WHERE id=".$registroID;
    //echo "<br>".$consulta."<br>";
    $msg="";
    if (!$cnx->query($consulta)) {
        $msg = $cnx->errno;
        $msg.= " ". $cnx->error;
        echo $msg;
    }

    /*
    try {
        //$cnx->query($consulta);
        
    } catch (Exception $e) {
        $respuesta.="<br>".$e->getMessage();
    }*/
mysqli_close($cnx);
?>