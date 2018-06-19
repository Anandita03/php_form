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
</head>
  <body>
    <div class="container">
      <form method="POST" action="process.php">
        <div class="field">
          <label class="label ">ID</label>
            <div class="control">
              <input class="input is-primary" name="id" type="text" id="name" placeholder="">
            </div>
        </div>
        <div class="field">
          <label class="label ">Name</label>
            <div class="control">
              <input class="input is-primary" name="fname"type="text" id="name" placeholder="Input Name">
            </div>
        </div>
        <div class="field">
          <label class="label">last name</label>
            <div class="control">
              <input class="input is-primary" name="lname"type="text" id="name" placeholder="Input Name">
            </div>
        </div> 
        <div class="field">
          <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" type="email" name="email" id="email"  placeholder="Email input">
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
  </body>
</html>




