@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="panel-body"><h1>Book Dashboard</h1></div>
                <div class="col-md-7">
                <form action="{{('search')}}" method="get">
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
                <div class="panel-body">
                    
              
                    <h3>Book List</h3>
                    @if (count($books) > 0)

                    <table class="table table-striped">
                        <tr>
                                <th>Book ID</th>
                                <th>Title</th>
                                <th></th>
                            
                                <th>Author</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                        </tr>
                        @foreach($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->title}}</td>
                            <td></td>
                            
                            <td>{{$book->author}}</td>
                            <td></td>
                            <td></td>  
                            <td><a href="/books/{{$book->id}}/edit" class="btn btn-secondary">Available</a></td>
                            <td><a href="/books/{{$book->id}}/edit" class="btn btn-success">Issued</a></td>                          
                           <td> <a href="/books/{{$book->id}}/edit" class="btn btn-default">Edit</a>

                                {!!Form::open(['action' => ['PostsController@destroy',$book->id],'method' => 'POST','class' =>'pull-right'])!!}
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
