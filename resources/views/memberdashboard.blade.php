@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="panel-body"><h1>Member Dashboard</h1></div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form action="/search" method="get">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </span>
                        </div>
                        </form>
                    </div>
                    <br>
                    <br>
                    <h3>Member List</h3>
                    @if (count($members) > 0)

                    <table class="table table-striped">
                        <tr>
                                <th>Member ID</th>
                                <th>Name</th>
                                <th>Father</th>
                                <th>Phone</th> 
                                <th>Adress</th>
                                <th>Section</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                        </tr>
                        @foreach($members as $member)
                        <tr>
                            <td>{{$member->id}}</td>
                            <td><a href="/members/{{$member->id}}">{{$member->name}}</a></td>
                            <td>{{$member->father}}</td>
                            <td>{{$member->phone}}</td>
                            <td>{{$member->address}}</td>
                            <td>{{$member->section}}</td>
                            <td></td>
                            <td></td>  
                            <td></td>
                            <td><a href="/members/{{$member->id}}" class="btn btn-primary">Profile</a></td>                          
                            <td>
                                <a href="/members/{{$member->id}}/edit" class="btn btn-default">Edit</a>

                                {!!Form::open(['action' => ['MembersController@destroy',$member->id],'method' => 'POST','class' =>'pull-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You have no Book List<p>
                    @endif
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
