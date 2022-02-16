<?php 
session_start();
	include("connection.php");
	include("functions.php");

	$email=$_POST['email'];
	$upswd=$_POST['upswd'];

	if(!empty($email) && !empty($upswd))
	{ 
		
		$query = "SELECT * From register Where email='$email' limit 1";
		$result = mysqli_query($conn,$query);
 
		if($result)
		{ 
			if($result && mysqli_num_rows($result)>0)
			{
				$user_data = mysqli_fetch_assoc($result);
				if($user_data['upswd1'] == $upswd)
				{
					if ($user_data['role'] == "user") 
					{
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: home.html?email=$email");
						die;
					}
					if ($user_data['role'] == "admin") 
					{
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: adminhome.html");
						die;
						
					}
				}
			}
		}

		echo "wrong email or password";

	
	}
	else{
		echo "wrong email or password";
	}
?> 