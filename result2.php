<?php
require_once('dbconnect.php');
        $diff = htmlentities($_POST['diff']);
        if(isset($_POST['sub']))
        {    
            // $total = 0;
            $ln = explode("-",$diff);
            echo array_diff($ln);
            //$ln = explode("+",$sum);
            // echo strcspn("sum","-");
        //  for ($i = 0; $i < count($ln); $i++)
        //  {
        //     // echo $ln[$i];
        //     // echo "<br/>";
        //     $total += $ln[$i];	 		
        // }
        // // echo $total;
        // // exit;
        // echo "Result:<input type='text' value='$total' disabled/>";	
        exit;
       
    }
try {
    $sql = "INSERT INTO res (sum) VALUES ('$diff')";
    //use exec() because no results are returned
    $conn->exec($sql);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
 ?>

