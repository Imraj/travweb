<?php
header("Access-Control-Allow-Origin:*");

use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource("admin/agency","AgencyController");
Route::resource("admin/travelplan","TravelplanController");
Route::resource("admin/car","CarController");
Route::resource("admin/pklocation","PklocationController");
Route::resource("admin/place","PlaceController");
Route::resource("admin/todo","TodoController");
Route::resource("admin/transaction","TransactionController");

View::composer(array('admin.new_car'),function($view){
	$agency = Agency::all();
	if(count($agency) > 0)
	{
		$agency_options = array_combine($agency->lists('id'),$agency->lists('name'));
	}
	else
	{
		$agency_options = array(null,"unspecified");
	}
	$view->with('agency_options',$agency_options);
});

View::composer('admin.new_pklocation',function($view){
		$agency = Agency::all();

		if(count($agency) > 0)
		{
			$agency_options = array_combine($agency->lists('id'),$agency->lists('name'));
		}
		else
		{
			$agency_options(null,"unspecified");
		}
		$view->with('agency_options',$agency_options);
});

View::composer('admin.new_tplan',function($view){
		$agency = Agency::all();
		$location =Place::all();
		$pklocation = PKLocation::all();

		if( count($agency)>0 && count($location) >0 && count($pklocation))
		{
			$agency_options = array_combine($agency->lists('id'),$agency->lists('name'));
			$location_options = array_combine($location->lists('id'),$location->lists('name') );
			$pklocation_options = array_combine($pklocation->lists('id'),$pklocation->lists('location_name'));
		}
		else
		{
			$agency_options = array(null,"unspecified");
			$location_options = array(null,"unspecified");
			$pklocation_options = array(null,"unspecified");
		}

		$view->with("agency_options",$agency_options)
				 ->with("location_options",$location_options)
				 ->with("pklocation_options",$pklocation_options);
});

View::composer('admin.edit_tplan',function($view){
		$agency = Agency::all();
		$location =Place::all();
		$pklocation = PKLocation::all();

		if( count($agency)>0 && count($location) >0 && count($pklocation))
		{
			$agency_options = array_combine($agency->lists('id'),$agency->lists('name'));
			$location_options = array_combine($location->lists('id'),$location->lists('name') );
			$pklocation_options = array_combine($pklocation->lists('id'),$pklocation->lists('location_name'));
		}
		else
		{
			$agency_options = array(null,"unspecified");
			$location_options = array(null,"unspecified");
			$pklocation_options = array(null,"unspecified");
		}

		$view->with("agency_options",$agency_options)
				 ->with("location_options",$location_options)
				 ->with("pklocation_options",$pklocation_options);
});

Route::get('/admin',array("before"=>"auth",function(){
		if(Auth::user()->is_admin){
			$todos = Todo::all();
			$activities = Activity::all();
			$agencies = Agency::all();
			return View::make("admin.index")
												->with("activities",$activities)
												->with("todos",$todos)
												->with("agencies",$agencies);
		}
		else
		{
			return Redirect::to('/');
		}

}));


Route::get('/', function()
{
	return View::make("trav.index");
});

