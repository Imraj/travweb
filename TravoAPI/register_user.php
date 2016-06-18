<?php
	header("Access-Control-Allow-Origin:*");

	if( isset($_GET['fullname']) && isset($_GET['phoneNo']) && isset($_GET['email']) && isset($_GET['password']) )
	{
		$fullname = $_GET['fullname'];
		$phoneNo = $_GET['phoneNo'];
		$email = $_GET['email'];
		$password = $_GET['password'];
		$hashed_password = hash($password);

		$query = mysql_query("INSERT INTO users(fullname,phoneNo,email,password)
															VALUES('".$fullname."','".$phoneNo."','".$email."','".$password."')");

		$result = array();

		if(!$query)
		{
				$result["success"] = 0;
				$result["message"] = mysql_error();

				$to = $email;
				$subject = "Welcome To Trav";
				$message = "";
				$header = "";

				mail($to,$subject,$message,$header);

				echo json_encode($result);
		}
		else
		{
			$result["success"] = 1;
			$result["message"] = "User Registered Successfully";

			echo json_encode($result);
		}

	}
?>
