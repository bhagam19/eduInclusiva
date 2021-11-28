<?php
    $n=0;
    $m=1;
    $k=1;
    $medicaments[$m]=$medicamentos[$n];
    $horaris[$m][$k]=$horario[$n];
    $comp=$medicamentos[$n];
    while($n<count($medicamentos)){
        $n++;
        echo '<br> n:'.$n.' m:'.$m.' k:'.$k.'   '.$medicaments[$m].'---->'.$horaris[$m][$k].'<br>';
        if(strcmp($medicamentos[$n], $comp)==0){
            $horaris[$m][$k]=$horario[$n];
            $k++;
        }else{
            $m++;
            $medicaments[$m]=$medicamentos[$n];
            $k=1;
            $horaris[$m][$k]=$horario[$n];
            $comp=$medicaments[$m];
        }
    }
?>