Route::post('/result',function(){

		$location = Input::get("location");
		$destination = Input::get("destination");
		$date_time = Input::get("date_time");
		$travel_date_time = Carbon::parse($date_time);
		$date_time_formatted = $travel_date_time->toFormattedDateString();
		$travel_date = $travel_date_time->toDateString();
		$pax = Input::get("pax");

		$location_id = Place::where('name','like',$location)->first()["id"];
		$destination_id = Place::where('name','like',$destination)->first()["id"];

	  $queries = Travelplan::whereLocationId($location_id)->whereDestinationId($destination_id)->wherePickupDatetime($travel_date)->get();

		$travel_date_suggestion = $travel_date_time->addDays(7)->toDateString();
		$queries_suggestion = Travelplan::whereLocationId($location_id)->whereDestinationId($destination_id)->whereBetween('pickup_datetime',[$travel_date,$travel_date_suggestion])->get();


		$results = array();
		$results_suggestion = array();

		foreach($queries as $query)
		{
			$id = $query["id"];
	  	$agency_id=$query['agency_id'];
			$price = $query["price"];
			$dropoff_location_id = $query["dropoff_location"];
			$pickup_location_id = $query["pickup_location"];
			$pickup_datetime = $query["pickup_datetime"];
			$pickup_datetime = Carbon::parse($pickup_datetime)->toFormattedDateString();


			$agency = Agency::whereId($agency_id)->first()['name'];
			$dropoff_location = Pklocation::whereId($dropoff_location_id)->first()['location_address'];
			$pickup_location = Pklocation::whereId($pickup_location_id)->first()['location_address'];

			$result = array("id"=>$id,
									"Price"=>$price,
									"Agency"=>$agency,
									"DropOff_Location"=>$dropoff_location,
									"PickUp_Location"=>$pickup_location,
									"PickUp_DateTime"=>$pickup_datetime
								);

		 array_push($results,$result);

		}

		foreach($queries_suggestion as $query_suggestion)
		{
			$id = $query_suggestion["id"];
			$agency_id=$query_suggestion['agency_id'];
			$price = $query_suggestion["price"];
			$dropoff_location_id = $query_suggestion["dropoff_location"];
			$pickup_location_id = $query_suggestion["pickup_location"];
			$pickup_datetime = $query_suggestion["pickup_datetime"];

			$pickup_datetime = Carbon::parse($pickup_datetime)->toFormattedDateString();

			$agency = Agency::whereId($agency_id)->first()['name'];
			$dropoff_location = Pklocation::whereId($dropoff_location_id)->first()['location_address'];
			$pickup_location = Pklocation::whereId($pickup_location_id)->first()['location_address'];


			$result_suggestion = array("id"=>$id,
									"Price"=>$price,
									"Agency"=>$agency,
									"DropOff_Location"=>$dropoff_location,
									"PickUp_Location"=>$pickup_location,
									"PickUp_DateTime"=>$pickup_datetime
								);
						array_push($results_suggestion,$result_suggestion);
		}

	 // Saving Transaction History
	 $transaction = new Transaction;
	 $transaction->transaction_details = "Bus Ticket From ".$location." To ".$destination;
	 if(Auth::user())
	 		$transaction->transaction_by = Auth::user()->fullName;
	 $transaction->save();
	 //Ends Saving Transaction History

	  //return "Date : ".$travel_date_suggestion;
	  return View::make("trav.result")->with("results",$results)
														->with("location",$location)
														->with("destination",$destination)
														->with("travelDate",$date_time_formatted)
														->with("results_suggestion",$results_suggestion);
		//return "Loc = ".$location." | Dest = ".$destination." |Date=".$date_time."| pax=".$pax;
});

/*Route::get('/activate_phoneNo',function(){
		return View::make("trav.activate_phoneNo");
});

Route::post("/activate_phoneNo",function(){
	$activation_code = Input::get("activation_code");
	return $activation_code;
});*/

Route::post("/activated",function(){

 $userId = $user->id;
 $activate = DB::table("users")->whereId($userId);
 $user->activated = true;

 return Redirect::to("/")->withSuccess("Account Successfully Activated");

});

Route::get('/register',function(){
		return View::make("trav.register");
});

Route::post('/register',function(){
	$user = User::create(["fullName"=>Input::get("fullName"),
												"emailAddress"=>Input::get("emailAddress"),
												"phoneNumber"=>Input::get("phoneNumber"),
												"password"=>Hash::make(Input::get("password"))
											]);
	if($user->save())
	{
		//Send Email To User

		//Activate your trav account
		Mail::send("emails.activate",array("fullName"=>Input::get("fullName"),function($message){
			$message->to(Input::get("emailAddress"),Input::get("fullName"))->subject("Activate Your Trav Account");
		}));
		//Welcome To Trav Email Address
		Mail::send("emails.registration",array("fullName"=>Input::get("fullName"),function($message){
			$message->to(Input::get("emailAddress"),Input::get("fullName"))->subject("Welcome To Trav");
		}));
		//
		return Redirect::to("/register")->withSuccess("User Successfully Registered , Login to your account");
	}
	else
	{
		return Redirect::back()->withInput()->withError("Invalid data supplied");
	}
});

