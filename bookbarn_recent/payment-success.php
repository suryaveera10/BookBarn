<?php
  include("connection.php");
  
  $host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookbarn";

 
// Create connection
$connect = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    $email=$_GET['email'];
    $id=$_GET['id'];
    ?>
<!DOCTYPE html>
<html>
<head>
<title>Thank You - Tutsmake</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body class="">
<br><br><br><br>
<article class="bg-secondary mb-3">  
<div class="card-body text-center">
<h4 class="text-white">Thank you for payment<br></h4>
<br>
<p><a class="btn btn-warning" target="" href="home.html?email=<?php echo $email ?>"> Back  
<i class="fa fa-window-restore "></i></a></p>
</div>
<br><br><br> 
</article>
</body>
</html> 