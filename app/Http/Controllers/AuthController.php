<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
	public function login()
	{
		return view('login');
	}
	public function checklogin(Request $request)
	{
		$this->validate($request , [
			'email' => 'required|email' ,
			'password' => 'required|min:2' ,
		]);

		if (auth()->attempt(request(['email' , 'password'])))
		{
			return redirect('/');
		}
		return back()->with([
			'login' => 'Error in Login'
		]);
	}
	public function register()
	{
		return view('register');
	}
	public function checkregister(Request $request)
	{
		$this->validate($request , [
			'name' => 'required' ,
			'email' => 'required|email' ,
			'password' => 'required|min:6' ,
		]);
		$user = new User;
		$user->name = request('name');
		$user->email = request('email');
		$user->email = request('email');
		$user->password = bcrypt(request('password'));
		$user->save();
		auth()->login($user);
		return redirect('/');
	}
	public function logout()
	{
		auth()->logout();
		return redirect('auth/login');
	}
}
