<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $pid = uniqid();
    $pasname = $_POST["pasname"];
    $phno= $_POST["phno"];
    $address= $_POST["address"];
    $password =$_POST["password"];
    $cpassword =$_POST["cpassword"];
    $exists=false;
      if(($password==$cpassword) &&  $exists== false){
        $sql="INSERT INTO `pas` (`P_ID`, `P_NAME`, `PH_NO`, `Address`, `PASSWORD`) VALUES ('$pid', '$pasname', '$phno','$address', '$password')";
        $result = mysqli_query($conn,$sql);
        if ($result){
            $showAlert = true;
        }
        else{
          $showError = "Username already exists";
        }
      }
    else{
          $showError  = "Passwords did not match";

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
  
  <?php require 'partials/_nav.php' ?>
  <?php
  if($showAlert){
  echo  '  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Account has been created and you can login.Your Passenger ID is '. $pid.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div> ';
  }
  if($showError){
    echo  '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>'. $showError.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div> ';
  }  
  ?>
  
   <div class="container ">
    <h1 class="text-center">Signup to our website</h1>
    <form action="/loginemp/signup.php" method="post" style="display: flex;
    flex-direction: column;
    align-items: center;
    padding:15px">
    </div>
    <style>
     body, html {
         height: 160%;
   }

   body {
          /* The image used */
          background-image: url("train1.jpg");

         /* Full height */
          height: 100%;

          /* Center and scale the image nicely */
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
         }
          .form-control{
            border-radius:25px;
          }
          .btn{
            border-radius:25px;
          }
     </style> 
 
  <div class="form-group col-md-4">
    <label for="pasname">Passengers Name</label>
    <input type="pasname" class="form-control" id="pasname" name="pasname">
    <small id="emailHelp" class="form-text text-muted">Please enter your Name.</small>
    </div>
  <div class="form-group col-md-4">
    <label for="phno">Phone Number</label>
    <input type="phno" class="form-control" id="phno" name="phno">
    <small id="emailHelp" class="form-text text-muted">Enter your Passenger Phone Number.</small>
  </div>
  <div class="form-group col-md-4">
    <label for="address">Address</Address></label>
    <input type="address" class="form-control" id="address" name="address">
    <small id="emailHelp" class="form-text text-muted">Enter your Passenger address.</small>
  </div>
  <div class="form-group col-md-4">
    <label for="password">Enter your Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <small id="emailHelp" class="form-text text-muted">Enter your Password.</small>
  </div>
  <div class="form-group col-md-4">
    <label for="cpassword">Confirm your Password</label>
    <input type="password" class="form-control" id="cpassword"  name="cpassword">
    <small id="emailHelp" class="form-text text-muted">confirm your Password.</small>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">SignUp</button>
  </form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
</body>
</html>