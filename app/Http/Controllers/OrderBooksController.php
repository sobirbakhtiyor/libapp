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

	public function order($book)
    {
      $existing_order = Like::withTrashed()->whereBookId($book)->whereUserId(Auth::id())->first();

      if (is_null($existing_order)) {
          Like::create([
              'user_id'   => Auth::id(),
              'book_id'   => $book
          ]);
      } else {
          if (is_null($existing_order->deleted_at)) {
              $existing_order->delete();
          } else {
              $existing_order->restore();
          }
      }
      return redirect()->back();
    }
    public function orderedBooks(){

        $orders = Like::all();
        $books = Book::all();

        return view('users.ordered', compact('orders','books'));

  }
}
