<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::get()->toJson(JSON_PRETTY_PRINT);
		return response($users, 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$user = new User;
		$user->full_name = $request->full_name;
		$user->dob = $request->dob;
		$user->gender = $request->gender;
		$user->save();

		return response()->json([
			"message" => "User added"
		], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(User::where('id', $id)->exists()):
			$user = User::find($id);
			$user->full_name = is_null($request->full_name) ? $user->full_name : $request->full_name;
			$user->dob = is_null($request->dob) ? $user->dob : $request->dob;
			$user->gender = is_null($request->gender) ? $user->gender : $request->gender;
			$user->save();

			return response()->json([
				"message" => "user updated"
			], 200);
		else:
			return response()->json([
				"message" => "user not found"
			], 200);
		endif;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
