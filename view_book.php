<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

if($_SESSION['eid']=='emp'){
  header("location: login.php");
    exit;
}
?>
<?php 
 
 include 'partials/_dbconnect.php';
 $book = false;
     if(isset($_GET['book'])){
        $sno = $_GET['book'];
        $uname =  $_SESSION['pid'];
        $sql = "CALL Viewbooking()";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $TRAINNAME= $row['TRAIN_NAME'];
   
        $Nobooking=$row['no_of_booking'];
        $sql = " INSERT INTO `booking`(`P_ID`, `TRAIN_ID`,`TRAIN_NAME`,`P_NAME`,`no_of_booking`) VALUES ('$uname','$sno','$TRAINNAME','$Nobooking')";
        $result = mysqli_query($conn, $sql);
        if($result){
           $book = true;
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title>View/Book TRAIN</title>
  </head>
  <body> 
  <?php require 'partials/_nav.php' ?>
  <?php
  if($book){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> train booking successful.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }

 ?>

<h3 class= "text-center my-4" >Available Train details OF PASSENGER</h3>
<div class="container my-4">
<style>
     body, html {
         height: 160%;
   }

   body {
          /* The image used */
          background-image: url("view_book.jpg");

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

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">TRAIN ID</th>
          <th scope="col">TRAIN NAME</th>
          <th scope="col">PASSENGER ID</th>
         
          
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `booking`";
          $pid = $_SESSION['eid'];
          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>". $row['TRAIN_ID'] . "</td>
            <td>". $row['TRAIN_NAME'] . "</td>
            <td>". $row['P_ID'] . "</td>
            
         

          </tr>";
        } 
          ?>
       </tbody>
    </table>
  </div>
  <hr>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

<script>
books = document.getElementsByClassName('book');
    Array.from(books).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to book this train!?")) {
          console.log("yes");
          window.location = `/loginemp/view_book.php?book=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
 </body>
 </html>