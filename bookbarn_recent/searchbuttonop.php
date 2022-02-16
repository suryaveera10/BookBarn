<?php
include("sellformdetailsdb.php");
$q=$_GET["q"];

?>


     <!----content----->
 <div id="tiles" class="container" >
 <?php  
                $query = " SELECT  FROM `sell` where Title like '%$q%' or Category like '%$q%' ";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  

                     while($row = mysqli_fetch_array($result))  
                     {  
                      
                      

                ?> 
 
    
       
      <div method="post" action="buy.php?action=id=<?php echo $row["id"]; ?>"> 
      
    <div class=" col-md-3   column productbox" >
      
      
      <?php echo'<img src="data:image;base64,'.base64_encode($row['Image']).'"alt="Image"class="img-responsive"style="object-fit:cover;width:500px;height:300px; ">';?>
      <div class="producttitle">
        <div>
        <?php echo $row["Title"]; ?>
        </div>
        <div>
          description.....
        </div>
      </div>
      <div class="productprice"><div class="pull-right"><a href="sellviewfunction.php?action=buy&id=<?php echo $row["id"]; ?>&ema=<?php echo $row["Email"]; ?>"  class="btn btn-danger btn-sm" role="button">VIEW</a></div><div class="pricetext">Rs. <?php echo $row["Price"]; ?></div></div>
    </div>
      </div>
    

    <?php  
                     }  
                     }
                   
                 
                ?> 
                <div style="clear:both"></div> 
</div>
              

   

