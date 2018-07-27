<?php

namespace App\Http\Controllers;

use App\Users;
use Auth;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	 public function create()
    {
        return view('login');
    }
    public function store()
    {
    	$this->validate(request(), [
            'email'		=> 'required',
            'password' 	=> 'required'
        ]);
        $user = Users::select(request(['email', 'password']));
        if($user==false){
        	/*if email or password is incorrect , redirect back to login page with error message*/
   			return redirect()->back()->withInput()->with('error', 'The email or password is incorrect, please try again');
    	}
        else{
        	return redirect('/createpost');
        }
    }
    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/login');
    }
}
?>