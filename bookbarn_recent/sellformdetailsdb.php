<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookbarn";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
error_reporting(0);
?>

<?php
if(isset($_POST['save']))
{
$id=$_POST['id'];
$Title = $_POST['Title'];
$Category  = $_POST['Category'];
$Description = $_POST['Description'];
$Price = $_POST['Price'];
$Phonenumber = $_POST['Phonenumber'];
$Email= $_POST['Email'];
$Location= $_POST['Location'];
$file=addslashes(file_get_contents($_FILES['Image']['tmp_name']));
  
$query = "INSERT Into sell values('','$Title' , '$Category' , '$Description', '$Price', '$Phonenumber', '$Email', '$Location' ,'$file')";

$data=mysqli_query($conn,$query);

if($data)
{
  echo "<script>alert('Your Book is Posted Successfully');window.location='buy.php?email=$Email'</script>";
  
}
else
{
  echo "<script>alert('Failed to Post');window.location='buy.php?email=$Email'</script>";
}
}
?>