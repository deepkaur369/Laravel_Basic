<?php

namespace App\Http\Controllers;

use App\Users;
use Auth;
use Session;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{
     public function create()
    {
    	/*show the registration page*/
        return view('registration.create');
    }

	public function store()
    {
        $this->validate(request(), [
            'name' 		=> 'required',
            'email'		=> 'required|email',
            'password' 	=> 'required'
        ]);
        /* send the request to model */
        $user = Users::create(request(['name', 'email', 'password'])); 
        if($user==false){
        	/*if email is already register , redirect back to registration page with error message*/
   			return redirect()->back()->withInput()->with('error', 'Email is already register');
    	}
        else{
        	return redirect('/login');
        }

    }
}
?>
