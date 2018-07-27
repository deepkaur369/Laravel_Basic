@extends('layouts.master')
<!-- Include master file -->
  <a href="{{ url('login') }}" style="float: right; font-weight: bold; color: red; background-color: cyan; padding: 14px 25px; ">Login</a> 
@section('content')

    <h2>Register</h2>

{!! Form::open(array('action' => 'RegistrationController@store')) !!}
{!! csrf_field() !!}
    {{form::label('name','Name:')}}
    {{form::text('name',null,array('class'=>'form-control'))}}

    {{form::label('email','Email:')}}
    {{form::text('email',null,array('class'=>'form-control'))}}

    {{form::label('password','Password:')}}
    {{form::password('password',array('class'=>'form-control' ))}}

    {{form::submit('Register' , array('class'=>'btn btn-success btn-lg btn-block' , 'style' =>'margin-top:20px'))}}

 @include('partial.formerror')
{!! Form::close() !!}
@if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
@endsection