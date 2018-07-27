@extends('layouts.master')
<!-- Include master file -->
  <a href="{{ url('/logout') }}" style="float: right; font-weight: bold; color: red; background-color: cyan; padding: 14px 25px; ">Logout</a> 
@section('content')

    <h2>Create Post</h2>

<!-- {!! Form::open(array('action' => 'CreatepostController@store')) !!} -->
 {!! Form::open(array('action' => 'CreatepostController@store','files'=>true)) !!}
{!! csrf_field() !!}
    {{form::label('title','Title:')}}
    {{form::text('title',null,array('class'=>'form-control'))}}

    {{form::label('content','Content:')}}
    {{form::text('content',null,array('class'=>'form-control'))}}

    {!! Form::file('image', null) !!}

    {{form::submit('Create Post' , array('class'=>'btn btn-success btn-lg btn-block' , 'style' =>'margin-top:20px'))}}

 @include('partial.formerror')
{!! Form::close() !!}

@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
<img src="images/{{ Session::get('image') }}">
@endif
@endsection