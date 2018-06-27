<?php
require_once('dbconnect.php');
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