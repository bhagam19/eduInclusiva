<?php
    include dirname(__FILE__).'../../../01-mdl/cnx.php';
    switch ($case){
        case "columnas":
            $consulta1="SHOW COLUMNS FROM ".$tbl;
        break;
        case 'direccion':
            $consulta1="SELECT * FROM ".$tbl." ORDER BY ".$campo." ".$direccion;
        break;
        case 'todo':
            $consulta1="SELECT * FROM $tbl";
        break;
        case 'id':
            $consulta1="SELECT * FROM $tabla WHERE id=$id";
        break;         
        case 'innerJoinx2':
            $consulta1="SELECT ".$clmnSeleccionar." 
                        FROM ".$t1." 
                        INNER JOIN ".$t2." 
                        ON ".$t2.".".$p21." = ".$t1.".".$p12." ".$condiciones." ORDER BY ".$t1.".id ASC"
            ;
        break;       
        case 'innerJoinx3':
            $consulta1="
                        SELECT ".$t3.".".$p32." 
                        FROM ".$t1." 
                        INNER JOIN ".$t2." 
                        ON ".$t2.".".$p21." = ".$t1.".".$p1." 
                        INNER JOIN ".$t3." 
                        ON ".$t3.".".$p31." = ".$t2.".".$p22." 
                        WHERE ".$t1.".".$p1." = ".$id
            ;
        break;       
        case 'innerJoinx4con3':
            $consulta1="
                        SELECT ".$t3.".".$p32.", ".$t4.".".$p42.", ".$t4.".".$p43."
                        FROM ".$t1." 
                        INNER JOIN ".$t2." 
                        ON ".$t2.".".$p23." = ".$t1.".".$p1." 
                        INNER JOIN ".$t3." 
                        ON ".$t3.".".$p31." = ".$t2.".".$p21." 
                        INNER JOIN ".$t4."
                        ON ".$t4.".".$p41." = ".$t2.".".$p22." 
                        WHERE ".$t1.".".$p1." =$id AND ".$t4.".".$p42." = 1
            ";
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
                        WHERE ".$t1.".".$p1." = ".$id
            ;
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
                        WHERE ".$t1.".".$p1." = ".$id
            ;
        break;
        case 'esfk':
            $consulta1="
                SELECT COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE 
                WHERE information_schema.KEY_COLUMN_USAGE.TABLE_SCHEMA = 'Adolfo_eduinclusiva' 
                AND information_schema.KEY_COLUMN_USAGE.TABLE_NAME = '".$tbl."'
                AND information_schema.KEY_COLUMN_USAGE.CONSTRAINT_NAME != 'PRIMARY'
            ";
        break;
    }
    try{
        $query1 = $cnx->query($consulta1);
        @$cont1=mysqli_num_rows($query1);
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
        $cont1=0;
    }
    mysqli_close($cnx);  
?>