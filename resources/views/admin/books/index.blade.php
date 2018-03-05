@extends('layouts.admin')

@section('content')
{{-- <div class="container"> --}}
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <h1 class="">Books</h1>
        
        
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>Number</th>
                    <th>Book cover</th>
                    <th>Book Author</th>
                    <th>Book Title</th>
                    <th>Published city</th>
                        
                    </tr>
                </thead>
                <tbody>

                @foreach($books as $book)

                    <tr>
                        <td>{{$book->inv_number}}</td>
                        <td><img height="50" width="50" src="{{$book->photo ? $book->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->published_city}}</td>
                    </tr>

                @endforeach
                
                </tbody>

            </table>
            <div class="col-sm-10 col-sm-push-1">
                {{ $books->links() }}
            
            </div>


            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection


