<!DOCTYPE html>
<html lang="en">
<!-- Start of head section-->
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <style>
    table, th, td {
        border: 1px solid black;
    }
    </style>
</head>
<body>
    <form action="" method="POST">
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
                $id=$_GET['id'];
                $stmt = $conn->prepare("SELECT * from form where id='$id';"); 
                $stmt->execute();
                $result = $stmt->fetch();
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
           
        ?>
<!--table displaying individual record-->        
            <table class="table is-fullwidth ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $result['id']; ?></td>
                        <td><?php echo $result['Firstname']; ?></td>
                        <td><?php echo $result['Lastname']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['gender']; ?></td>
                        <td><a href="<?php echo 'delete.php?id='.$id ?>" onclick="return confirm('Are you sure want to delete?')" title="delete" style="color:red">Delete</a></td>
                        <td><a href="<?php echo 'update.php?id='.$id ?>" style="color:blue">Edit</a></td>
                    </tr>
                </tbody>
            </table>    
        </form>
    </body>
</html>