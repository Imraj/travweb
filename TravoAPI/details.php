<?php
	header("Access-Control-Allow-Origin:*");

	include "connect.php";

	if(isset($_GET['travelId']))
	{
		$travelId = $_GET['travelId'];

		$plan = mysql_query("SELECT * FROM travelplans WHERE id='".$travelId."' ");

		$result = array();

		while($rows = mysql_fetch_array($plan))
		{
			$id = $rows['id'];
			$agency_id = $rows['agency_id'];
			$agency = mysql_query("SELECT name FROM agencies WHERE id='".$agency_id."' ");
			$agency = mysql_fetch_row($agency);
			$agency = $agency[0];

			$price = $rows['price'];
			$pickup_datetime = $rows['pickup_datetime'];

			$dropoff_location_id = $rows["dropoff_location"];
			$dropoff_location = mysql_query("SELECT location_name,location_address FROM pklocations
								WHERE id='".$dropoff_location_id."' ");
			$dropoff_location = mysql_fetch_row($dropoff_location);
			$dropoff_location_name = $dropoff_location[0];
			$dropoff_location_address = $dropoff_location[1];
			$dropoff_location = $dropoff_location_name.",".$dropoff_location_address;

			$pickup_location_id = $rows["pickup_location"];
			$pickup_location = mysql_query("SELECT location_name,location_address FROM pklocations
						WHERE id='".$pickup_location_id."' ");
			$pickup_location = mysql_fetch_row($pickup_location);
			$pickup_location_name = $pickup_location[0];
			$pickup_location_address = $pickup_location[1];
			$pickup_location = $pickup_location_name.",".$pickup_location_address;

			$result['id'] = $id;
			$result['agency'] = $agency;
			$result['price'] = $price;
			$result['pickup_datetime'] = $pickup_datetime;
			$result['dropoff_location'] = $dropoff_location;
			$result["pickup_location"] = $pickup_location;
			
		}

		echo json_encode($result);

	}

?>
