<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> 
    <script type="text/javascript">
        function validate(form)
        {
          var re = /^[a-z,A-Z]+$/i;
          if (!re.test(form.fname.value))
          {
            alert('Please enter only letters from a to z');
            return false;
          }
          if (!re.test(form.lname.value))
          {
            alert('Please enter last name only letters from a to z');
            return false;
          }
          if (empty($_POST["email"])) {
            alert('Please fill your email');
              // $emailErr = "Email is required";
            } else {
              $email=$_POST["email"];
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = " Please enter a correct email"; 
              }
            }
          }
       </script>
  </head>
  <body>
    <div class="container">
    <div class="is-pulled-right is-clearfix"> 
    
<!--to show when we first visited the session-->
      <?php
        $inTwoMonths = 60 * 60 * 24 * 60 + time();
        // echo time() + 5184000;
        setcookie('lastVisit', date('jS F g:i A'), $inTwoMonths);
        if(isset($_COOKIE['lastVisit']))
        {
        $visit = $_COOKIE['lastVisit'];
        echo "Your last visit was - ". $visit;
        echo "\n";
        }
        else
        echo "You've got some stale cookies!";
      ?>
<!--to show how much time elapsed when we first visited the session-->    
      <?php
        echo "<br>";
        $time = strtotime('2018-06-21 10:52:43');
        // echo $time;
        echo "\n";
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
    </div>
<!--the main form starts here-->
    <div class="box">
      <div class="columns ">
        <div class="column is-8 is-offset-one-fifth">
          <h1 class="title has-text-centered">Registration Form</h1>
          <form method="POST" action="form_display.php" onsubmit="return validate(this)">
          <div class="field">
            <label class="label ">ID</label>
              <div class="control">
                <input class="input is-primary" name="id" type="text" id="name" placeholder="">
              </div>
          </div>
          <div class="field">
            <label class="label ">First Name</label>
              <div class="control">
                <input class="input is-primary" name="fname" type="text" id="fname" placeholder="Input Name">
                <?php echo $nameErr;?>
              </div>
          </div>
          <div class="field">
            <label class="label">Last name</label>
              <div class="control">
                <input class="input is-primary" name="lname" type="text" id="name" placeholder="Input Name">
                <?php echo $nameErr;?>
              </div>
          </div> 
          <div class="field">
            <label class="label">Email</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="email" name="email" id="email"  placeholder="Email input" required>
                <?php echo $emailErr;?>
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                  <i class="fas fa-exclamation-triangle"></i>
                </span>
              </div>
          </div>
          <div class="field">
            <div class="label">Gender</div>
              <div class="control">
                <label class="radio">
                  <input type="radio" id="gen" value="Male" name="gender">
                  MALE
                </label>
                <label class="radio">
                  <input type="radio" id="gen" value="Female" name="gender">
                  FEMALE
                </label>
              </div>
          </div>
          <div class="field">
            <div class="control">
              <input type="submit" class="button is-info" name="submit" id="submit"  value="submit" />
            </div>
          </div>
        </form>
      </div>
      </div>
    </div>
<!--the form ends here-->
  </body>
</html>




