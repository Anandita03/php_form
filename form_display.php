<?php
require_once('dbconnect.php');
?>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<!--to show when we first visited the session-->
<?php
    $inTwoMonths = 60 * 60 * 24 * 60 + time();
    setcookie('lastVisit', date('jS F g:i A'), $inTwoMonths);
    if(isset($_COOKIE['lastVisit']))
    
    {
    $visit = $_COOKIE['lastVisit'];
    echo "Your last visit was - ". $visit;
    }
    else
    echo "You've got some stale cookies!";
?>
<!--to show how much time elapsed when we first visited the session-->   
<?php
    echo "<br>";
    $time = strtotime('2018-06-20 17:40:43');
    echo 'you visited the page '.humanTiming($time).' ago';
    function humanTiming ($time)
    {
        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
    }
?>
<!--to take input of the form from the users-->
<?php
    
    ini_set('display_errors', '1');
    if(filter_has_var(INPUT_POST,'submit')){
        echo"<br>";
        echo 'The details submitted are the following:';
    }
     if(isset($_POST['submit'])){
       echo "<br>";
        echo 'Id:';
        $id = htmlentities($_POST['id']);
        echo $id;
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
        if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)) {
            echo "$email is a valid email address";
            }
            else
            {
              echo "$email is NOT a valid email address";
            }
        echo "<br>";
        echo 'Gender:';
        $gender = htmlentities($_POST['gender']);
        echo $gender;
        echo "<br>";
        echo "Creation_time:" ;
        $creation_time=date('jS F g:i A');
        echo $creation_time; 
        echo "<br>";
        echo "Updation_time:" ;
        $updation_time=date('jS F g:i A');
        echo $updation_time; 
    }
    try {
        $sql = "INSERT INTO form (id, Firstname, Lastname, email, gender, creation_time, updation_time)
        VALUES ('$id','$fname','$lname','$email','$gender','$creation_time' ,'$updation_time')";
        //use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        echo "Connected successfully"; 
    }
    catch(PDOException $e) {
        //echo "Error: " . $e->getMessage();
    }
   
?>
<?php
    try {
        $stmt = $conn->prepare("SELECT * FROM form;"); 
        $stmt->execute();
// set the resulting array to associative
        }
        catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
?>
<!--table displaying the records-->
<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Creation_time</th>
            <th>Updation_time</th>
        </tr>
    </thead>   
    <tbody>
        <?php while( $result = $stmt->fetch()) : ?>
            <tr>
                <td><?php echo $result['id']; ?></td>
                <td><a href="<?php echo 'individual_record_display.php?id='.$result['id'] ?>"><?php echo $result['Firstname']; ?></a></td>
                <td><?php echo $result['Lastname']; ?></td>
                <td><?php echo $result['email']; ?></td>
                <td><?php echo $result['gender']; ?></td>
                <td><?php echo $result['creation_time']; ?></td>
                <td><?php echo $result['updation_time']; ?></td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table> 
<!--to show how much records are entered in the table--> 
<?php
    $count = $conn->query("SELECT count(1) FROM form")->fetchColumn();
    echo "Total number of records entered:".$count;
?>
</body>
</html>






























  