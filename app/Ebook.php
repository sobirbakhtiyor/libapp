<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $uploads = '/ebooks/';

    protected $fillable = ['file'];

    public function getFileAttribute($ebook){

    	return $this->uploads . $ebook;
    	
    }

}
