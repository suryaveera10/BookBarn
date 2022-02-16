<?php
 
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookbarn";
 
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


$payment_id = $_POST['razorpay_payment_id'];
$amount = $_POST['totalAmount'];
$product_id = $_POST['product_id'];
$bname = $_POST['bname']; 
$sid = $_POST['sid'];
$sname = $_POST['sname'];
$se = $_POST['se'];
$sphone = $_POST['sphone'];
$sadd = $_POST['sadd'];
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$ce = $_POST['ce'];
$cphone = $_POST['cphone'];
$cadd = $_POST['cadd'];

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $INSERT = "INSERT INTO orderdetails(product_id,book_name,amount,payment_id,s_userid,s_uname,s_email,s_phone,s_add,c_userid,c_uname,c_email,c_phone,c_add) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssssssssssssss",$product_id,$bname,$amount,$payment_id,$sid,$sname,$se,$sphone,$sadd,$cid,$cname,$ce,$cphone,$cadd);
    $stmt->execute();
  $stmt->close();
    $conn->close();

}


// you can write your database insertation code here
// after successfully insert transaction in database, pass the response accordingly
$arr = array('msg' => 'Payment successfully credited', 'status' => true);  
echo json_encode($arr);
?>