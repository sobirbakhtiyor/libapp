@extends('layouts.user')

@section('content')

    <div class="row">
    	@include('includes.search')
	</div>
    @if($orders)
        
        <h2>Books</h2>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
	                    <th>Book Id</th>
                        <th>Book Author</th>                          
	                    <th>Book published date</th>	                        
                    </tr>
                </thead>
                <tbody>
                @foreach( $orders as $order)
                @if (is_null($order->deleted_at))
                @foreach($books as $book)
                @if ($order->book_id==$book->id && $order->user_id==Auth::id())
                    <tr>
                        <td>{{$book->book_id}}</td>
                        <td>{{$book->book_author}}</td>
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
