<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = [

			'cataloger',

            'author',
            'title',
            'editor',
            'inv_number',
            'lang_id',
            'volume',
            'publish_year',
            'publisher',
            'published_city',
            'published_country',
            'isbn',
            'bbk',
            'udk',
            'tags',
            'description',
            'ebook_id',
            'cover_id',
            'notorderable',
            'only_pdf',
            'newbook',

            'location',
            'user_id',
            'ordered_id',
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
	 public function book_user()
    {
        return $this->belongsToMany('App\User', 'book_user');
    }
    // public function getIsLikedAttribute()
    // {
    //     $like = $this->book_user()->whereUserId(Auth::id())->first();
    //     return (!is_null($like)) ? true : false;
    // }

}
