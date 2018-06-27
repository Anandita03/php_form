<?php
 ini_set('display_errors', '1');
require_once('dbconnect.php');
    $sum = htmlentities($_POST['sum']);
    if(isset($_POST['add']))
    {    
 
// by using array function
            // $total = 0;
            // $ln = explode("+",$sum);
            // echo array_sum($ln);


//by using for loop
        //  for ($i = 0; $i < count($ln); $i++)
        //  {
        //     // echo $ln[$i];
        //     // echo "<br/>";
        //     $total += $ln[$i];	 		
        // }
        // // echo $total;
        // // exit;
        // echo "Result:<input type='text' value='$total' disabled/>";	

//calculation of addition and subtraction
        function calculate_string($mathString)   
        {
            $mathString = trim($mathString);     // trim white spaces
            $compute = create_function("", "return (" . $mathString . ");" );
            return 0 + $compute();
        }
            echo calculate_string($sum);   
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

