@extends('layouts.user')

@section('content')

    <div class="row">
    	@include('includes.search')
	</div>
    @if($myorders->isEmpty())
        Buyurtmalar yo'q.
    @else
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
                @foreach( $myorders as $order)
                    @if (is_null($order->deleted_at))
                        @foreach($books as $book)
                            @if ($order->book_id==$book->id && $order->user_id==Auth::id())
                                <tr>
                                    <td>{{$book->book_id}}</td>
                                    <td><img height="50" width="50" src="{{$book->photo ? $book->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                                    <td>{{$book->book_author}}</td>
                                    <td>{{$book->book_name}}</td>
                                    <td>{{$book->book_published_at}}</td>                    
                                @if ($myorders->isEmpty())
                                    <td><a href="{{route('book.order', $book->id)}}"><button type="button" class=" btn btn-primary">Buyurtma berish</button></a></td>
                                @else
                                    <td><a href="{{route('book.order', $book->id)}}"><button type="button" class=" btn btn-primary">Buyurtmani bekor qilish</button></a></td>
                                @endif 
                                </tr>
                            @endif 
                        @endforeach
                    @endif
                @endforeach             
                </tbody>
            </table>
        
    @endif
@endsection
