@extends('layouts.user')

@section('content')

    <div class="row">
    	@include('includes.search')
	</div>
        <h2>Books</h2>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
	                    <th>Book Author</th>
                        <th>Book Name</th>                          
	                    <th>Book date</th>	                        
                    </tr>
                </thead>
                <tbody>

                @foreach($likes as $like)
                    {{$like}}
                @endforeach
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->book_author}}</td>
                        <td>{{$book->book_name}}</td>
                        <td>{{$book->book_published_at}}</td>
                    </tr>
                @endforeach               
                </tbody>
            </table>
@endsection
