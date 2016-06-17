<?php

class CarController extends \BaseController {


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

		$cars = Car::all();
		$all_cars = array();
		foreach($cars as $car)
		{
				$id = $car["id"];
				$agency_id = $car["agency_id"];
				$car_number = $car["car_number"];
				$car_info = $car["car_info"];
				$agency_name = Agency::whereId($agency_id)->first()['name'];

				$all_car = array("id"=>$id,
											  "agency_id"=>$agency_id,
												"car_number"=>$car_number,
												"car_info"=>$car_info,
												"agency_name"=>$agency_name);

			 array_push($all_cars,$all_car);
		}

		return View::make("admin.cars")->with("all_cars",$all_cars);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("admin.new_car");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$car = new Car;
		$car->car_number = Input::get("car_number");
		$car->car_info = Input::get("car_info");
		$car->agency_id = Input::get("agency_id");

		if($car->save())
		{
			// Store the activity
			$activity = new Activity;
			$activity->type = " Add New Car ";
			$activity->details = "Car ".$car->number."(".$car->info.")". " Added";
			$activity->activity_by = Auth::user()->fullName;
			$activity->save();
      // End Activity Store
			return Redirect::to("/admin/car");
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
		//
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
		//
	}


}
