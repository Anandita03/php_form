<?php
    try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, firstname, lastname, email, gender FROM form"); 
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    if($_GET['id'])
{
 deletebooking($id);

}  

function deletebooking($id){

$sql="DELETE FROM form WHERE id='".$id."'";
$result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");

}
?>