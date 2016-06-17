<?php

class PklocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	 public function __construct()
 	 {
 		$this->beforeFilter('auth');
 	 }


	public function index()
	{
		$pklocations = PKLocation::all();
		$all_pks = array();
		foreach($pklocations as $pklocation)
		{
				$id = $pklocation->id;
				$agency_id = $pklocation->agency_id;

				$agency_name = Agency::whereId($agency_id)->first()["name"];
				$location_name = $pklocation->location_name;
				$location_address = $pklocation->location_address;

				$all_pklocation = array("id"=>$id,
															  "agency_id"=>$agency_id,
																"agency_name"=>$agency_name,
																"location_name"=>$location_name,
																"location_address"=>$location_address
															);

			 array_push($all_pks,$all_pklocation);
		}
		//return $all_pks;
		return View::make("admin.pklocations")->with("all_pklocations",$all_pks);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("admin.new_pklocation");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pklocation = new PKLocation(Input::all());
		if($pklocation->save())
		{
			// Store the activity
			$activity = new Activity;
			$activity->type = " Add New Pick Up Location ";
			$activity->details = "Location ".$pklocation->location_name. " Added For Agency ".$pklocation->agency_id;
			$activity->activity_by = Auth::user()->fullName;
			$activity->save();

			return Redirect::to("/admin/pklocation");
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
