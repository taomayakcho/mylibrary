@extends('layouts.app')

@section('content')
<h2>Enter Member</h2>
{!! Form::open(['action' => 'MembersController@store','method' => 'MEMBER', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class' => 'form-control','placeholder' => 'Full Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('father','Father Name')}}
        {{Form::text('father','',['class' => 'form-control','placeholder' => 'Father Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('phone','Phone no')}}
        {{Form::text('phone','',['class' => 'form-control','placeholder' => 'Phone no'])}}
    </div>

    <div class="form-group">
        {{Form::label('dob','Date of Birth')}}
        {{Form::text('dob','',['class' => 'form-control','placeholder' => 'Date of Birth'])}}
    </div>

    <div class="form-group">
        {{Form::label('address','Address')}}
        {{Form::text('address','',['class' => 'form-control','placeholder' => 'Address'])}}
    </div>

    <div class="form-group">
        {{Form::label('section','Section')}}
        {{Form::text('section','',['class' => 'form-control','placeholder' => 'Section'])}}
    </div>

    <div class="form-group">
        {{Form::label('valid','Session Year')}}
        {{Form::text('valid','',['class' => 'form-control','placeholder' => 'yyyy-mm-dd'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    <hr>
    <hr>
@endsection