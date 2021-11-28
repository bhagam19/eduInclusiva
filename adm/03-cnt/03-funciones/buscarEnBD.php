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
        case 'innerJoinx4':
            $consulta1="
                        SELECT ".$t4.".".$p42." 
                        FROM ".$t1." 
                        INNER JOIN ".$t2." 
                        ON ".$t2.".".$p2." = ".$t1.".".$p1." 
                        INNER JOIN ".$t3." 
                        ON ".$t3.".".$p31." = ".$t2.".".$p2." 
                        INNER JOIN ".$t4."
                        ON ".$t4.".".$p41." = ".$t3.".".$p32." 
                        WHERE ".$t1.".".$p1." =$id";
            $query1 = $cnx->query($consulta1);
            $cont1=mysqli_num_rows($query1);
        break;
        case 'innerJoinx6':
            $consulta1="
                        SELECT ".$t4.".".$p42.", ".$t6.".".$p62." 
                        FROM ".$t1." 
                        INNER JOIN ".$t2." 
                        ON ".$t2.".".$p2." = ".$t1.".".$p1." 
                        INNER JOIN ".$t3." 
                        ON ".$t3.".".$p31." = ".$t2.".".$p2." 
                        INNER JOIN ".$t4."
                        ON ".$t4.".".$p41." = ".$t3.".".$p32."
                        INNER JOIN ".$t5."
                        ON ".$t5.".".$p51." = ".$t3.".".$p33."
                        INNER JOIN ".$t6."
                        ON ".$t6.".".$p61." = ".$t5.".".$p52."
                        WHERE ".$t1.".".$p1." =$id";
            $query1 = $cnx->query($consulta1);
            $cont1=mysqli_num_rows($query1);
        break;
    }