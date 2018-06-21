<?php
$servername = "localhost";
$username = "root";
$password = "root@123";
$dbname= "form";
$tablename= "form";
//check connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
$id=$_GET['id'];
try {
    $sql = "DELETE FROM form WHERE id=$id";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo 'alert("Record deleted successfully");';
    //header("Location:form_display.php");

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>