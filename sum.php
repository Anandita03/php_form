<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script type="text/javascript">
        function validate(form)
        {
            var re = /^[0-9+]+$/;
          if (!re.test(form.sum.value))
          {
            alert('Please enter only numbers and + operator to get the output');
            return false;
          }
        }
       </script>
    </head>
    <body>
        <form method="POST" action="result.php" onsubmit="return validate(this)">
          <div class="field">
            <label class="label">Sum</label>
              <div class="control">
                <input class="input is-primary" name="sum" type="text">
              </div>
          </div>
          <div class="field">
            <div class="control">
              <input type="submit" class="button is-info" name="add" value="ADD" />
            </div>
          </div>
          </form>
    </body>
</html>

