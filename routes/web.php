<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function()
{
    return view('Practice', ['name' => 'James' ,'key'=> '121212']);
    //return view('Practice')->with('name', 'Victoria');
});

Route::get('/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');
 
Route::get('/login', 'SessionsController@create');
Route::post('/login', [ 'as' => 'login', 'uses' => 'SessionsController@store']);
Route::get('/logout', 'SessionsController@destroy');
Route::get('/createpost', 'CreatepostController@create');
Route::post('/createpost', 'CreatepostController@store');
