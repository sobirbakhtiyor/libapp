<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
	use SoftDeletes;

    protected $table = 'book_user';

    protected $fillable = [
        'user_id',
        'user_name',
        'book_id'
    ];

    public function books()
    {
        return $this->morphedByMany('App\Book', 'book_user');
    }

     protected $dates = ['deleted_at'];
}
