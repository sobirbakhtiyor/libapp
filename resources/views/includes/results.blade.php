@extends('layouts.user')

@section('content')

    <div>
        @include('includes.search')
    </div>
    <div class="row">
        
        <table class="table table-bordered table-hover" >

            @if($books->count())
                <thead>
                    <th>Book Id</th>
                    <th>Book Cover</th>
                    <th>Book Author</th>
                    <th>Book Name</th>
                    <th>Published date</th>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <tr>
                        <td>{{$book->book_id}}</td>
                        <td><img height="50" width="50" src="{{$book->photo ? $book->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>    
                        <td>{{$book->book_author}}</td>
                        <td>{{$book->book_name}}</td>
                        <td>{{$book->book_published_at}}</td>
                        <td><a href="{{route('book.view', $book->id)}}"><button type="button" class=" btn btn-primary btn-sm">View</button></a></td>
                    </tr>
                    @endforeach
                </tbody>

                @else
                <tr>
                    <td colspan="3">Result not found.</td>
                </tr>
                @endif

            </table>

        <div class="col-sm-10 col-sm-push-1">
            {{ $books->links() }}
        
        </div>
    </div>
@stop