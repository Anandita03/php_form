<?php
ini_set('display_errors', '1');
if(filter_has_var(INPUT_POST,'submit')){
    echo 'The details submitted are the following:';
}
if(isset($_POST['submit'])){
    echo "<br>";
    echo 'Id:';
    $id = htmlentities($_POST['id']);
    echo $id;
    echo "<br>";
    echo "<br>";
    echo 'firstname:';
    $fname = htmlentities($_POST['fname']);
    echo $fname;
    echo "<br>";
    echo 'lastname:';
    $lname = htmlentities($_POST['lname']);
    echo $lname;
    echo "<br>";
    echo 'Email:';
    $email = htmlentities($_POST['email']);
    echo $email;
    echo "<br>";
    echo 'Gender:';
    $gender = htmlentities($_POST['gender']);
    echo $gender;  
}
//declaring sever,user,database name
$servername = "localhost";
$username = "root";
$password = "root@123";
$dbname= "form";
$tablename= "form";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>Email</th><th>Gender</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
   function __construct($it) { 
       parent::__construct($it, self::LEAVES_ONLY); 
   }

   function current() {
       return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
   }

   function beginChildren() { 
       echo "<tr>"; 
   } 

   function endChildren() { 
       echo "</tr>" . "\n";
   } 
} 
//check connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO form (id, firstname, lastname, email, gender)
    VALUES ('$id','$fname','$lname','$email','$gender')";
    //use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    echo "Connected successfully"; 
    $stmt = $conn->prepare("SELECT id, firstname, lastname, email, gender FROM form"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
// $conn = null;
echo "</table>";

// foreach ($dbname->query($sql) as $nt) {
//     echo "<tr><td><a href=details.php?id=$nt[id]>$nt[fname]</a></td><td>$nt[lname]</td></tr>";
//     }
//     echo "</table>";
    // $sql = "INSERT INTO form (id, firstname, lastname, email, gender)
    // VALUES ('$id','$fname','$lname','$email','$gender')";
    // // use exec() because no results are returned
    // $conn->exec($sql);
    // echo "New record created successfully";
    // echo "Connected successfully"; 
    // }
// catch(PDOException $e)
//     {
//     echo "Connection failed: " . $e->getMessage();
//     }
//display records in table

// $q = $_GET['q'];

// $con = mysqli_connect('localhost','root','root@123','form');
// if (!$con) {
//     die('Could not connect: ' . mysqli_error($con));
// }

// mysqli_select_db($con,"ajax_demo");
// $sql="SELECT * FROM form WHERE id = '".$q."'";
// $result = mysqli_query($con,$sql);

// echo "<table>
// <tr>
// <th>Id</th>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Email</th>
// <th>Gender</th>
// </tr>";
// while($row = mysqli_fetch_array($result)) {
//     echo "<tr>";
//     echo "<td>" . $row['id'] . "</td>";
//     echo "<td>" . $row['fname'] . "</td>";
//     echo "<td>" . $row['lname'] . "</td>";
//     echo "<td>" . $row['Email'] . "</td>";
//     echo "<td>" . $row['Gender'] . "</td>";
//     echo "</tr>";
// }
// echo "</table>";
    








//connection through mysqli
// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// $id= mysqli_real_escape_string($conn,$_POST['id']); 
// $fname= mysqli_real_escape_string($conn,$_POST['fname']);
// $lname= mysqli_real_escape_string($conn,$_POST['lname']);
// $email= mysqli_real_escape_string($conn,$_POST['email']);
// $gender=mysqli_real_escape_string($conn,$_POST['gender']);

// $sql = "INSERT INTO form (id, firstname, lastname, email, gender)
// VALUES ('$id', '$fname', '$lname', '$email', '$gender')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
$conn=null;
// $conn->close();
  
?>
<?php

$servername = "localhost";
  $username = "root";
  $password = "root@123";
  $dbname = "form";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $count = $conn->query("SELECT count(1) FROM form")->fetchColumn();
  
  echo "total number of records entered:".$count;
?>
<html>
<head>
<script>
          function Deleteqry(id)
          { 
           if(confirm("Are you sure you want to delete this row?")==true)
           window.location="delete.php?del="+id;
           return false;
          }
    </script>
</head>
<body>
<input type="button" name="abc" id="abc" value="delete" onclick="return Deleteqry(<?php echo $id ?>);"/>
</body>
</html>