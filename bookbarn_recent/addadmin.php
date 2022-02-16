<?php
session_start();

include("connection.php");
include("functions.php");
 
$uname1 = $_POST['uname1'];
$email  = $_POST['email'];
$phone  = $_POST['phone'];
$upswd1 = $_POST['upswd1'];
$upswd2 = $_POST['upswd2']; 

   

if (!empty($uname1) || !empty($email) || !empty($phone) || !empty($upswd1) || !empty($upswd2) )
{



if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $user_id = random_num(20);
  $role = "admin";
  $SELECT = "SELECT email From reg Where email = ? Limit 1";
  $INSERT = "INSERT Into reg (user_id,uname1 , email , phone, upswd1, upswd2, role )values('$user_id',?,?,?,?,?,'$role')";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $uname1,$email,$phone,$upswd1,$upswd2);
      $stmt->execute();
      header("Location: adminhome.html");
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
