@extends('layouts.master')
<!-- Include master file -->
  <a href="{{ url('/logout') }}" style="float: right; font-weight: bold; color: red; background-color: cyan; padding: 14px 25px; ">Logout</a> 
@section('content')
 
    <h2>Login</h2>

{!! Form::open(array('action' => 'SessionsController@store')) !!}
{!! csrf_field() !!}

    {{form::label('email','Email:')}}
    {{form::text('email',null,array('class'=>'form-control'))}}

    {{form::label('password','Password:')}}
    {{form::password('password',array('class'=>'form-control' ))}}

    {{form::submit('Login' , array('class'=>'btn btn-success btn-lg btn-block' , 'style' =>'margin-top:20px'))}}

 @include('partial.formerror')
{!! Form::close() !!}
@if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
@endsection