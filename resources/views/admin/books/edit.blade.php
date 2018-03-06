@extends('layouts.admin')



@section('content')
@include('includes.form_error')
	
	<style type="text/css">
		#app {
  
  & input {
    outline: none;
    width: auto;
    border: 0;
    float: left;
    padding: 8px;
    background: none;
  }
  
  &::before {
    content: '';
    display: table;
  }
  
  &::after {
    content: '';
    display: table;
    clear: both;
  }
}

.tag {
  border-radius: 3px;
  background: #b5aff9;
  float: left;
  margin: 3px;
  padding: 4px;
  font-size: 1em;
  vertical-align: middle;
  box-shadow: 0px 1px 4px #c6c6c6,
              0px 2px 17px #d1d1d1;
  
  & a {
    color: #000;
    padding-right: 10px;
    padding-left:5px;
    padding-top: 5px;
    padding-bottom: 5px;
    margin-right: 5px;
  }
  
  & span {
    padding-right: 10px;
    padding-left: 0px;
    padding-top: 5px;
    padding-bottom: 5px;
  }
}





input[type=checkbox] {
  opacity: 0;
  float:left;
}

input[type=checkbox] + label {
  margin: 0 0 0 20px;
  position: relative;
  cursor: pointer;
  float: left;
}

input[type=checkbox] + label ~ label {
  margin: 0 0 0 40px;
}

input[type=checkbox] + label::before {
  content: ' ';
  position: absolute;
  left: -35px;
  top: -3px;
  width: 25px;
  height: 25px;
  display: block;
  background: white;
  border: 1px solid #A9A9A9;
}

input[type=checkbox] + label::after {
  content: ' ';
  position: absolute;
  left: -35px;
  top: -3px;
  width: 23px;
  height: 23px;
  display: block;
  z-index: 1;
  background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjE4MS4yIDI3MyAxNyAxNiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAxODEuMiAyNzMgMTcgMTYiPjxwYXRoIGQ9Ik0tMzA2LjMgNTEuMmwtMTEzLTExM2MtOC42LTguNi0yNC04LjYtMzQuMyAwbC01MDYuOSA1MDYuOS0yMTIuNC0yMTIuNGMtOC42LTguNi0yNC04LjYtMzQuMyAwbC0xMTMgMTEzYy04LjYgOC42LTguNiAyNCAwIDM0LjNsMjMxLjIgMjMxLjIgMTEzIDExM2M4LjYgOC42IDI0IDguNiAzNC4zIDBsMTEzLTExMyA1MjQtNTI0YzctMTAuMyA3LTI1LjctMS42LTM2eiIvPjxwYXRoIGZpbGw9IiMzNzM3MzciIGQ9Ik0xOTcuNiAyNzcuMmwtMS42LTEuNmMtLjEtLjEtLjMtLjEtLjUgMGwtNy40IDcuNC0zLjEtMy4xYy0uMS0uMS0uMy0uMS0uNSAwbC0xLjYgMS42Yy0uMS4xLS4xLjMgMCAuNWwzLjMgMy4zIDEuNiAxLjZjLjEuMS4zLjEuNSAwbDEuNi0xLjYgNy42LTcuNmMuMy0uMS4zLS4zLjEtLjV6Ii8+PHBhdGggZD0iTTExODcuMSAxNDMuN2wtNTYuNS01Ni41Yy01LjEtNS4xLTEyLTUuMS0xNy4xIDBsLTI1My41IDI1My41LTEwNi4yLTEwNi4yYy01LjEtNS4xLTEyLTUuMS0xNy4xIDBsLTU2LjUgNTYuNWMtNS4xIDUuMS01LjEgMTIgMCAxNy4xbDExNC43IDExNC43IDU2LjUgNTYuNWM1LjEgNS4xIDEyIDUuMSAxNy4xIDBsNTYuNS01Ni41IDI2Mi0yNjJjNS4yLTMuNCA1LjItMTIgLjEtMTcuMXpNMTYzNC4xIDE2OS40bC0zNy43LTM3LjdjLTMuNC0zLjQtOC42LTMuNC0xMiAwbC0xNjkuNSAxNjkuNS03MC4yLTcxLjljLTMuNC0zLjQtOC42LTMuNC0xMiAwbC0zNy43IDM3LjdjLTMuNCAzLjQtMy40IDguNiAwIDEybDc3LjEgNzcuMSAzNy43IDM3LjdjMy40IDMuNCA4LjYgMy40IDEyIDBsMzcuNy0zNy43IDE3NC43LTE3Ni40YzEuNi0xLjcgMS42LTYuOS0uMS0xMC4zeiIvPjwvc3ZnPg==') no-repeat center center;
  -ms-transition: all .2s ease;
  -webkit-transition: all .2s ease;
  transition: all .3s ease;
  -ms-transform: scale(0);
  -webkit-transform: scale(0);
  transform: scale(0);
  opacity: 0;
}

input[type=checkbox]:checked + label::after {
  -ms-transform: scale(1);
  -webkit-transform: scale(1);
  transform: scale(1);
  opacity: 1;
}

