@extends('layouts.app')

@section('content')

<a href="/books" class="btn btn-default">Go Back</a>
<hr>
<div class="well">
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <img style="width:100%" src="/storage/cover_images/{{$book->cover_image}}">
        </div>
        <div class="col-md-4 col-sm-4">
            <h3><b>{{$book->title}}</b></h1>
            <h4>{{$book->author}}</h3>
                <br>
            <h5>{{$book->body}}</h3>
        </div>
    </div>
</div>

@if(!Auth::guest())
    @if(!Auth::user()->id == $book->user_id)
        <a href="/books/{{$book->id}}/edit" class="btn btn-default">Edit</a>
        <a href="/books/{{$book->id}}/edit" class="btn btn-primary">Book</a>
        {!!Form::open(['action' => ['PostsController@destroy',$book->id],'method' => 'POST','class' =>'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif
@endif
@endsection
