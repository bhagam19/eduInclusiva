<?php
    $n=0;
    $m=1;
    $k=1;
    $medicaments[$m]=$medicamentos[$n];
    $horaris[$m][$k]=$horario[$n];
    $comp=$medicamentos[$n];
    while($n<count($medicamentos)-1){
        $n++;
        if(strcmp($medicamentos[$n], $comp)==0){
            $k++;
            $horaris[$m][$k]=$horario[$n];
            $comp=$medicamentos[$n];
        }else{
            $m++;
            $medicaments[$m]=$medicamentos[$n];
            $k=1;
            $horaris[$m][$k]=$horario[$n];
            $comp=$medicaments[$m];
        }
    }
?>