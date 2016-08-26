<?php

class RouteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$places = Place::all();
		return View::make("route.location.places")->with("places",$places);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("route.location.new_place");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$place = new Place;
		$place->name = Input::get("name");
		$place->state = Input::get("state");
		$placeName = Input::get("name");
		$city = urlencode($placeName);
		$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$city";
		$json_data = file_get_contents($url);
		$result = json_decode($json_data, TRUE);
		$latitude = $result['results'][0]['geometry']['location']['lat'];
		$longitude = $result['results'][0]['geometry']['location']['lng'];

		$place->longitude = $longitude;
		$place->latitude = $latitude;
		

		if($place->save())
		{
			// Store the activity
			$activity = new Activity;
			$activity->type = " Add New Place ";
			$activity->details = $place->name. " Added To Places";
			$activity->activity_by = Auth::user()->fullName;
			$activity->save();

			return Redirect::back();
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