input[type=checkbox] + label {	
  margin-top:34px;
}



	</style>


                    <div class="text-center"><h1 class="page-header">Kitob ma'lumotlarini o'zgartirish</h1></div>
     <div class="container col-md-9">
	<div class="row justify-content-md-center">

		{!! Form::model($book, ['method'=>'PATCH', 'action'=>['BooksController@update', $book->id], 'files'=>true, 'onsubmit'=>"return gettag();"])!!}
		 {{ csrf_field() }}


                		{{-- <div class="form-group col-md-9">
                			{!! Form::label('category_id', 'Category')!!}
                			{!! Form::select('category_id', [''=>'Choose category']+$categories, null, ['class'=>'form-control'])!!}
                		</div> --}}

		<div class="form-group col-md-12">
			{!! Form::label('author', 'Muallif*')!!}
			{!! Form::text('author', null, ['class'=>'form-control', 'autofocus', 'required', 'oninvalid'=>'this.setCustomValidity("Muallifni kiriting")', 'onchange'=>'setCustomValidity("")'])!!}
            <small id="passwordHelpBlock" class="form-text text-muted">
            Ism, otasining ismi, familiya to'g'ri ketma-ketlikda va to'liq kiritilsin.
            </small>
		</div>
        
		<div class="form-group col-md-12">
			{!! Form::label('title', 'Sarlavha')!!}
			{!! Form::text('title', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-12">
			{!! Form::label('editor', 'Muharrir')!!}
			{!! Form::text('editor', null, ['class'=>'form-control'])!!}
		</div>

        
		<div class="form-group col-md-4">
			{!! Form::label('inv_number', 'Inventar raqami')!!}
			{!! Form::text('inv_number', null, ['class'=>'form-control', 'required' => 'required', 'oninvalid'=>'this.setCustomValidity("Inventar raqamini kiriting")', 'onchange'=>'setCustomValidity("")'])!!}
		</div>
        
        <div class="form-group col-md-4">
			{!! Form::label('lang_id', 'Til')!!}
			{!! Form::select('lang_id', [''=>'Tilni tanlang']+$languages, null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-4">
			{!! Form::label('volume', 'Sahifalar soni')!!}
			{!! Form::number('volume', null, ['class'=>'form-control', 'maxlength'=>"4"])!!}
		</div>
        
		<div class="form-group col-md-6">
			{!! Form::label('publish_year', 'Nashr yili')!!}
			{!! Form::number('publish_year', null, ['class'=>'form-control', 'maxlength'=>"4"])!!}
		</div>
        
		<div class="form-group col-md-6">
			{!! Form::label('publisher', 'Nashriyot nomi')!!}
			{!! Form::text('publisher', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-6">
			{!! Form::label('published_city', 'Shahar')!!}
			{!! Form::text('published_city', null, ['class'=>'form-control'])!!}
		</div>
        
		<div class="form-group col-md-6">
			{!! Form::label('published_country', 'Davlat')!!}
			{!! Form::text('published_country', null, ['class'=>'form-control'])!!}
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
        
		<div class="form-group col-md-12">
			<div id="app">			
				{!! Form::label('tag', 'Kalit so\'z')!!}
				{!! Form::text('tag', null, ['class'=>'form-control'])!!}
				 <div id="tagHere" class="tagHere"></div>
         <input id="tags" type="hidden" name="tags" value="">
			</div>
		</div>
        
		<div class="form-group col-md-12">
			{!! Form::label('description', 'Annotatsiya')!!}
			{!! Form::textarea('description', null, ['class'=>'form-control', 'required', 'oninvalid'=>'this.setCustomValidity("Annotatsiya yozing!")', 'onchange'=>'setCustomValidity("")'])!!}
		</div>
        
		<div class="form-group custom-file">
			{!! Form::label('ebook_id', 'Elektron shakli (.pdf)')!!}
			{!! Form::file('ebook_id', null, ['class'=>'custom-file-input', 'accept'=>'application/pdf'])!!}
		</div><br>
        
        <div class="form-group custom-file">
			{!! Form::label('cover_id', 'Muqova (.jpg/.png)')!!}
			{!! Form::file('cover_id', null, ['class'=>'form-control custom-file-input', 'accept'=>"image"])!!}
		</div><br>

    
    <div class="form-group col-md-9">
      <input id="notorderable" type="checkbox" name="notorderable" value="1">
      <label for="notorderable">Faqat ARMda foydalanish mumkin</label>
    </div>

		<div class="form-group col-md-9">
			<input id="only_pdf" type="checkbox" name="only_pdf" value="1">
			<label for="only_pdf">Faqat elektron shakli mavjud</label>
		</div>

		<div class="form-group col-md-9">
			<input id="newbook" type="checkbox" name="newbook" value="1">
			<label for="newbook">Yangi adabiyot</label>
		</div>

	</div> 
</div>
		
        <br><br><hr class="col-md-12"><br>
        <div class="form-group col-md-12">
			{!! Form::submit('Saqlash', ['class'=>'btn btn-primary'])!!}
		</div>

		{!! Form::close() !!}

	</div>

	<div class="row">

	</div>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<script type="text/javascript">




    function gettag() {
      var $booktag = document.getElementById('tagHere');
      var $booktags = $booktag.textContent;
      document.getElementById('tags').value = $booktags;
    }


		$(document).ready(function(){
  var $input = $("#app input"),
      $appendHere = $(".tagHere"),
      oldKey = 0, newKey,
      TABKEY = 9;
  $input.focus();
  
  $input.keydown(function(e){
  
    if(e.keyCode == TABKEY) {
      if(e.preventDefault) {
        e.preventDefault();
        if($(this).val() == '' || $(this).val() == ' ') {
          return false;
        }
        addTag($(this));
      }
      return false;
    }
    
    if($(this).val() == '' && e.keyCode === 8) {
      $(".tag:last-child").remove();
    }
    
  })
  
  function addTag(element) {
    var $tag = $("<div />"), $a = $("<a href='#' />"), $span = $("<span />");
    $tag.addClass('tag');
    $('<i class="fa fa-times" aria-hidden="true">\x0d</i>').appendTo($a);
    $span.text($(element).val());
    $a.bind('click', function(){
      $(this).parent().remove();
      $(this).unbind('click');
    });
    $a.appendTo($tag);
    $span.appendTo($tag);
    $tag.appendTo($appendHere);
    $(element).val('');
  }
});
	</script>

@stop