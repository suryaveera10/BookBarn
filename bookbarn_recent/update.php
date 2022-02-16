<?php


include("sellformdetailsdb.php");
error_reporting(0);
$id=$_GET['id'];
$ti=$_GET['ti'];
$ca=$_GET['ca'];
$des=$_GET['des'];
$pri=$_GET['pri'];
$ph=$_GET['ph'];
$ema=$_GET['ema'];
$loc=$_GET['loc'];
$im=$_GET['im'];

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
        <div id="sellPopupContainer">
            <div class="closeSellPopupDiv">
                <a href="myproducts.php?email=<?php echo $ema ?>">
                <span id="backCategoryPopup"><i class="fas fa-arrow-left"></i></span></a>
                <a href="myproducts.php?email=<?php echo $ema ?>">
                <span id="closeSellPopup">&times;</span></a>
            </div>
            <div class="headingDiv">
                <span class="heading">Edit your details</span>
            </div>
            <form id="sellForm" method="POST"  enctype="multipart/form-data">
                <p id="categoryName"></p>
                <input type="Hidden" name="id" value="<?php echo "$id";?>">
                <input type="text" placeholder="Title.." value="<?php echo "$ti" ?>" name="Title3"  >
                <input type="text" placeholder="Category.." value="<?php echo "$ca" ?>" name="Category3"  >
                <input type="text" placeholder="Description.." value="<?php echo "$des" ?>" name="Description3" required>
                <input type="number" placeholder="Price.." value="<?php echo "$pri" ?>" name="Price3"  required>
                         
                <input type="phone" placeholder="Phone number.." value="<?php echo "$ph" ?>" name="Phonenumber3"required pattern="[0-9]{10}"/>
                <input type="email" placeholder="email id.." value="<?php echo "$ema" ?>" name="Email3"  required>
                <input type="text" placeholder="Location.." value="<?php echo "$loc" ?>" name="Location3" required>
                
                
                <input type="submit"  value="Update" name="update" >
            </form>
<?php

if(isset($_POST['update']))
{

    $id1=$_POST['id'];
    $title1=$_POST['Title3'];
    $category1=$_POST['Category3'];
    $descr1=$_POST['Description3'];
    $price1=$_POST['Price3'];
    $phnum=$_POST['Phonenumber3'];
    $email1=$_POST['Email3'];
    $location1=$_POST['Location3'];
    

    $query="UPDATE `sell` SET `Title`='$title1',`Category`='$category1',`Description`='$descr1',`Price`='$price1',`Phonenumber`='$phnum',`Email`='$email1',`Location`='$location1' WHERE `id`='$id1' " ;

    $data=mysqli_query($conn,$query);

    if($data)
    {
        echo "<script>alert('Record Updated')</script>";
        
    }
    else
    {
        echo"failed to update";
    }
}

    ?>
        </div>
    </div>
    <!-- sell filldetails -->   
</body>
</html>








