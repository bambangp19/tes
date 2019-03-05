<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class tambahusercontroller extends Controller
{

	public function  kk()
    {
    	return view('tambahuser');
    }
     public function tambahu(Request $request)
    {
    	$password = rand(999,99999);
    	$user = New User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($password);
        $user->pass_random = $password;
    	//$user->status = 0;
    	$user->status =$request->status;
    	$user->save();

    	return redirect('home');
    }

    

     public function indexx()
    {
        $data = User::orderBy('id','desc')->get();
        return view('home',compact('data'));
    }
}
