<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Like;
use App\Book;
use Illuminate\Support\Facades\Auth;


class OrderBooksController extends Controller
{
   // public function likeBook($id)
   //  {
   //      // here you can check if product exists or is valid or whatever

   //      $this->handleLike('App\Book', $id);
   //      return redirect()->back();
   //  }

	public function like($book)
    {
        $existing_like = Like::withTrashed()->whereBookId($book)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'   => Auth::id(),
                'book_id'   => $book
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
        return response()->json();
    }
}
