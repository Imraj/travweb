<?php

class AgencyController extends \BaseController {


	public function __construct()
	{
		$this->beforeFilter('auth');
		//$this->beforeFilter('is_admin'==true);
	 //  return	Auth::user()->is_admin == true;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$agencies = Agency::all();

		return View::make("admin.agencies")->with("agencies",$agencies);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("admin.new_agency");


	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$agency = new Agency;
		$agency->name = Input::get("name");
		$agency->description = Input::get("description");
		$agency->logo_path = Input::file("logo_path")->getClientOriginalName();
		$agency->url = Input::get("url");

		$filename = Input::file("logo_path")->getClientOriginalName();

		if($agency->save()){
				Input::file("logo_path")->move(storage_path()."/Alogos",$filename);

				// Store the activity
				$activity = new Activity;
				$activity->type = " Add New Agency ";
				$activity->details = $agency->name. " Added";
				$activity->activity_by = Auth::user()->fullName;
				$activity->save();
		}

		return Redirect::back();
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
		$agency = Agency::whereId($id)->first();
		return $agency;
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
		$agency = Agency::whereId($id)->first();
		return $agency;
	}


}
