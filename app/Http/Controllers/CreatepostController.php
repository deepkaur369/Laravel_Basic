<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatepostController extends Controller
{
    public function create()
    {
        return view('createpost');
    }
    public function store(){
    	        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:110',

        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);

         return back()

             ->with('success','You have successfully upload image.')

           	 ->with('image',$imageName);
    }
}
