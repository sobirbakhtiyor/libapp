<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = [

		'book_id',
		'book_author',
		'book_name',
		'book_published_at',
		'photo_id',
		'category_id',
		'ebook_id',
		'ordered_id'
	];

 	public function user(){

		return $this->belongsTo('App\User');

	}
	public function photo(){

		return $this->belongsTo('App\Photo');
		
	}
	public function ebook(){

		return $this->belongsTo('App\Ebook');
		
	}
}
