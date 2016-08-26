<?php
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

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
Route::resource("admin/tickets","TicketController");



//Route::resource("route","RouteController");
Route::resource("route/location","RouteController");
Route::resource("route/direction","DirectionController");
Route::resource("route/state","StateController");

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

View::composer(array("route.location.new_place"),function($view){
	$state = State::all();
	if(count($state) > 0)
	{
		$state_options = array_combine($state->lists('id'), $state->lists('name'));
	}
	else
	{
		$state_options = array(null,"unspecified");
	}
	$view->with("state_options",$state_options);
});

View::composer(array("route.direction.create"),function($view){
	$state = State::all();
	if(count($state) > 0)
	{
		$state_options = array_combine($state->lists('id'), $state->lists('name'));
	}
	else
	{
		$state_options = array(null,"unspecified");
	}
	$view->with("state_options",$state_options);
});

View::composer('route.direction.create',function($view){
		$location =Place::all();
		if( count($location) >0)
		{
			$location_options = array_combine($location->lists('id'),$location->lists('name') );
		}
		else
		{
			$location_options = array(null,"unspecified");
		}

		$view->with("place_options",$location_options);	
});

View::composer('route.direction.create',function($view){
		$vehicleType =VehicleType::all();
		if( count($vehicleType) >0)
		{
			$vehicle_options = array_combine($vehicleType->lists('id'),$vehicleType->lists('name') );
		}
		else
		{
			$vehicle_options = array(null,"unspecified");
		}

		$view->with("vehicle_options",$vehicle_options);	
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

Route::post("simplepay/test",function(){
	return View::make("trav.simplepay");
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

Route::get("privacy-policy",function(){

	return View::make("trav.privacy_policy");

});

Route::get("terms-condition",function(){

	return View::make("trav.terms_condition");

});

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

	  	$queries = Travelplan::whereLocationId($location_id)->whereDestinationId($destination_id)->wherePickupDate($travel_date)->get();

		//$travel_date_suggestion = $travel_date_time->addDays(7)->toDateString();
		//$queries_suggestion = Travelplan::whereLocationId($location_id)->whereDestinationId($destination_id)->whereBetween('pickup_date',[$travel_date,$travel_date_suggestion])->get();
		
		$queries_suggestion = new \Illuminate\Database\Eloquent\Collection;

		$results = array();
		$results_suggestion = array();

		//========================================================
		/*if(count($queries) == 0)
		{
           $city = urlencode(Input::get("location"));
     
           $url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBL7UcOP2CaVXInuN7iXit1i5iw7EpXkTI&address=$city";
	       $json_data = file_get_contents($url);
	       $result = json_decode($json_data, TRUE);

	      
	
	        $latitude = urlencode($result['results'][0]['geometry']['location']['lat']);
	        $longitude = urlencode($result['results'][0]['geometry']['location']['lng']);
			
		  
           $near_url = "http://api.geonames.org/findNearbyPlaceNameJSON?lat=$latitude&lng=$longitude&cities=cities5000&radius=300&username=imraj";
           $near_url_th = "http://api.geonames.org/findNearbyPlaceNameJSON?lat=$latitude&lng=$longitude&cities=cities1000&radius=300&username=imraj";

	        $json_data = file_get_contents($near_url);
	        $json_data_th = file_get_contents($near_url_th);
	
	       $result = json_decode($json_data, TRUE);
	        $result_th = json_decode($json_data_th, TRUE);

           $geonames =  $result["geonames"];
            $geonames_th =  $result_th["geonames"];
	        foreach($geonames as $geoname)
	         {
	               $geoname_location = $geoname["name"];
	              
	               $geoname_location_id = Place::where('name','like',$geoname_location)->first()["id"];
	              
	               if($geoname_location_id!="")
	               {
	               	   $queries_geoname = Travelplan::whereLocationId($geoname_location_id)->whereDestinationId($destination_id)->wherePickupDate($travel_date)->get();
	           	   	  
		           	   if(count($queries_geoname) > 0)
		           	   {
		           	   	 $queries_suggestion = $queries_suggestion->merge($queries_geoname);	
		           	   }
	               }
	               

	        } 

	        foreach($geonames_th as $geoname_th)
	        {
	               $geoname_location_th = $geoname_th["name"];
	              
	               $geoname_location_id_th = Place::where('name','like',$geoname_location_th)->first()["id"];
	               if($geoname_location_id_th!="")
	               {
						 $queries_geoname_th = Travelplan::whereLocationId($geoname_location_id_th)->whereDestinationId($destination_id)->wherePickupDate($travel_date)->get();
			           	 if(count($queries_geoname_th) > 0)
			           	 {
			           	    $queries_suggestion = $queries_suggestion->merge($queries_geoname_th);	
			           	 }
	               }
	              
	        }  
	       
	    }
	    */
		//=======================================================


		foreach($queries as $query)
		{
			$id = $query["id"];
	  		$agency_id=$query['agency_id'];
			$price = $query["price"];
			$dropoff_location_id = $query["dropoff_location"];
			$pickup_location_id = $query["pickup_location"];
			$pickup_date = $query["pickup_date"];
			$pickup_time = $query["pickup_time"];
			$pickup_date = Carbon::parse($pickup_date)->toFormattedDateString();


			$agency = Agency::whereId($agency_id)->first()['name'];
			$dropoff_location = Pklocation::whereId($dropoff_location_id)->first()['location_address'];
			$pickup_location = Pklocation::whereId($pickup_location_id)->first()['location_address'];

			$result = array("id"=>$id,
									"Price"=>$price,
									"Agency"=>$agency,
									"DropOff_Location"=>$dropoff_location,
									"PickUp_Location"=>$pickup_location,
									"PickUp_Date"=>$pickup_date,
									"PickUp_Time"=>$pickup_time
								);

		 array_push($results,$result);

		}

		foreach($queries_suggestion as $query_suggestion)
		{
			$id = $query_suggestion["id"];
			$agency_id=$query_suggestion['agency_id'];
			$price = $query_suggestion["price"];

			$suggestion_location_id = $query_suggestion["location_id"];
			$suggestion_destination_id = $query_suggestion["destination_id"];

			$dropoff_location_id = $query_suggestion["dropoff_location"];
			$pickup_location_id = $query_suggestion["pickup_location"];
			$pickup_date = $query_suggestion["pickup_date"];
			$pickup_time = $query_suggestion["pickup_time"];

			$pickup_date = Carbon::parse($pickup_date)->toFormattedDateString();

			$suggestion_location = Place::whereId($suggestion_location_id)->first()["name"];
			$suggestion_destination = Place::whereId($suggestion_destination_id)->first()["name"];
			
			$agency = Agency::whereId($agency_id)->first()['name'];
			$dropoff_location = Pklocation::whereId($dropoff_location_id)->first()['location_address'];
			$pickup_location = Pklocation::whereId($pickup_location_id)->first()['location_address'];


			$result_suggestion = array("id"=>$id,
									"Price"=>$price,
									"Agency"=>$agency,
									"suggestion_location"=>$suggestion_location,
									"suggestion_destination"=>$suggestion_destination,
									"DropOff_Location"=>$dropoff_location,
									"PickUp_Location"=>$pickup_location,
									"pickup_date"=>$pickup_date,
									"pickup_time"=>$pickup_time
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

	  return View::make("trav.result")->with("results",$results)
														->with("location",$location)
														->with("destination",$destination)
														->with("travelDate",$date_time_formatted)
														->with("results_suggestion",$results_suggestion);
		
});



Route::get('/register',function(){
		return View::make("trav.register");
});

Route::post('/register',function(){
	$rules = array("fullName"=>"required|min:5",
								 "emailAddress"=>"required|email|unique:users",
								 "phoneNumber"=>"required|min:11|unique:users|numeric",
								 "password"=>"required|min:3",
								 "confirm_password"=>"required|same:password"
							  );
	$validator = Validator::make(Input::all(),$rules);

	if($validator->fails())
	{
		//return $validator->messages();
		return Redirect::to("/register")->withErrors($validator);
	}
	else
	{

	$user = User::create(["fullName"=>Input::get("fullName"),
						  "emailAddress"=>Input::get("emailAddress"),
						  "phoneNumber"=>Input::get("phoneNumber"),
						  "password"=>Hash::make(Input::get("password"))
											]);
		//Activate your trav account


				if($user->save())
				{
					//Welcome To Trav Email Address
					$toEmail = Input::get("emailAddress");
					$toFullname = Input::get("fullName");
					$subject = "Welcome To Trav";
					$fromEmail = "Mujahid.Raji@studentpartner.com";
					$fromFullname = "Mujahid";
					$data = array( "fullName"=>Input::get("fullName") );

					Mail::pretend("emails.registration",$data,function($message){
							$message->subject("Welcome To Trav");
							$message->from("no-reply@trav.com.ng","no-reply");
							$message->to(Input::get("emailAddress"),Input::get("fullName"));
					});
			    return Redirect::to("/login")->withSuccess("Account Successfully Created! Login to your account to continue");

				}
				else
				{
					return Redirect::back()->withInput()->withError("Invalid data supplied");
				}
		 }

});

Route::post("/register_api",function(){
                            
           
                           /*$val_rules = array();
                           $validator = Validator::make(Input:all(),$val_rules);
                            */
					$user = User::create([
												"fullName"=>Input::get("fullName"),
												"emailAddress"=>Input::get("emailAddress"),
												"phoneNumber"=>Input::get("phoneNumber"),
												"password"=>Hash::make(Input::get("password")),
												
											]);

					if( $user->save() )
					{
						$toEmail = Input::get("emailAddress");
						$toFullname = Input::get("fullName");
						$subject = "Welcome To Trav";
						$fromEmail = "imraj@trav.com.ng";
						$fromFullname = "Mujahid";
						$data = array( "fullName"=>Input::get("fullName") );
	
						Mail::send("emails.registration",$data,function($message){
	
								$message->subject("Welcome To Trav");
								$message->from("hello@trav.com.ng","Trav");
								$message->to(Input::get("emailAddress"),Input::get("fullName"));
	
						});
						return '{"message":"Account Successfully Created","status":"success"}';
					}
					else
					{
						return '{"message":"Error creating your account","status":"error"}';
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

Route::get("/login_api/{phoneNumber}/{password}",function($phoneNumber,$password){

	$alphabets = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

	$t_min = 111111;
	$t_max = 999999;
	$t_alpha_1 = $alphabets[rand(0,25)];
	$t_alpha_2 = $alphabets[rand(0,25)];
	$t_alpha_3 = $alphabets[rand(0,25)];
	$t_alpha_4 = $alphabets[rand(0,25)];
	$t_random_num = rand($t_min,$t_max);
	$token = $t_alpha_4.$t_alpha_1.$t_alpha_2.$t_alpha_3.$t_random_num.$t_alpha_1.$t_alpha_2;	


	$user = User::where("phoneNumber","=",$phoneNumber)->first();
	$pwd = $user->password;

	
	if(Hash::check($password,$pwd))
	{
		$user->mobileToken = $token;
		$user->save();
		
		return $user;
	}
	return '{"message":"Invalid Login Details","status":"failed"}';
	
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
	$pickup_date = $query["pickup_date"];
	$pickup_time = $query["pickup_time"];
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
							"PickUp_Date"=>$pickup_date,
							"PickUp_Time"=>$pickup_time
						);

	// Saving Transaction History
  $transaction = new Transaction;
	$transaction->transaction_details = "Bus Ticket From ".$location." To ".$destination;
	if(Auth::user())
			$transaction->transaction_by = Auth::user()->fullName;
	$transaction->transaction_type = "Book Now";
	$transaction->save();
 //Ends Saving Transaction History

	return View::make("trav.book")->with("result",$result);
}));


//All Tickets Purchased
Route::get("tickets",array("before"=>"auth",function(){
		$userId = Auth::user()->id;
		$tickets = Ticket::whereUserId($userId)->get();

		if(sizeof($tickets) > 0)
		{
			$tickets_array = array();
			foreach($tickets as $tick)
			{
				$ticket = array();

				$ticket["userId"] = $tick["user_id"];

				$travelplanId = $tick["travelplan_id"];

				$ticket["travelPlanId"] = $tick["travelplan_id"];
				$ticket["location"] = $tick["location"];
				$ticket["destination"] = $tick["destination"];
				$user = User::whereId($userId)->first();
				$ticket["fullName"] = $user->fullName;
				$ticket["phoneNumber"] = $user->phoneNumber;
				$ticket["emailAddress"] = $user->emailAddress;
				
				
				
				$travelplan = Travelplan::whereId($travelplanId)->first();
				$ticket["price"] = $travelplan["price"];
		$ticket["date"] = $travelplan["pickup_date"];
		$ticket["time"] = $travelplan["pickup_time"];

				$agencyId = $travelplan["agency_id"];
                $agency = Agency::whereId($agencyId)->first();
                $pickup_location_id = $travelplan["pickup_location"];
                $pickup_location = Pklocation::whereId($pickup_location_id)->first();
                
                $ticket["pickup_location_name"] = $pickup_location->location_name;
                $ticket["pickup_location_address"] = $pickup_location->location_address;             

                $dropoff_location_id = $travelplan["dropoff_location"];
                $dropoff_location = Pklocation::whereId($dropoff_location_id)->first();

                $ticket["dropoff_location_name"] = $dropoff_location->location_name;
                $ticket["dropoff_location_address"] = $dropoff_location->location_address;

		$ticket["agency"] = $agency->name;
		$ticket["ticketId"] = $tick["ticket_id"];
		$ticket["transactionId"] = $tick["transaction_id"];
		$ticket["simplePayId"] = $tick["simplepay_id"];
		$ticket["token"] = $tick["token"];

			array_push($tickets_array,$ticket);
			}
			
			return View::make("trav.tickets")->with("tickets",$tickets_array);
		}
		
}));

//View Individual Ticket
Route::get("ticket/{token}",array("before"=>"auth",function($token){
		$ticket = array();
                $userId = Auth::user()->id;
		$tick = Ticket::whereToken($token)->first();
		$ticket["userId"] = $tick["user_id"];
                $travelplanId = $tick["travelplan_id"];
		$ticket["travelPlanId"] = $tick["travelplan_id"];
		$ticket["location"] = $tick["location"];
		$ticket["destination"] = $tick["destination"];
		$user = User::whereId($userId)->first();
		$ticket["fullName"] = $user->fullName;
		$ticket["phoneNumber"] = $user->phoneNumber;
		$ticket["emailAddress"] = $user->emailAddress;

			
		$travelplan = Travelplan::whereId($travelplanId)->first();
			
	        $ticket["price"] = $travelplan["price"];
		$ticket["date"] = $travelplan["pickup_date"];
		$ticket["time"] = $travelplan["pickup_time"];
                $agencyId = $travelplan["agency_id"];
                 $agency = Agency::whereId($agencyId)->first();
		$ticket["agency"] = $agency->name;
                 $pickup_location_id = $travelplan["pickup_location"];
                $pickup_location = Pklocation::whereId($pickup_location_id)->first();
                
                $ticket["pickup_location_name"] = $pickup_location->location_name;
                $ticket["pickup_location_address"] = $pickup_location->location_address;             

                $dropoff_location_id = $travelplan["dropoff_location"];
                $dropoff_location = Pklocation::whereId($dropoff_location_id)->first();

                $ticket["dropoff_location_name"] = $dropoff_location->location_name;
                $ticket["dropoff_location_address"] = $dropoff_location->location_address;

		$ticket["ticketId"] = $tick["ticket_id"];
		$ticket["transactionId"] = $tick["transaction_id"];
		$ticket["simplePayId"] = $tick["simplepay_id"];
		$ticket["token"] = $tick["token"];
                
		return View::make("trav.ticket")->with("ticket",$ticket);
}));


Route::get("retrieve/password",function(){
	return View::make("trav.retrieve_password");
});


Route::get("retrieve/password/{reset_code}",function($reset_code){
	$password_reset_code = $reset_code;

	$user = User::wherePasswordResetCode($password_reset_code)->first();

	if($user != "")
	{
		return View::make("trav.password_reset")->with("code",$password_reset_code);
	}
	else{
		return Redirect::to("/retrieve/password")->withError(" Reset Link has expired or invalid ");
	}


});

Route::post("/reset/password",function(){


	$rules = array("new_password"=>"required|min:5",
								 "confirm_new_password"=>"required|min:5|same:new_password"
							);

	$validator = Validator::make(Input::all(),$rules);

	if($validator->fails())
	{
		return Redirect::back()->withErrors($validator);
	}
	else{
		$password_reset_code = Input::get("code");
		$new_password = Input::get("new_password");

		$user = User::wherePasswordResetCode($password_reset_code)->first();
		$user->password = Hash::make($new_password);
		$user->password_reset_code = "";
		$user->save();

		return Redirect::to("/login")->withSuccess("Password Reset Successful! Login to your account to continue");
	
	}

});

Route::post("/retrieve/password",function(){
	$email = Input::get("emailAddress");

	$user = User::whereEmailaddress($email)->first();
	if($user != "")
	{
		$alphabets = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

			$t_min = 1111;
			$t_max = 9999;
			$t_alpha_1 = $alphabets[rand(0,25)];
			$t_alpha_2 = $alphabets[rand(0,25)];
			$t_alpha_3 = $alphabets[rand(0,25)];
			$t_alpha_4 = $alphabets[rand(0,25)];
			$t_random_num = rand($t_min,$t_max);
			$reset_code = $t_alpha_4.$t_alpha_3.$t_random_num.$t_alpha_1.$t_alpha_2;

			$token = $user->remember_token;
			$user->password_reset_code = $token.md5($token).$reset_code;
			//add password reset code to db
			

		    $emailAddress = $user->emailAddress;
			$fullName = $user->fullName;
			$password_reset_code = $user->password_reset_code;
			$data = array("token"=>$token,"fullName"=>$fullName,"password_reset_code"=>$password_reset_code);
		  	$user->save();

			//send email
			Mail::pretend('emails.password_reset',$data,function($message)use($fullName){
                                        $message->subject("Trav's Account Password Reset");                                
			                $message->from("password-reset@trav.com.ng","Trav");
					$message->to(Input::get("emailAddress"),$fullName);
					
			});

			//return "http://trav.dev:90/retrieve/password/".$password_reset_code;
			return Redirect::to("/retrieve/password")->withSuccess("A password reset link has been sent to your email address");
	}
	else
	{
		return Redirect::to("/retrieve/password")->withError("This User does not exist. Click <a href='/register'>here</a> to create an account");
	}
});


Route::get("/admin/users",function(){
	$users = User::all();
	return View::make("admin.users")->with("users",$users);
});

Route::get("/result/{id}/pay",array("before"=>"auth",function($id){
	$user = Auth::User();
	$tplan = Travelplan::whereId($id)->get()->first();

	$id = $tplan["id"];
	$agency_id = $tplan["agency_id"];
	$location_id = $tplan["location_id"];
	$destination_id = $tplan["destination_id"];
	$dropoff_location_id = $tplan["dropoff_location"];
	$pickup_location_id = $tplan["pickup_location"];
	$pickup_date = $tplan["pickup_date"];
	$pickup_time = $tplan["pickup_time"];
	$price = $tplan["price"];

	$agency = Agency::whereId($agency_id)->first();
	$location = Place::whereId($location_id)->first();
	$destination = Place::whereId($destination_id)->first();
	$dropoff_location = PKLocation::whereId($dropoff_location_id)->first();
	$pickup_location = PKLocation::whereId($pickup_location_id)->first();


	$tplan = array("travelplan_id"=>$id,
				   "agency_name" => $agency["name"],
	               "location"=>$location["name"],
								 "destination"=>$destination["name"],
								 "pickup_name"=>$pickup_location["location_name"],"pickup_address"=>$pickup_location["location_address"],
								 "dropoff_name"=>$dropoff_location["location_name"],"dropoff_address"=>$dropoff_location["location_address"],
							   "pickup_date"=>$pickup_date,"price"=>$price,"pickup_time"=>$pickup_time);

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
}));

Route::get("/about",function(){
	return View::make("trav.about");
});

Route::get("/profile",array("before"=>"auth",function(){
	$user = Auth::user();

	return View::make("trav.profile")->with("user",$user);
}));

Route::get("/edit_email",array("before"=>"auth",function(){
	return View::make("trav.new_email_address");
}));

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

Route::get("/edit_phoneNo",array("before"=>"auth",function(){
	return View::make("trav.new_phone_number");
}));

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

Route::get("/edit_password",array("before"=>"auth",function(){
	return View::make("trav.new_password");
}));

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

Route::get("/edit_kin",array("before"=>"auth",function(){
	return View::make("trav.new_kin");
}));

Route::post("/update_kin",function(){
	$fullname = Input::get("next_kin_fullname");
	$phoneNo = Input::get("next_kin_phoneNo");
	$userId = Auth::user()->id;
	$userPhoneNo = Auth::user()->phoneNumber;

	if($phoneNo != $userPhoneNo)
	{
		$user = User::find($userId);
		$user->next_of_kin_name = $fullname;
		$user->next_of_kin_phoneNo = $phoneNo;

		if($user->save())
			return Redirect::to("/edit_kin")->withSuccess("Next Of Kin Profile Updated Successfully");
	}
	else
	{
		return Redirect::back()->withError("Next of kin's phone number and user's phone number cannot be the same");
	}
	
});

Route::get("/contact",function(){

	return View::make("trav.contact");

});

Route::post("/contact",function(){

	$email = "hello@trav.com.ng";
	$msg_title = Input::get("title");
	$msg_main = Input::get("message");
    $fullName = $user->fullName ? $user->fullName : "Anon";
	//return $msg_title." | ".$msg_main;
	Mail::send($msg_main,function($message){
		$message->to($email,$msg_title)->subject($msg_title." by ".$fullName);
	});

	return Redirect::to("/contact")->withSuccess("Message Sent. We'll get back to you shortly");
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
		$travelplan_id = $_POST["travelplan_id"];
		$email_address = $_POST["email_address"];
		$phone_number = $_POST["phone_number"];
		$price = $_POST["price"];
		$fullname = $_POST["fullname"];
		$token = $_POST["token"];

		$alphabets = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

		$min = 111111111111;
		$max = 999999999999;
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
		$ticket_id = $alpha_num_1.$alpha_num_2.$alpha_num_3.$random_num;

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

		

		$response_content = $curl_response[0];

		$json_response = json_decode(chop($response_content), TRUE);

$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

$simplePay = json_decode($response_content);

if ($response_code == '200') {
// even is http status code is 200 we still need to check transaction had issues or not
if ($json_response['response_code'] == '20000'){
	

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
	$funding = $source->funding;
	$object = $source->object;

	$ticket = Ticket::create([
		"location"=>$location,
		"destination"=>$destination,
		"travelplan_id"=>$travelplan_id,
		"user_id"=>Auth::user()->id,
		"transaction_id"=>$transaction_id,
		"ticket_id"=>$ticket_id,
		"simplepay_id"=>$id,
		"token"=>$token
	]);
	$ticket->save();

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
	$tb_simple_pay->save();

	//send ticket to email address
	$travelplan = Travelplan::whereId($travelplan_id)->first();
		
	$date = $travelplan["pickup_date"];
	$time = $travelplan["pickup_time"];
    $agencyId = $travelplan["agency_id"];
   	
    $pickup_location_id = $travelplan["pickup_location"];
    $pickup_location = Pklocation::whereId($pickup_location_id)->first();
    $pickup_location_name = $pickup_location->location_name;
    $pickup_location_address = $pickup_location->location_address;             

    $dropoff_location_id = $travelplan["dropoff_location"];
    $dropoff_location = Pklocation::whereId($dropoff_location_id)->first();
    $dropoff_location_name = $dropoff_location->location_name;
    $dropoff_location_address = $dropoff_location->location_address; 

    $data = array("fullname"=>$fullname,
    			  "email"=>$email_address,
    			  "agency"=>$agency,
    			  "location"=>$location,
    			  "destination"=>$destination,
    			  "price"=>$price,
    			  "ticket_id"=>$ticket_id,
    			  "transaction_id"=>$transaction_id,
    			  "simplepay_id"=>$simplepay_id,
    			  "token"=>$token,
    			  "pickup_location_address"=>$pickup_location_address,
    			  "dropoff_location_address"=>$dropoff_location_address,
    			  "date"=>$date,
    			  "time"=>$time
    			);


	Mail::send("emails.ticket",$data,function($message)
		use($fullname,$email_address,$agency,$location,$destination,
				$price,$ticket_id,$transaction_id,simplepay_id,token,
				$pickup_location_name,$pickup_location_address,$dropoff_location_name,
				$dropoff_location_address,$date,$time){
		$message->subject($agency + " Ticket for " + $location + " to " + $destination);
		$message->to($email_address);
		$message->from("ticket@trav.com.ng");
	});

	//send ticket to phone number

	//redirect to ticket view
	return Redirect::to("ticket/".$token);

	

}
	else if($json_response['response_code'] == '11000'){
		//echo "Request at a later time";
		return Redirect::back()->withError("Payment Failed ! Try again later or Contact our customer care  ");
	}
	else if($json_response['response_code'] == '50100')
	{
		//echo "Technical error with credit card or bank access";
		return Redirect::back()->withError("Technical error with credit card or bank access! Contact our customer care for more information");
	}
	else{
	     //echo "failed : " .$json_response['response_code']."|".$response_code;
	     return Redirect::back()->withError("Payment Failed ! Try again later or Contact our customer care  ");
	}
} 
else {

	//echo "Failed Now : ".$response_code." | Response Content : " . $response_content;
	return Redirect::back()->withError("An error occured! Try again later or contact our customer care");
}});
