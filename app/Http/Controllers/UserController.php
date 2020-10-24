<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

	public function index()
	{
		$user = User::all();

		return view('admin.user')->withUsers($user);
	}

	public function update(Request $request)
	{
		$request->validate([
			'name'=> 'required',
			'email'=> 'required',
			'phone'=>'required'
		]);

		//return $request->all();
		$user = User::findOrFail($request->id);
		// $rt = $user->update([
		// 	'name' => $request->name,
		// 	'email' => $request->email,
		// 	'phone' => $request->phone,
			
		// ]);
		$rt = $user->update($request->all());
		return $rt;
		
		return redirect('admin/user');
	}
}
