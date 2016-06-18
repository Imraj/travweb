<?php
	header("Access-Control-Allow-Origin:*");
	if( isset($_GET['phoneNo']) &&  isset($_GET['password']) )
	{

		$phoneNo = $_GET['phoneNo'];

		$password = $_GET['password'];

		$result = array();

		$query = mysql_query("SELECT * FROM users WHERE phoneNumber='".$phoneNo."' AND password='".$password."' ");
		if(!$query){
			echo mysql_query();
		}
		else
		{
			if(mysql_num_rows($query) > 0)
			{
				while($rows = mysql_fetch_array($query))
				{
					$fullname = $rows['fullName'];
					$email = $rows['emailAddress'];

					$result['fullName'] = $fullName;
					$result['emailAddress'] = $emailAddress;
				}
				$result["success"] = 1;
				$result["message"] = "Login Successful";
				echo json_encode($result);
			}
			else{
				$result["success"] = 1;
				$result["message"] = "This user does not exist";

				echo json_encode($result);
			}
		}

	}

?>