Route::get("/register_api/{fullname}/{email}/{phoneNo}/{password}",function($fullname,$email,$phoneNo,$password){

					$user = User::create([
												"fullName"=>Input::get("fullName"),
												"emailAddress"=>Input::get("emailAddress"),
												"phoneNumber"=>Input::get("phoneNumber"),
												"password"=>Hash::make(Input::get("password"))
											]);

					if( $user->save() )
					{
						return '{"message":"Account Successfully Created"}';
					}
					else
					{
						return '{"message":"Error creating your account"}';
					}

});

Route::get('/login',function(){
		return View::make("trav.login");
});

Route::post('/login',function(){

	if(Auth::attempt( Input::only("phoneNumber","password") ))
	{
		return Redirect::intended("/");
	}
	else
	{
		return Redirect::back()->withInput()->withError("Invalid Login Credentials , Please Re-check the data supplied");
	}

});

Route::get("/login_api/{phoneNo}/{password}",function($phoneNo,$password){

	$user = User::where("phoneNumber","=",$phoneNo)->first();
	$pwd = $user->password;

	if(Hash::check($password,$pwd))
	{
		return $user;
	}
	return '{"message":"Invalid Login Details"}';

});

Route::get("logout",function(){
		  Auth::logout();
			return Redirect::to("/")->with("message","You are now logged out");

});
Route::get("/result_suggestion/{id}/book",function($id){
	return Redirect::to("/result/{id}/book",array("id"=>$id));
});
Route::get("/result/{id}/book",array("before"=>"auth",function($id){

	$query = Travelplan::whereId($id)->first();

	$id = $query['id'];
	$agency_id = $query['agency_id'];
	$price = $query['price'];
	$dropoff_location_id = $query['dropoff_location'];
	$pickup_location_id = $query['pickup_location'];
	$pickup_datetime = $query["pickup_datetime"];
	$location_id = $query["location_id"];
	$destination_id = $query["destination_id"];

	$agency = Agency::whereId($agency_id)->first()['name'];
	$dropoff_location = Pklocation::whereId($dropoff_location_id)->first()['location_address'];
	$pickup_location = Pklocation::whereId($pickup_location_id)->first()['location_address'];

	$location = Place::whereId($location_id)->first()['name'];
	$destination = Place::whereId($destination_id)->first()['name'];

  $result = array("id"=>$id,
							"Price"=>$price,
							"Agency"=>$agency,
							"DropOff_Location"=>$dropoff_location,
							"PickUp_Location"=>$pickup_location,
							"PickUp_DateTime"=>$pickup_datetime
						);

	// Saving Transaction History
  $transaction = new Transaction;
	$transaction->transaction_details = "Bus Ticket From ".$location." To ".$destination;
	if(Auth::user())
			$transaction->transaction_by = Auth::user()->fullName;
	$transaction->transaction_type = "Book Now";
	$transaction->save();
 //Ends Saving Transaction History

		//return $query."|".$id;
	return View::make("trav.book")->with("result",$result);
}));

//View Tickets, History, Activities, Incomplete, Complete Transaction
Route::get("transactions",function(){

	$trans = Transaction::where('transaction_type','like','Pay');

	return View::make("trav.transactions")->with("trans",$trans);
	//return "All Transactions";
});

//All Tickets Purchased
Route::get("tickets",function(){

		//$tickets = Transaction::where();
		return View::make("trav.tickets");//->with("tickets",$tickets);
		//return "All Tickets";
});

//View Individual Ticket
Route::get("ticket/{id}",function($id){
		//return View::make("trav.ticket");
		return "Ticket #".$id;
});

Route::get("notifications",function(){
	return "All notifications";
});

Route::get("retrieve/password",function(){
	return View::make("trav.retrieve_password");
});

Route::post("/retrieve/password",function(){
	$email = Input::get("emailAddress");
  //send email
	Mail::send('emails.password_reset',array("fullName"=>$user->fullName,function($message){
			$message->to($user->emailAddress,$user->fullName)->subject("Trav Password Reset");
	}));

	return Redirect::to("/retrieve/password")->withSuccess("A password reset link has been sent to your email address");
});

Route::get("/admin/users",function(){
	$users = User::all();
	return View::make("admin.users")->with("users",$users);
});

