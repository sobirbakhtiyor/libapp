@extends('layouts.admin')



@section('content')

	<h1>Add book</h1>

	<div class="row">

		{!! Form::open(['method'=>'POST', 'action'=>'BooksController@store', 'files'=>true])!!}
		 {{ csrf_field() }}
		
		<div class="form-group">
			{!! Form::label('book_id', 'Book Id')!!}
			{!! Form::text('book_id', null, ['class'=>'form-control'])!!}
		</div>
		{{-- <div class="form-group">
			{!! Form::label('category_id', 'Category')!!}
			{!! Form::select('category_id', [''=>'Choose category']+$categories, null, ['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('photo_id', 'Photo')!!}
			{!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
		</div> --}}
		<div class="form-group">
			{!! Form::label('book_author', 'Book Author')!!}
			{!! Form::text('book_author', null, ['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('book_name', 'Book Title')!!}
			{!! Form::text('book_name', null, ['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('book_published_at', 'Published year')!!}
			{!! Form::number('book_published_at', null, ['class'=>'form-control'])!!}
		</div>
		<div class="form-group custom-file">
			{!! Form::label('ebook_id', 'E-book')!!}
			{!! Form::file('ebook_id', null, ['class'=>'form-control custom-file-input'])!!}
		</div><div class="form-group custom-file">
			{!! Form::label('photo_id', 'Cover Photo')!!}
			{!! Form::file('photo_id', null, ['class'=>'form-control custom-file-input'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Add Book', ['class'=>'btn btn-primary'])!!}
		</div>

		{!! Form::close() !!}

	</div>
	<div class="row">

		@include('includes.form_error')

	</div>
@stop