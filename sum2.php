<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script type="text/javascript">
        // function validate(form)
        // {
          //   var re = /^[0-9-]+$/;
          // if (!re.test(form.diff.value))
          // {
          //   alert('Please enter only numbers and + operator to get the output');
          //   return false;
          // }
          function calculate_string( $mathString )    {
            $mathString = trim($mathString);     // trim white spaces
            $mathString = ereg_replace ('[^0-9\+-\*\/\(\) ]', '', $mathString);    // remove any non-numbers chars; exception for math operators
        
            $compute = create_function("", "return (" . $mathString . ");" );
            return 0 + $compute();
        }
        
         $string = " (1 + 1) * (2 + 2)";
        echo calculate_string($string);  // outputs 8  

        // }
       </script>
    </head>
    <body>
        <form method="POST" action="" onsubmit="return calculate_string(this)">
          <div class="field">
            <label class="label">difference</label>
              <div class="control">
                <input class="input is-primary" name="diff" type="text">
              </div>
          </div>
          <div class="field">
            <div class="control">
              <input type="submit" class="button is-info" name="sub" value="Subtract" />
            </div>
          </div>
          </form>
    </body>
</html>