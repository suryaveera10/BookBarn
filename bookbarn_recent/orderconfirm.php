<?php
  include("connection.php");
  
  $host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookbarn";

 
// Create connection
$connect = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    $email=$_GET['email'];
    $idb=$_GET['id'];
    

        $querys = "SELECT * From reg Where email='$email' limit 1";
        $results = mysqli_query($conn,$querys);
 
            if($results && mysqli_num_rows($results)>0)
            {
                $user_data = mysqli_fetch_assoc($results);
                $c_userid=$user_data["user_id"];
                $c_uname=$user_data["uname1"]; 
            }

        
        $querysss = "SELECT * From customerdetails Where uname1='$c_uname' limit 1";
        $resultsss = mysqli_query($conn,$querysss);
        if($resultsss && mysqli_num_rows($resultsss)>0)
        {
            $user_data = mysqli_fetch_assoc($resultsss);
            $c_add=$user_data["name"]." ".$user_data["addressline1"]." ".$user_data["addressline2"]; 
            $c_phone=$user_data["phonenumber"];

        } 
    

?>


 <!DOCTYPE html>  
 <html>  
      <head>  
            <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>order confirmation</title>

    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="viewfunction/buystyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&display=swap" rel="stylesheet">           
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
     
      </head>  
    
      <body >  

          <header>
      <nav id="header-nav" class="navbar navbar-default">
        <div class="container">

          <div class="navbar-header">
            <a href="home.html?email=<?php echo $email ?>" class="pull-left visible-md visible-lg">
              <div id="logo-img" alt="logo image">
              </div>
            </a>

            <div class="navbar-brand">
              <a href="home.html?email=<?php echo $email ?>">
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
                <a href="Help.html">
                  <span class="glyphicon glyphicon-phone-alt"></span><br class="hidden-xs">Help
                </a>
              </li>
              <li>
                <a href='login.html'>
                  <span class="glyphicon glyphicon-user"></span>
                  <br class="hidden-xs"><?php echo substr($email, 0, strrpos($email, '@'));?>
                </a>
              </li>
            </ul>

            

          </div>
        </div>
      </nav>
    </header><br>
<!---END OF NAVBAR---->
          
                


<?php  
                if(isset($_GET['action'])&& $_GET['action']=='buy' && $_GET['id']){ ?>
                

                <?php

                $query = "SELECT *  FROM `sell` where id=".$_GET['id']."  ";  
                $result = mysqli_query($connect,$query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                        $s_email=$row["Email"];
                        $queryss = "SELECT * From reg Where email='$s_email' limit 1";
                        $resultss = mysqli_query($conn,$queryss);
                        if($resultss && mysqli_num_rows($resultss)>0)
                        {
                            $user_data = mysqli_fetch_assoc($resultss);
                            $s_userid=$user_data["user_id"];
                            $s_uname=$user_data["uname1"]; 
                        }   




                ?>


                <div class="container" id="card" > 
                    <div class="texts">
                                <h3 class="product-title">
                                    Order Confirmation
                                </h3>
                                </div>
                    
                     
                        
<form method="post" action="sellviewfunction.php?action=id=<?php echo $row["id"]; ?>">
                            <div class="preview col-md-6">             
                                <div class="preview-pic" class="img-responsive"style=" background-color: rgb(0, 0, 0); ">
                                  <?php echo'<img src="data:image;base64,'.base64_encode($row['Image']).'"alt="Image"class="img-responsive" style="object-fit:cover;width:auto;height:440px;margin-left:100px ;">';?>
                                </div>
                            </div>
                        

                            <div class="details col-md-6" >
                                

                                <div class="texts">
                                <h1 class="product-title">
                                    <?php echo $row["Title"]; ?>
                                </h1>
                                </div>
                                

                                <div class="texts">
                                    <span>Description:</span>
                                    <?php echo $row["Description"]; ?>  
                                </div>
                                         
                                
                                
                                
                                    
                                <div class="texts">
                                    <span>Category:</span> 
                                    <?php echo $row["Category"]; ?>
                                </div>

                                
                                <div class="texts">
                                    <span>Address:</span> <?php echo $row["Location"]; ?>
                                </div>
                                <div class="texts">
                                    
                                        <span>Phone:</span> <?php echo $row["Phonenumber"]; ?>
                                    
                                </div>
                                
                                <div class="texts2">
                                    Price:
                                <span class="text-danger"> Rs. <?php echo $row["Price"]; ?>
                                </span> 

                                </div>

                                 <a href="sellviewfunction.php?action=buy&id=<?php echo $idb?> &ema=<?php echo $email ?>" name="buy" id="button" class="btn btn-success" role="button">Cancel</a>

                <a href="javascript:void(0) " class="btn btn-sm btn-primary float-right buy_now" 
                data-amount="<?php echo $row["Price"]; ?>" 
                data-id="<?php echo $row["id"]; ?>" 
                data-bname="<?php echo $row["Title"]; ?>"

                data-suserid="<?php echo $s_userid ?>"
                data-suname="<?php echo $s_uname ?>"
                data-semail="<?php echo $row["Email"]; ?>"
                data-sphone="<?php echo $row["Phonenumber"]; ?>"
                data-sadd="<?php echo $row["Location"]; ?>"

                data-cuserid="<?php echo $c_userid ?>"
                data-cuname="<?php echo $c_uname ?>"
                data-cemail="<?php echo $email ?>"
                data-cphone="<?php echo $c_phone ?>"
                data-cadd="<?php echo $c_add ?>">Place Order</a>

                                <?php  
                     }  
                } 
                }




                ?>  

               

                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$('body').on('click', '.buy_now', function(e){
var totalAmount = $(this).attr("data-amount");
var product_id =  $(this).attr("data-id");
var bname = $(this).attr("data-bname");
var sid = $(this).attr("data-suserid");
var sname = $(this).attr("data-suname");
var se = $(this).attr("data-semail");
var sphone = $(this).attr("data-sphone");
var sadd = $(this).attr("data-sadd");
var cid = $(this).attr("data-cuserid");
var cname = $(this).attr("data-cuname");
var ce = $(this).attr("data-cemail");
var cphone = $(this).attr("data-cphone");
var cadd = $(this).attr("data-cadd");
var options = {
"key": "rzp_test_0Ockl3ZNhSHEW4",
"amount": (totalAmount*100), // 2000 paise = INR 20
"name": "bookbarn",
"description": "Payment",
"image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
"handler": function (response){
$.ajax({
url: 'payment-process.php',
type: 'post',
dataType: 'json',
data: {
razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,bname : bname,sid : sid,sname : sname,se : se,sphone : sphone,sadd : sadd,cid : cid,cname : cname,ce : ce,cphone : cphone,cadd : cadd
}, 
success: function (msg) {
window.location.href = 'payment-success.php?action=buy&id=<?php echo $idb ?>&email=<?php echo $email ?> ';
}
});
},
"theme": {
"color": "#528FF0"
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
});
</script>

</div>
</form>
</div>

               
  



      </body>  
 </html>