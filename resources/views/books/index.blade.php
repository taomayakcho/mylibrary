@extends('layouts.app')

@section('content')
    <h1>Books List</h1>
    @if(count($books) > 0)
        @foreach($books as $book)
        <div class="well" style="width:20%">
            <div class="row" style="text-align:center">
                    <img style="width:90%" src="/storage/cover_images/{{$book->cover_image}}">
                    <h4><a href="/books/{{$book->id}}">{{$book->title}}</a></h4>
                    <h5><a href="/books/{{$book->id}}">{{$book->author}}</a></h5>
            </div>
        </div>
        @endforeach
        {{$books->links()}}
    @else
        <p>No Post Found!!</p>
    @endif
@endsection