<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Like;
use App\Book;
use Illuminate\Support\Facades\Auth;


class OrderBooksController extends Controller
{
    public function viewBook($id) {
        $book = Book::findOrFail($id);
        $book_id = $book->id;
        $order = Like::whereUserId(Auth::id())->whereBookId($book_id)->get();
        return view('users.viewbook', compact('book', 'order'));
    }

	public function order($id)
    {
        $existing_order = Like::withTrashed()->whereBookId($id)->whereUserId(Auth::id())->first();
        if (is_null($existing_order)) {
            Like::create([
                'user_id'   => Auth::id(),
                'user_name' => Auth::user()->name,
                'book_id'   => $id,
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

    public function orderingBooks()
    {
        $orders = Like::all();
        $books = Book::all();
        return view('users.ordered', compact('orders','books'));
    }

    public function orderedBooks()
    {
        $orders = Like::all();
        $books = Book::all();

        return view('admin.ordered', compact('orders','books'));
    }

    public function confirmOrder()
    {

    }

    public function cancelOrder()
    {
        
    }
}
