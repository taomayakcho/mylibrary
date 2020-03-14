@extends('layouts.app')

@section('content')
<h1>Members List</h1>
@if(count($members) > 0)
    @foreach($members as $member)
        <div class="well">
                <h4><a href="/members/{{$member->id}}">{{$member->name}}</a></h4>
                <h5>{{$member->father}}</h5>
        </div>
    @endforeach
    {{$members->links()}}
@else
    <p>No Members Found!!</p>
@endif
@endsection