Route::get("/result/{id}/pay",function($id){
	$user = Auth::User();
	$tplan = Travelplan::whereId($id)->get()->first();

	//$paystackLibObject = \MAbiola\Paystack\Paystack::make();
	//$getAuthorization = $paystackLibObject->startOneTimeTransaction("1000","mujahidraji@gmail.com");
	//$auth_url = $getAuthorization["authorization_url"];

	$agency_id = $tplan["agency_id"];
	$location_id = $tplan["location_id"];
	$destination_id = $tplan["destination_id"];
	$dropoff_location_id = $tplan["dropoff_location"];
	$pickup_location_id = $tplan["pickup_location"];
	$pickup_datetime = $tplan["pickup_datetime"];
	$price = $tplan["price"];

	$agency = Agency::whereId($agency_id)->first();
	$location = Place::whereId($location_id)->first();
	$destination = Place::whereId($destination_id)->first();
	$dropoff_location = PKLocation::whereId($dropoff_location_id)->first();
	$pickup_location = PKLocation::whereId($pickup_location_id)->first();

	//return $agency['name'];
	$tplan = array("agency_name" => $agency["name"],
	               "location"=>$location["name"],
								 "destination"=>$destination["name"],
								 "pickup_name"=>$pickup_location["location_name"],"pickup_address"=>$pickup_location["location_address"],
								 "dropoff_name"=>$dropoff_location["location_name"],"dropoff_address"=>$dropoff_location["location_address"],
							   "pickup_datetime"=>$pickup_datetime,"price"=>$price);

 $loc = $location["name"];
 $dest = $destination["name"];

	// Saving Transaction History
	$transaction = new Transaction;
	$transaction->transaction_details = "Bus Ticket From ".$loc." To ".$dest;
	if(Auth::user())
		$transaction->transaction_by = Auth::user()->fullName;
	$transaction->transaction_type = "Proceed To Payment";
	$transaction->save();
	//Ends Saving Transaction History
	return View::make("trav.pay")->with("tplan",$tplan)->with("user",$user);
});

Route::get("/about",function(){
	return View::make("trav.about");
});

Route::get("/profile",function(){
	$user = Auth::user();

	return View::make("trav.profile")->with("user",$user);
});

Route::get("/edit_email",function(){
	return View::make("trav.new_email_address");
});

Route::post("/update_email",function(){
	$user_email = Auth::user()->email;
	$former_email = Input::get("former_email");
	$new_email = Input::get("new_email");

	if($user_email != $former_email)
	{
		return Redirect::to("/edit_email")->withError("Email Address Doesn't Match");
	}

	$user = User::find(Auth::user()->id);
	$user->emailAddress = $new_email;
	$user->save();
});

Route::get("/edit_phoneNo",function(){
	return View::make("trav.new_phone_number");
});

Route::post("/update_phoneNo",function(){
	$userPhoneNo = Auth::user()->phoneNumber;
	$formerPhoneNo = Input::get("former_phoneNo");
	$newPhoneNo = Input::get("new_phoneNo");

	if($userPhoneNo != $formerPhoneNo)
	{
		return Redirect::to("/edit_phoneNo")->withError("Phone Number Does not Match");
	}

	$user = User::find(Auth::user()->id);
	$user->phoneNumber = $newPhoneNo;

	if($user->save()){
		Auth::logout();
		return Redirect::to("/login")->withSuccess("Phone Number Updated Successfully , Login To Continue");
	}
});

Route::get("/edit_password",function(){
	return View::make("trav.new_password");
});

Route::post("/update_password",function(){

	$former_pwd = Input::get("former_pwd");
	$former_pwd_hashed = Hash::make($former_pwd);

	$new_pwd = Input::get("new_pwd");
	$new_pwd_hashed = Hash::make($new_pwd);

	$new_pwd_again = Input::get("new_pwd_again");

	$user_pwd = Auth::user()->password;

	$pwd_check = Hash::check("abcde",Auth::user()->getAuthPassword());

	if( $new_pwd != $new_pwd_again )
	{
		return Redirect::to("/edit_password")->withError("Password and Password again does not match ");
	}
	else if(!Hash::check($former_pwd,$user_pwd))
	{
		return Redirect::to("/edit_password")->withError("The former password supplied is invalid  ");
	}

	$user = User::find(Auth::user()->id);
	$user->password = Hash::make($new_pwd);

	if($user->save()){
		Auth::logout();
		return Redirect::to("/login")->withSuccess("Password Successfully Updated, Login To Continue");
	}
});

