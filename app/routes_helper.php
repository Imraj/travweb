<?php
	$json_response = json_decode(chop($response_content), TRUE);

$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

$simplePay = json_decode($response_content);

if ($response_code == '200') {
// even is http status code is 200 we still need to check transaction had issues or not
if ($json_response['response_code'] == '20000'){
	//header('Location: success.php');
	echo "Location : ".$location."<br/>";
	echo "Destination : ".$destination."<br/>";
	echo "Agency : ".$agency."<br/>";
	echo "Fullname : ".$fullname."<br/>";
	echo "Email : ".$email_address."<br/>";
	echo  "Phone : ".$phone_number."<br/>";
	echo "Price : ".$price."<br/>";
	echo "Token : ".$token."<br/>";
	echo "Transaction_id : ".$transaction_id."<br/>";
	echo "Ticket : ".$ticket;

	$created = $simplePay->created;
	$captured = $simplePay->captured;
	$id = $simplePay->id;

	$customer = $simplePay->customer;
	$customer_address_portal = $customer->address_postal;
	$customer_address = $customer->address;
	$customer_phone_number = $customer->phone_number;
	$customer_address_city = $customer->address_city;
	$customer_email_address = $customer->email_address;
	$customer_id = $customer->id;
	$customer_address_country = $customer->address_country;
	$customer_address_state = $customer->address_state;

	$payment_reference = $simplePay->payment_reference;
	$currency = $simplePay->currency;
	$response_code = $simplePay->response_code;

	$source = $simplePay->source;
	$source_exp_year = $source->exp_year;
	$source_exp_month = $source->exp_month;
	$source_last4 = $source->last4;
	$source_brand = $source->brand;
	$source_is_recurrent = $source->is_recurrent;
	$source_id = $source->id;

	$funding = $simplePay->funding;
	$object = $simplePay->object;

	$ticket = Ticket::create([
		"location"=>$location,
		"destination"=>$destination,
		"transaction_id"=>$transaction_id,
		"email_address"=>$email_address,
		"phone_number"=>$phone_number,
		"price"=>$price,
		"fullname"=>$fullname,
		"agency"=>$agency,
		"id"=>$id
	]);

	$tb_simple_pay = SimplePay::create([
		"created"=>$created,
		"captured"=>$captured,
		"id"=>$id,
		"customer_address_postal"=>$customer_address_postal,
		"customer_phone_number"=>$customer_phone_number,
		"customer_address"=>$customer_address,
		"customer_address_city"=>$customer_address_city,
		"customer_email_address"=>$customer_email_address,
		"customer_id"=>$customer_id,
		"customer_address_country"=>$customer_address_country,
		"customer_address_state"=>$customer_address_state,
		"payment_reference"=>$payment_reference,
		"currency"=>$currency,
		"response_code"=>$response_code,
		"source_exp_year"=>$source_exp_year,
		"source_exp_month"=>$source_exp_month,
		"source_id"=>$source_id,
		"source_last4"=>$source_last4,
		"source_brand"=>$source_brand,
		"source_is_recurrent"=>$source_is_recurrent
	]);

	// add to simple pay table

	/*
	$ticket_query = mysql_query("INSERT INTO tickets(location,destination,transaction_id,email_address,phone_number,price,fullname,agency,simplepay_id)
															 VALUES('".$location."','".$destination."','".$transaction_id."','".$email_address."','".$phone_number."','".$price."',
																				 '".$fullname."','".$agency."','".$id."') ");



	$query = mysql_query("INSERT INTO simple_pay(created,captured,id,customer_address_postal,customer_phone_number,customer_address,customer_address_city,
																							 customer_email_address,customer_id,customer_address_country,customer_address_state,payment_reference,currency,
																							 response_code,source_exp_year,source_exp_month,source_id,source_last4,source_brand,source_is_recurrent)
							VALUES('".$created."','".$captured."','".$id."','".$customer_address_postal."','".$customer_phone_number."','".$customer_address."',
										 '".$customer_address_city."','".$customer_email_address."','".$customer_id."','".$customer_address_country."','".$customer_address_state."',
										 '".$payment_reference."','".$currency."','".$response_code."','".$source_exp_year."','".$source_exp_month."','".$source_id."','".$source_last4."',
										 '".$source_brand."','".$source_is_recurrent."')");
  */

}else if($json_response['response_code'] == '11000'){
	echo "Request at a later time";
}
else if($json_response['response_code'] == '50100')
{
	echo "Technical error with credit card or bank access";
}
} else {
//header('Location: failed.php');
	echo "Failed Now : ".$response_code." | Response Content : " . $response_content;
}
?>