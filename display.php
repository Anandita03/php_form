<?php
ini_set('display_errors', '1');
$servername = "localhost";
$username = "root";
$password = "root@123";
$dbname= "form";
$tablename= "form";
try 
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
// $id=$_GET['id'];        // Collecting data from query string
// if(!is_numeric($id)){ // Checking data it is a number or not
// echo "Data Error";    
// exit;
// }
// global $pdo;
$count = $dbname->prepare("select * from student where id=:id ");
$count->bindParam(":id",$id,PDO::PARAM_INT,3);



if($count->execute()){

echo " Success ";

$row = $count->fetch(PDO::FETCH_OBJ);

}

$count="SELECT *  FROM student where id=?";

if($stmt = $conn->prepare("SELECT * FROM form  WHERE id=?")){
  $stmt->bind_param('i',$id);
  $stmt->execute();

   $result = $stmt->get_result();
   echo "No of records : ".$result->num_rows."<br>";
   $row=$result->fetch_object();
   echo "<table>";
echo "
<tr bgcolor='#f1f1f1'><td><b>Name</b></td><td>$row->id</td></tr>
<tr><td><b>Class</b></td><td>$row->fname</td></tr>
<tr bgcolor='#f1f1f1'><td><b>Mark</b></td><td>$row->lname</td></tr>
<tr><td><b>Address</b></td><td>$row->email</td></tr>
<tr bgcolor='#f1f1f1'><td><b>Image</b></td><td>$row->gender</td></tr>
";
echo "</table>";

}else{
  echo $conn->error;
}
// $q="select * from form where gender='male' order  by  id ";
// echo "<table>";
// foreach ($dbname->query($sql) as $nt) {
// echo "<tr><td><a href=details.php?id=$nt[id]>$nt[name]</a></td><td>$nt[class]</td></tr>";
// }
// echo "</table>";
// $id = $_POST['id'];
// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $email = $_POST['email'];
// $gender = $_POST['gender'];

// echo $id;
// $stmt = $conn->prepare("SELECT id, firstname, lastname, email, gender FROM form"); 
//     $stmt->execute();

    // set the resulting array to associative
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
    //     echo $v;
    // }
// $disp = mysql_query("select id, firstname, lastname, email, gender from form where id = '$id'");
// while($result = $stmt->setFetchMode(PDO::FETCH_ASSOC))
//  {
    // echo "<br/> $id", $result['id'];
    // echo "<br/> $fname", $result['fname'];
    // echo "<br/> $lname", $result['lname'];
    // echo "<br/> $email", $result['email'];
    // echo "<br/> $gender", $result['gender'];
//  }



?>