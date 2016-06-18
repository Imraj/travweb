<?php
	header("Access-Control-Allow-Origin:*");

	include "connect.php";

	if( isset($_GET["location"]) && isset($_GET["destination"])&&isset($_GET['date']) )
	{

		$location = $_GET["location"];
		$destination = $_GET["destination"];
		$pickup_datetime = $_GET["date"];

		$location_id = mysql_query("SELECT id FROM places WHERE name='".$location."' ");
		$location_id = mysql_fetch_row($location_id);
		$location_id = $location_id[0];

		$destination_id = mysql_query("SELECT id FROM places WHERE name='".$destination."' ");
		$destination_id = mysql_fetch_row($destination_id);
		$destination_id = $destination_id[0];

		$plan = mysql_query("SELECT * FROM travelplans WHERE location_id='".$location_id."'
																							AND destination_id='".$destination_id."'
																								AND pickup_datetime='".$pickup_datetime."'
																						 ");

		$results = array();

		if(!$plan)
		{
			//$results["success"] = 0;
			//$results["message"] = "An error occured " . mysql_error();

			echo json_encode($results);
		}
		else{
			while($rows = mysql_fetch_array($plan))
			{
				$result = array();

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

				array_push($results, $result);


			}
			//$results["success"] = 1;
			//$results["message"] = "Loading Completed Successfully";
			echo json_encode($results);
		}
	}

?>