Route::get("/edit_kin",function(){
	return View::make("trav.new_kin");
});

Route::post("/update_kin",function(){
	$fullname = Input::get("next_kin_fullname");
	$phoneNo = Input::get("next_kin_phoneNo");
	$userId = Auth::user()->id;

	$user = User::find($userId);
	$user->next_of_kin_name = $fullname;
	$user->next_of_kin_phoneNo = $phoneNo;

	if($user->save())
		return Redirect::to("/edit_kin")->withSuccess("Next Of Kin Profile Updated Successfully");

});

Route::get("/contact",function(){

	return View::make("trav.contact");

});

Route::post("/contact",function(){

	$email = "contact@trav.com.ng";
	$msg_title = Input::get("title");
	$msg_main = Input::get("message");
  $fullName = $user->fullName ? $user->fullName : "Anon";
	//return $msg_title." | ".$msg_main;
	Mail::send($msg_main,function($message){
		$message->to($email,$msg_title)->subject($msg_title." by ".$fullName);
	});

	return Redirect::to("/contact")->withSuccess("Message Sent. We'll get back to you in a 5 minutes");
});

Route::get("/activate",function(){
		return View::make("trav.activate");
});

Route::post("/activate",function(){
		$code = Input::get("code");
		if($gen_code == $code)
		{
			return Redirect::to("/login");
		}
});

Route::get("/search/autocomplete",function(){
	$term = Input::get("term");
	$results = array();

	$queries = DB::table('places')
							->where('name','LIKE','%'.$term.'%')
							->take(5)->get();
	foreach($queries as $query){
		$results[] = ['id'=>$query->id,'value'=>$query->name];
	}
	return Response::json($results);
});

Route::post("/verify",function(){
	$private_key = 'test_pr_e22a3c0f78474535b37d20381e1c1cd9';//'test_pr_demo';

// Retrieve data returned in payment gateway callback
$location = $_POST["location"];
$destination = $_POST["destination"];
$agency = $_POST["agency"];
$email_address = $_POST["email_address"];
$phone_number = $_POST["phone_number"];
$price = $_POST["price"];
$fullname = $_POST["fullname"];
$token = $_POST["token"];

$alphabets = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

$t_min = 111111;
$t_max = 999999;
$t_alpha_1 = $alphabets[rand(0,25)];
$t_alpha_2 = $alphabets[rand(0,25)];
$t_alpha_3 = $alphabets[rand(0,25)];
$t_alpha_4 = $alphabets[rand(0,25)];
$t_random_num = rand($t_min,$t_max);
$transaction_id = $t_random_num.$t_alpha_1.$t_alpha_2.$t_alpha_3.$t_alpha_4;

$min = 111111111111;
$max = 999999999999;
$random_num = rand($min,$max);
$alpha_num_1 = $alphabets[rand(0,25)];
$alpha_num_2 = $alphabets[rand(0,25)];
$alpha_num_3 = $alphabets[rand(0,25)];
$ticket = $alpha_num_1.$alpha_num_2.$alpha_num_3.$random_num;

$data = array (
'token' => $token,
'location'=> $location,
'destination'=>$destination,
'transaction_id'=>$transaction_id,
);

$data_string = json_encode($data);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://checkout.simplepay.ng/v1/payments/verify/');
curl_setopt($ch, CURLOPT_USERPWD, $private_key . ':');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string)
));

$curl_response = curl_exec($ch);
$curl_response = preg_split("/\r\n\r\n/",$curl_response);
//echo $curl_response;


$response_content = $curl_response[1];
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

	// add to simple pay table
	/*$host = "localhost";
	$db = "trav";
	$user = "root";
	$pwd = "";
	mysql_connect($host,$user,$pwd);
	mysql_select_db($db);


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

});


Route::get("/process_payment",function(){
	// Deduct Money
  //mmc.orgfree.com/verify.php

	//Generate Ticket
});
