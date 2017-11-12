@extends('layouts.user')

@section('content')

    <div class="row">
    	@include('includes.search')
	</div>
        <h1>Books</h1>
        
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Book Id</th>
                    <th>Book Author</th>
                    <th>Book Name</th>
                    <th>Published date</th>
                    <th></th>
                        
                    </tr>
                </thead>
                <tbody>

                @foreach($books as $book)

                    <tr>
                        <td>{{$book->book_id}}</td>
                        <td>{{$book->book_author}}</td>
                        <td>{{$book->book_name}}</td>
                        <td>{{$book->book_published_at}}</td>
                        <td><a href="{{route('book.order', $book->id)}}"><button type="button" class=" btn btn-primary btn-sm">Order</button></a></td>
                    </tr>

                @endforeach
                
                </tbody>

            </table>
            <div class="col-sm-10 col-sm-push-1">
                {{ $books->links() }}
			</div>
@endsection
