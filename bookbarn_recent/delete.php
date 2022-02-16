<?php


include("sellformdetailsdb.php");
error_reporting(0);

$id1=$_GET['id'];
$ema=$_GET['ema'];
$query = "DELETE FROM sell WHERE id='$id1'";
$data=mysqli_query($conn,$query);
if($data){
	echo"<script>alert('Record Deleted')</script>";
	header("Location:myproducts.php?email=$ema");
}
else{
	//echo"failed to record deleted";
}
?>

