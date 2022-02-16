<?php
  include("connection.php");
  
    $email=$_GET['ema'];
    $idb=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookBarn:Fill Details to Sell Your Books</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="lendoperationstyle.css"> 
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">     
    <!-- fontawesome -->
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    
</head>

<body>

<!-- sell filldetails  -->   
    <div id="sellPopup">
        <div id="sellPopupContainer" style="height:670px">
            <div class="closeSellPopupDiv">
                <a href="home.html?email=<?php echo $email ?>">
                <span id="backCategoryPopup"><i class="fas fa-arrow-left"></i></span></a>
                <a href="home.html?email=<?php echo $email ?>">

                <span id="closeSellPopup">&times;</span></a>
            </div>
            <div class="headingDiv">
                <span class="heading">Delivery Address</span>
            </div>
            <form id="sellForm"method="POST" action="" enctype="multipart/form-data">
                <p id="categoryName"></p>
                <input type="text" placeholder="Name.." name="name"  required>
                <input type="text" placeholder="Address Line 1.." name="addressline1"  required>
                <input type="text" placeholder="Address Line 2.." name="addressline2"  required>
                <input type="text" placeholder="Landmark(optional).." name="landmark"  >
                         
                
                <input type="text" placeholder="District.." name="district" required>
                <input type="text" placeholder="Pincode.." name="pincode" required pattern="[0-9]{6}" />
                <input type="phone" placeholder="Phone number.." name="phonenumber" required pattern="[0-9]{10}"/>
               
                <input type="submit" name="save" value="Next">
                
            </form>
        </div>
    </div>
    <!-- sell filldetails -->   
</body>
</html>

<?php
if(isset($_POST['save']))
{
$id=$_POST['id'];
$name= $_POST['name'];
$addressline1 = $_POST['addressline1'];
$addressline2  = $_POST['addressline2'];
$landmark = $_POST['landmark'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$phonenumber= $_POST['phonenumber'];


                        $c_email=$email;
                        $queryss = "SELECT * From reg Where email='$c_email' limit 1";
                        $resultss = mysqli_query($conn,$queryss);
                        if($resultss && mysqli_num_rows($resultss)>0)
                        {
                            $user_data = mysqli_fetch_assoc($resultss);
                            $c_uname=$user_data["uname1"]; 
                        } 

  
$query = "INSERT Into customerdetails values('','$c_uname','$name' , '$addressline1' , '$addressline2', '$landmark', '$district', '$pincode', '$phonenumber' )";

$data=mysqli_query($conn,$query);

if($data)
{
  echo "<script>alert('Your ADDRESS was updated sucessfuly');window.location='orderconfirm.php?action=buy&id=$idb&email=$email'</script>";

  
}
else
{
  echo "<script>alert('Failed to update');window.location='buy.php?email=$Email'</script>";
}
}
?>