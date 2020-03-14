@extends('layouts.app')

@section('content')
<a href="/dashboard" class="btn btn-secondary">Go Back</a>
    <h1>Edit Book</h1>
    {!! Form::open(['action' => ['PostsController@update',$book->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$book->title,['class' => 'form-control','placeholder' => 'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('author','Author')}}
        {{Form::text('author',$book->author,['class' => 'form-control','placeholder' => 'Author'])}}
    </div>
    
    <p>Body Text</p>
    <div class="form-group">
        {{Form::textarea('body',$book->body,['class' => 'form-control','placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
