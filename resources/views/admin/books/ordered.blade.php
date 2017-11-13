@extends('layouts.admin')

@section('content')

    <div class="row">
    	@include('includes.search')
	</div>
    @if($orders)
        
        <h2>Books</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
	                    <th>Book Id</th>                        
                        <th>Book Cover</th>
                        <th>Book Author</th>                          
                        <th>Book Name</th>                          
	                    <th>Book published date</th>	                        
                    </tr>
                </thead>
                <tbody>
                @foreach( $orders as $order)
                @if (is_null($order->deleted_at))
                @foreach($books as $book)
                @if ($order->book_id==$book->id)
                    <tr>
                        <td>{{$book->book_id}}</td>
                        <td><img height="50" width="50" src="{{$book->photo ? $book->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                        <td>{{$book->book_author}}</td>
                        <td>{{$book->book_name}}</td>
                        <td>{{$book->book_published_at}}</td>
                    </tr>
                @endif 
                @endforeach
                @endif
                @endforeach             
                </tbody>
            </table>
        
    @endif
@endsection
