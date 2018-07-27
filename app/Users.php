<?php

namespace App;
use Mail;
use App\Mail\EmailVerification;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class Users extends Model
{
   protected $table = 'user';
   public static function create()
    {
        $user= Input::all();
        $user = new Users;
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        //$existing = User::select('email')->where('email',$user->email);  
		if(sizeof(Users::where('email','=',Input::get('email'))->get()) > 0) {   
			return false; 
    	}
    	else{
    		//     $activation_link = route('login', ['email' => $user->email, 'verification_token' => urlencode($user->verification_token)]);
    		    
    		//     Mail::send('test_mail', ['name' => $user->name, 'activation_link' => $activation_link], function ($message) use($user,$activation_link)
      //  {
      //     $message->to($user->email, $user->name)->subject('Welcome to Expertphp.in!');    
      //   });
    		// //$user->save();
    		// return true;
            $email = new test_mail($this->user);
Mail::to($this->user->email)->send($email);
    	}
    }
    public static function select(){
    	$user= Input::all();
        $user = new Users;
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        if((sizeof(Users::where('email','=',Input::get('email'))->get()))&&(sizeof(Users::where('password','=',Input::get('password'))->get())) ){   

			return true;
    	}
    	else{
    		return false;
    	}
    
    }
}
?>
