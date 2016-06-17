<?php

class TravelplanController extends \BaseController {



	public function __construct()
	{
		$this->beforeFilter('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tplans = Travelplan::all();

		$all_tplans = array();

		foreach($tplans as $tplan)
		{
			$id = $tplan->id;
			$agency_id = $tplan->agency_id;
			$agency_name = Agency::whereId($agency_id)->first()['name'];

			$location_id = $tplan->location_id;
			$location_name = Place::whereId($location_id)->first()['name'];

			$destination_id = $tplan->destination_id;
			$destination_name = Place::whereId($destination_id)->first()['name'];

			$price = $tplan ->price;

			$pickup_datetime = $tplan->pickup_datetime;

			$pickup_location_id = $tplan->pickup_location;
			$pickup_location_name = Pklocation::whereId($pickup_location_id)->first()['location_name'];
			$pickup_location_address = Pklocation::whereId($pickup_location_id)->first()['location_address'];

			$dropoff_location_id = $tplan->dropoff_location;
			$dropoff_location_name = Pklocation::whereId($dropoff_location_id)->first()['location_name'];
			$dropoff_location_address = Pklocation::whereId($dropoff_location_id)->first()['location_address'];

			$all_tplan = array("id"=>$id,"agency_id"=>$agency_id,"agency_name"=>$agency_name,
												"location_name"=>$location_name,"destination_name"=>$destination_name,
												"price"=>$price,"pickup_datetime"=>$pickup_datetime,
												"pickup_location_name"=>$pickup_location_name,
												"pickup_location_address"=>$pickup_location_address,
												"dropoff_location_name"=>$dropoff_location_name,
												"dropoff_location_address"=>$dropoff_location_address
											);
			array_push($all_tplans,$all_tplan);
		}
		return View::make("admin.tplans")->with("all_tplans",$all_tplans);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("admin.new_tplan");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$travelPlan = new Travelplan;

		$travelPlan->agency_id = Input::get("agency_id");
		$travelPlan->location_id = Input::get("location_id");
		$travelPlan->destination_id = Input::get("destination_id");
		$travelPlan->price = Input::get("price");
		$travelPlan->pickup_datetime = Input::get("pickup_datetime");
		$travelPlan->pickup_location = Input::get("pickup_location");
		$travelPlan->dropoff_location = Input::get("dropoff_location");

		if($travelPlan->save())
		{
			// Store the activity
			$activity = new Activity;
			$activity->type = " Add New Travel Plan ";
			$activity->details = "Travel Plan From ".$travelPlan->location_id.
																" To ".$travelPlan->destination_id." By Agency ".$travelPlan->agency_id." Added ";
			$activity->activity_by = Auth::user()->fullName;
			$activity->save();

			return Redirect::to("/admin/travelplan");
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tplan = Travelplan::whereId($id)->first();

		$agency_id = $tplan->agency_id;
		$agency_name = Agency::whereId($agency_id)->first()['name'];


		$location_id = $tplan->location_id;
		$location_name = Place::whereId($location_id)->first()['name'];

		$destination_id = $tplan->destination_id;
		$destination_name = Place::whereId($destination_id)->first()['name'];

		$price = $tplan->price;

		$pickup_location = $tplan->pickup_location;
		$pickup_name = Pklocation::whereId($pickup_location)->first()['name'];

		$dropoff_location = $tplan->dropoff_location;
		$dropoff_name = Pklocation::whereId($dropoff_location)->first()['name'];

		$pickup_datetime = $tplan->pickup_datetime;

		$plan = array();
		$plan["agency_name"] = $agency_name;
		$plan["location_name"] = $location_name;
		$plan["destination_name"] = $destination_name;
		$plan["price"] = $price;
		$plan["pickup_location"] = $pickup_name;
		$plan["dropoff_location"] = $dropoff_name;
		$plan["pickup_datetime"] = $pickup_datetime;

		$test = "Test";
		//return "Location Id : ".$location_name." | Destination Id : ".$destination_name;
		return View::make("admin.edit_tplan")->with("plan",$plan)->with("test",$test);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//Travelplan::whereId($id)->destroy();
		return "destroy id";
	}


}
