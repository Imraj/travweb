<?php

class TodoController extends \BaseController {



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
		$all_todos = Todo::all();
		return View::make("admin.todos")->with("all_todos",$all_todos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("admin.new_todo");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$todo = new Todo;
		$todo->task = Input::get("task");
		$todo->deadline = Input::get("deadline");

		if($todo->save())
		{
			// Store the activity
			$activity = new Activity;
			$activity->type = " Add New Task  ";
			$activity->details = $todo->task . " Added To Task List";
			$activity->activity_by = Auth::user()->fullName;
			$activity->save();

			return Redirect::to("/admin/todo");
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
