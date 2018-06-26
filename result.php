<?php
require_once('dbconnect.php');
        $sum = htmlentities($_POST['sum']);
        if(isset($_POST['add']))
        {    
            $total = 0;
            $ln = explode("+",$sum);
         for ($i = 0; $i < count($ln); $i++)
         {
            // echo $ln[$i];
            // echo "<br/>";
            $total += $ln[$i];	 		
        }
        // echo $total;
        // exit;
        echo "Result:<input type='text' value='$total' disabled/>";	
        exit;
       
    }
try {
    $sql = "INSERT INTO res (sum) VALUES ('$sum')";
    //use exec() because no results are returned
    $conn->exec($sql);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
 ?>

