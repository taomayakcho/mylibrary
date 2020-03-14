@extends('layouts.app')

@section('content')
<h2>Edit Member</h2>
{!! Form::open(['action' => ['MembersController@update',$member->id],'method' => 'PUT'])!!}
    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name',$member->name,['class' => 'form-control','placeholder' => 'Full Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('father','Father Name')}}
        {{Form::text('father',$member->father,['class' => 'form-control','placeholder' => 'Father Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('phone','Phone no')}}
        {{Form::text('phone',$member->phone,['class' => 'form-control','placeholder' => 'Phone no'])}}
    </div>

    <div class="form-group">
        {{Form::label('dob','Date of Birth')}}
        {{Form::text('dob',$member->dob,['class' => 'form-control','placeholder' => 'Date of Birth'])}}
    </div>

    <div class="form-group">
        {{Form::label('address','Address')}}
        {{Form::text('address',$member->address,['class' => 'form-control','placeholder' => 'Address'])}}
    </div>

    <div class="form-group">
        {{Form::label('section','Section')}}
        {{Form::text('section',$member->section,['class' => 'form-control','placeholder' => 'Section'])}}
    </div>

    <div class="form-group">
        {{Form::label('valid','Session Year')}}
        {{Form::text('valid',$member->valid,['class' => 'form-control','placeholder' => 'yyyy-mm-dd'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection