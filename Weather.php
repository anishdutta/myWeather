<?php
    if( $_GET['city']){
        $city = str_replace(' ', '', $_GET['city']);
        $file_headers = @get_headers("http://www.completewebdevelopercourse.com/locations/".$city);
       if(!$file_headers[0]) {
    
            $error = "That city could not be found.";

        } else {
        $forecast_page = file_get_contents("http://www.completewebdevelopercourse.com/locations/".$city);
        $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecast_page);
        $secondPageArray = explode('</span></span></span></p><div class="forecast-cont"><div class="units-cont">', $pageArray[1]);
        $weather=  $secondPageArray[0];
        
    }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <style>
    html { 
  background: url(https://images.unsplash.com/photo-1476610182048-b716b8518aae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1127&q=80) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
    body{
        background : none;
    }
    .container{
        text-align: center;
              margin-top: 100px;
              width: 450px;
              
    }
    #input{
        margin-top : 20px;
    }
    #submit1{
        margin-top : 20px;

    }
  </style>
  <body>
  <div class="container">
    <h1>What's the weather?</h1>
    <h4>Enter the name of a city</h4>
    <form>
  <fieldset class="form-group">
      
    <input id="input" name="city" type="text" class="form-control" placeholder="ex:- Delhi, Kolkata">
    <button id="submit1" type="submit"  class="btn btn-primary">Submit</button>
    </fieldset>
    </form>
    <div id="weather">
    <?php 
              
              if ($weather) {
                  
                  echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
                  
              } else if ($error) {
                  
                  echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                  
              }
              
    ?>
    </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>