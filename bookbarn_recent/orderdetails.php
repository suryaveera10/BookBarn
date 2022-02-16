<?php
include("connection.php");

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookbarn";

 
// Create connection
$connect = new mysqli ($host, $dbusername, $dbpassword, $dbname);
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Book Barn</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="orderdetails.css">
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 
 
  </head> 
  <body>
    <header>
      <nav id="header-nav" class="navbar navbar-default">
        <div class="container">

          <div class="navbar-header">
            <a href="adminhome.html" class="pull-left visible-md visible-lg">
              <div id="logo-img" alt="logo image">
              </div>
            </a>

            <div class="navbar-brand">
              <a href="adminhome.html">
                <h1>Book Barn</h1>
              </a>
            </div>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div id="collapsable-nav" class="collapse navbar-collapse">
            <ul id="nav-list" class="nav navbar-nav navbar-right">
              
              <li>
                <a href='addadmin.html'>
                  <button style="font-size:26px;background-color:#333333">Add admin<i class='fas fa-user-plus'></i></button>
                  <br class="hidden-xs">
                </a>
              </li>

              <li>
                <a href='login.html'>
                  <span class="glyphicon glyphicon-user"></span>
                  <br class="hidden-xs"><div>...</div><div>LOGOUT</div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
<!---END OF NAVBAR---->
  <div class="container">

    <?php

                $query = "SELECT *  FROM `orderdetails` WHERE order_id=".$_GET['id']." ";  
                $result = mysqli_query($connect,$query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>

    <div class="tile">
      <div class="tile1">
        <div id="b">ORDER DETAILS</div>

        <div>Order number&nbsp;: <?php echo $row["order_id"]; ?></div>
        <div>product id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $row["product_id"]; ?></div>
        <div>Book name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $row["book_name"]; ?></div>
        <div>price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $row["amount"]; ?></div>
        <div>payment id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $row["payment_id"]; ?></div>

        <div class="buyer">
          <div id="b">BUYER</div>
          <div><span>buyer user-id&nbsp;&nbsp;&nbsp;: <?php echo $row["c_userid"]; ?></span></div>
          <div>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row["c_uname"]; ?></div>
          <div>Email id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row["c_email"]; ?></div>
          <div>Phone Number&nbsp;: <?php echo $row["c_phone"]; ?></div>
          <div>Buyer(Delivery) Address : <?php echo $row["c_add"]; ?></div>
        </div>

        <div class="seller">
          <div id="b">SELLER</div>
          <div><span>seller user-id : <?php echo $row["s_userid"]; ?></span></div>
          <div>Name : <?php echo $row["s_uname"]; ?></div>
          <div>Email id : <?php echo $row["s_email"]; ?></div>
          <div>Phone Number : <?php echo $row["s_phone"]; ?></div>
          <div>seller Address : <?php echo $row["s_add"]; ?></div>
        </div>
      </div>
    </div>
    <?php  
                     }  
                   
                }  
                ?>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>