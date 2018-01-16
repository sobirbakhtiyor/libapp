@extends('layouts.admin')



@section('content')
@include('includes.form_error')
	<div class="text-center"><h1><img src="{{asset('/images/leaf.jpg')}}" width="60px"> Yangi kitob qo'shish</h1></div><hr>

	<div class="row">

		{!! Form::open(['method'=>'POST', 'action'=>'BooksController@store', 'files'=>true])!!}
		 {{ csrf_field() }}
		{{-- <div class="form-group col-md-12">
			{!! Form::label('category_id', 'Category')!!}
			{!! Form::select('category_id', [''=>'Choose category']+$categories, null, ['class'=>'form-control'])!!}
		</div> --}}
        <div class="row">
		<div class="form-group col-lg-6">
			{!! Form::label('book_author', 'Muallif')!!}
			{!! Form::text('book_author', null, ['class'=>'form-control'])!!}
            <small id="passwordHelpBlock" class="form-text text-muted">
  Ism, otasining ismi, familiya to'g'ri ketma-ketlikda va to'liq kiritilsin.
</small>
		</div>
        
		<div class="form-group col-md-6">
			{!! Form::label('title', 'Sarlavha')!!}
			{!! Form::text('title', null, ['class'=>'form-control'])!!}
		</div>
        
        </div>
        
		<div class="form-group col-md-3">
			{!! Form::label('editor', 'Muharrir')!!}
			{!! Form::text('editor', null, ['class'=>'form-control'])!!}
		</div>    
        
		<div class="form-group col-md-3">
			{!! Form::label('book_id', 'Inventar raqami')!!}
			{!! Form::text('book_id', null, ['class'=>'form-control', 'required' => 'required', 'oninvalid'=>'this.setCustomValidity("Inventar raqamini kiriting")', 'onchange'=>'setCustomValidity("")'])!!}
		</div>
        
        <div class="form-group col-md-3">
			{!! Form::label('lang_id', 'Til')!!}
			{!! Form::select('lang_id', [''=>'Tilni tanlang']+$languages, null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-3">
			{!! Form::label('volume', 'Sahifalar soni')!!}
			{!! Form::number('volume', null, ['class'=>'form-control', 'maxlength'=>"4"])!!}
		</div>
        
		<div class="form-group col-md-2">
			{!! Form::label('publish_year', 'Nashr yili')!!}
			{!! Form::number('publish_year', null, ['class'=>'form-control', 'maxlength'=>"4"])!!}
		</div>
        
		<div class="form-group col-md-4">
			{!! Form::label('publisher', 'Nashriyot nomi')!!}
			{!! Form::text('publisher', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-3">
			{!! Form::label('publisher_city', 'Shahar')!!}
			{!! Form::text('publisher_city', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-3">
			{!! Form::label('publisher_country', 'Davlat')!!}
			{!! Form::text('publisher_country', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-4">
			{!! Form::label('isbn', 'ISBN')!!}
			{!! Form::text('isbn', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-4">
			{!! Form::label('bbk', 'BBK')!!}
			{!! Form::text('bbk', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-4">
			{!! Form::label('udk', 'UDK')!!}
			{!! Form::text('udk', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-6">
			{!! Form::label('description', 'Annotatsiya')!!}
			{!! Form::textarea('description', null, ['class'=>'form-control', 'required' => 'required', 'oninvalid'=>'this.setCustomValidity("Annotatsiya yozing!")', 'onchange'=>'setCustomValidity("")'])!!}
		</div>
        
		<div class="custom-file">
			{!! Form::label('ebook', 'Elektron shakli (.pdf)')!!}
			{!! Form::file('ebook', null, ['class'=>'custom-file-input', 'accept'=>'application/pdf'])!!}
		</div>
        
        <div class="form-group custom-file">
			{!! Form::label('cover', 'Muqova (.jpg/.png)')!!}
			{!! Form::file('cover', null, ['class'=>'form-control custom-file-input', 'accept'=>"image"])!!}
		</div>
        
        <div class="form-group col-md-12">
			{!! Form::submit('Saqlash', ['class'=>'btn btn-primary'])!!}
		</div>

		{!! Form::close() !!}

	</div>

	<div class="row">

	</div>
@stop