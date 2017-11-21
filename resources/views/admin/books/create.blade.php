@extends('layouts.admin')



@section('content')

	<h1><i class="fa fa-plus"></i> Yangi kitob qo'shish</h1><hr>

	<div class="row">

		{!! Form::open(['method'=>'POST', 'action'=>'BooksController@store', 'files'=>true])!!}
		 {{ csrf_field() }}
		
		<div class="form-group">
            <i class="fa fa-list-ol"></i>
			{!! Form::label('book_id', 'Kitob raqami')!!}
			{!! Form::text('book_id', null, ['class'=>'form-control'])!!}
		</div>
		{{-- <div class="form-group">
			{!! Form::label('category_id', 'Category')!!}
			{!! Form::select('category_id', [''=>'Choose category']+$categories, null, ['class'=>'form-control'])!!}
		</div> --}}
		<div class="form-group">
			{!! Form::label('book_author', 'Muallif')!!}
			{!! Form::text('book_author', null, ['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('title', 'Sarlavha')!!}
			{!! Form::text('title', null, ['class'=>'form-control'])!!}
		</div>
        
        <div class="form-group">
			{!! Form::label('lang_id', 'Til')!!}
			{!! Form::select('lang_id', [''=>'Tilni tanlang']+$languages, null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group">
			{!! Form::label('publish_year', 'Nashr yili')!!}
			{!! Form::number('publish_year', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group">
			{!! Form::label('publisher', 'Nashriyot')!!}
			{!! Form::text('publisher', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group">
			{!! Form::label('description', 'Annotatsiya')!!}
			{!! Form::textarea('description', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group custom-file">
			{!! Form::label('ebook', 'Elektron shakli (pdf)')!!}
			{!! Form::file('ebook', null, ['class'=>'form-control custom-file-input'])!!}
		</div>
        
        <div class="form-group custom-file">
			{!! Form::label('cover', 'Muqova')!!}
			{!! Form::file('cover', null, ['class'=>'form-control custom-file-input'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Saqlash', ['class'=>'btn btn-primary'])!!}
		</div>

		{!! Form::close() !!}

	</div>
	<div class="row">

		@include('includes.form_error')

	</div>
@stop