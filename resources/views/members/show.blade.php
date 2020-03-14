@extends('layouts.app')

@section('content')
<hr>
<a href="/members" class="btn btn-default">Go Back</a>
<h3>Name:<b>{{$member->name}}</b></h3>
<h4>Father's Name   :<b>{{$member->father}}</b></h4>
<h4>Phone No.       :<b>{{$member->phone}}</b></h4>
<h4>Address         :<b>{{$member->address}}</b></h4>
<h4>Date of Birth   :<b>{{$member->dob}}</b></h4>
<h4>Section         :<b>{{$member->section}}</b></h4>
<h4>Validate        :<b>{{$member->valid}}</b></h4>
<br>
@if(!Auth::guest())
<a href="/members/{{$member->id}}/edit" class="btn btn-default">Edit</a>

        {!!Form::open(['action' => ['MembersController@destroy',$member->id],'method' => 'POST','class' =>'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="panel-body">
                    
                    <h3>Book List</h3>

                    <table class="table table-striped">
                        <tr>
                                <th>Book ID</th>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                                <th>Author</th>
                                <th>Issued Date</th>
                                <th></th>
                                <th>Return Date</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> 
                            <td></td>
                            <td></td>
                            <td></td> 
                            <td></td>
                            <td></td> 
                            <td><a href="/books/edit" class="btn btn-primary">Return</a></td>
                            <td><a href="/books/edit" class="btn btn-success">Issued</a></td>                          
                           <td> <a href="/books/edit" class="btn btn-default">Edit</a></td>
                        </tr>
                    </table>
                </div>
   
            </div>
        </div>
    </div>
</div>
        
@endsection
