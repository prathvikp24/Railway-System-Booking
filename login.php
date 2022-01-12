<?php
$showError = false;
$login=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $pid = $_POST["pid"];
    $password =$_POST["password"];
    $sql = "Select * from pas where P_ID='$pid' AND PASSWORD='$password'";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      if($num==1){                                                       
        $login=true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['pid'] = $pid;
        header("location: welcome_pas.php");
      }

      else{
        $showError="Invalid credentials";
      }
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      include 'partials/_dbconnect.php';
      $eid = $_POST["eid"];
      $epassword =$_POST["epassword"];
      $sql="Select * from emp where E_ID='$eid' AND E_PASSWORD='$epassword'";
        $result = mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        if($num==1){
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['eid'] = $eid;
          header("location: welcome_emp.php");
        }
        else{
          $showError="Invalid credentials";
        }
      }
  ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,  shrink-to-fit-no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"   integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<title>Login </title>
<style>
     body, html {
         height: 130%;
   }

   body {
          /* The image used */
          background-image: url("Bullet-Train-1.jpg");

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
</head>
<body>
  <?php require 'partials/_nav.php' ?>
  
  <?php
  if($login){
  echo  '  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>.You are logged in.
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

  <div class="container my-4">
    <h1 class="text-center">Employee/Passenger Login</h1>
    <form action="/loginemp/login.php" method="post" style="display: flex;
    flex-direction: column;
    align-items: center;
    padding:15px">
    </div>
    <div class="form-group col-md-4">
    <b><label for="pid"> Passenger ID</label></b>
    <input type="pid" class="pid" id="pid" name="pid">
    <b><small id="emailHelp" class="form-text text-muted">Please enter your Passenger ID.</small></b>
  </div>
  <div class="form-group col-md-4">
    <b><label for="eid"> Employeee ID</label></b>
    <input type="eid" class="eid" id="eid" name="eid">
    <b><small id="emailHelp" class="form-text text-muted">Please enter your Employee ID.</small></b>
  </div>
  <div class="form-group col-md-4">
    <b><label for="password">Enter your Passenger Password</label></b>
    <input type="password" class="form-control" id="password" name="password">
    <b><small id="emailHelp" class="form-text text-muted">Enter your Passenger Password.</small></b>
  </div>
  <div class="form-group col-md-4">
    <b><label for="epassword">Enter your Employee Password</label></b>
    <input type="password" class="form-control" id="epassword" name="epassword">
    <b><small id="emailHelp" class="form-text text-muted">Enter your Employee Password.</small></b>
  </div>
  
  <button type="submit" class="btn btn-primary ">Login</button>

  

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