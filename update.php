<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
</head>
<body>
    <div class="box">
    <section class="container">
        <form method="POST">
            <?php
            require_once('dbconnect.php');
            $id=$_GET["id"];
            if (isset($_POST["update"])) {
                $fname=$_POST["fname"];
                $lname=$_POST["lname"];
                $email=$_POST["email"];
                $gender=$_POST["gender"];
                $creation_time= "";
                $updation_time=date('jS F g:i A');
                try {
                    $sql = "UPDATE form SET Firstname= '$fname',Lastname= '$lname', email= '$email', gender='$gender', updation_time= '$updation_time' WHERE id='$id'";
                    $stmt = $conn->prepare($sql);
                    // execute the query
                    $stmt->execute();
                    //header('location:individual_record_display');
                   echo("updated successfully!!!");
                    }
                catch(PDOException $e)
                    {
                    echo $sql . "<br>" . $e->getMessage();
                    }
                }
                $qry = $conn->prepare("SELECT * from form WHERE id=$id;"); 
                $qry->execute();
                $result = $qry->fetch();
               
            ?>
    <div class="columns ">
        <div class="column is-8 is-offset-one-fifth">
            <div class="field">
                <label class="label">ID</label>
                    <div class="control">
                        <input class="input is-primary" type="text" value="<?php echo $result['id']; ?>" disabled name="id">
                    </div>
                </div>
                <div class="field">
                    <label class="label">First Name</label>
                        <div class="control">
                            <input class="input is-primary" type="text" value="<?php echo $result['fname']; ?>" required name="fname">
                        </div>
                </div>
                <div class="field">
                    <label class="label">Last Name</label>
                        <div class="control">
                            <input class="input is-primary" type="text" value="<?php echo $result['lname']; ?>" name="lname">
                        </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                        <div class="control">
                            <input class="input is-primary" type="email" value="<?php echo $result['email']; ?>" required name="email">
                        </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="gender" value= "male">
                            Male
                        </label>
                        <label class="radio">
                            <input type="radio" name="gender" value="female">
                            Female
                        </label>
                    </div>
                </div>
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <button type="submit" name="update" class="button is-primary" >Edit</button>
                    </div>
                </div>
        </div>
    </div>
            </form>
        </section>
        </div>
    </body>
</html>