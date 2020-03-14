@extends('layouts.app')

@section('content')
    <h1>Enter Book</h1>
    {!! Form::open(['action' => 'PostsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('author','Author')}}
        {{Form::text('author','',['class' => 'form-control','placeholder' => 'Author'])}}
    </div>

    <p>Body Text</p>
    <div class="form-group">
        {{Form::textarea('body','',['class' => 'form-control','placeholder' => 'Body Text'])}}
    </div>
    
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
