<?php
    $j=0;    
    while($flq2=mysqli_fetch_row($query2)){   //$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.
        $rc=count($flq2);
        //echo "<br>Está contando ".$rc." celdas.<br>";
        $fk=$flq2[0];
        $tblRef=$flq2[1];
        $campoRef=$flq2[2];
        $camposFK[]=$fk;
        $indiceFk = array_search("$fk", $campos);
        echo "<br><br> ".$j.": \$query2 contiene el nombre de los campos con FK = ".$fk." || ".$tblRef." || ".$campoRef." || "."<br>";
        echo "<br> El índice del campo '".$fk."' en la tabla '".$tbl."' es: ".$indiceFk;
        include dirname(__FILE__).'../../../01-mdl/cnx.php';
        $clmns=$cnx->query("SHOW COLUMNS FROM ".$tblRef);
        $todosCampos=array();
        $nomCampoRef; //Al parecer esta variable no se está utilizando. Revisar si se puede eliminar.
        $i=0;
        while($fl=mysqli_fetch_row($clmns)){
            $todosCampos[$i] = $fl[0];
            $i++;
        }
        echo "<br><br> ".$j.": ".$fk." ".$tblRef." ".$campoRef." ".$todosCampos[1]."<br>";
        $case="innerJoinx2";
        $id=1;
        $t1=$tbl;
        $p11="id";
        $p12=$fk;
        $t2=$tblRef;
        $p21=$campoRef;
        if ($tblRef!="estudiantes" && $tblRef!="usuarios") {
            $clmnSeleccionar=$t2.".".$todosCampos[1];
        }elseif($tblRef=="estudiantes"){
            $clmnSeleccionar=$t2.".".trim($todosCampos[1]).", ".$t2.".".trim($todosCampos[2]).", ".$t2.".".trim($todosCampos[3]).", ".$t2.".".trim($todosCampos[4]);
        }elseif($tblRef=="usuarios"){
            $clmnSeleccionar=$t2.".".trim($todosCampos[6]).", ".$t2.".".trim($todosCampos[7]);
        }
        //echo "<br><br>".$clmnSeleccionar;
        include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
        echo "<br><br> La consulta SQL que realiza es: <br>".$consulta1."<br>";
        $contenido="";
        $cFK=0;
        while($fl=mysqli_fetch_row($query1)) {
            $rc=count($fl);
            //echo "<br>Está contando ".$rc." celdas.<br>";
            $contenido="";
            for($r=0; $r<$rc; $r++) { 
                $contenido.=$fl[$r]." ";
            } 
            $contenidosFK[$j]=$contenido;
            echo "<br>".$contenido;           
            $cFK++;
        }
        
        
        echo "<br><br> =====================".$j.": llega hasta acá =====================<br><br><br>";        
        $j++;	
    }
    echo "<br><br><br><br>";    
    //#################### Aquí inicia el html #############
    //#################### En esta fila se incluye el formulario para nuevos registros. #############
    //#################### Entonces, no aplica para las tablas con FK. Por lo tanto debe borrarse, luego, de este archivo. #############
    /*
    $respuesta.='	
		<tr class="stickyHead3">							
			<td class="sticky1">Nuevo:</td>
				';
	for($i=1;$i<count($campos);$i++){
		$respuesta.='
			<td class="sticky'.($i+1).'"><input type="text" name"'.$campos[$i].'" id="'.$campos[$i].'" style="" onkeyup="cambiarFondoInput(this.id)"></td>					
		';
	}
	$respuesta.='
			<td class="img"><img src="../appsArt/okOn.png" title="Guardar" onclick="registrarDiscapacidad()"/></td>
		</tr> 
	';
    */
    //#################### Las tablas con FK, como sería el caso para este archivo "cargarTablaFK1.php", inician realmente aquí. #############
    $case="todo";
	include dirname(__FILE__).'../../../03-cnt/03-funciones/buscarEnBD.php';
    echo "<br><br>".$consulta1; 
    while($flq1=mysqli_fetch_array($query1)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.
		$respuesta.='
			<tr>
		';
		for($i=0;$i<count($campos);$i++){
            $campoAVerificar=$campos[$i];
            $retorno=esFK($campoAVerificar,$i);
			if($i==0){
				$respuesta.='
				<!--<td class="sticky'.($i+1).'" id"">'.$retorno.'</td>-->
                <td class="sticky'.($i+1).'" id"">'.$retorno.'</td>					
				';
			}else{
				$respuesta.='
					<td class="sticky'.($i+1).'" style="text-align:left">
						<img style="width:10px;height:10px;!important" title="Click para modificar" src="../appsArt/editarOn.png" onclick="actualizarInputUsuario(this.parentNode.id,'.$retorno.',\'nombres\',\'nombresAct'.$retorno.'\')">
						'.$retorno.'
					</td>				
				';				
			}
		}
		$respuesta.="	
			<td class='img'>				
				<img src='../appsArt/eliminarOn.png' title='Eliminar' onclick='eliminarRegistros(".$flq1[0].", \"".trim($tbl)."\", ".json_encode($campos).")'/>
				<!--<img src='../appsArt/eliminarOn.png' title='Eliminar' onclick='eliminarRegistros2()'/>-->
			</td>			
		</tr>
		";		
	}
	echo $respuesta;
?>