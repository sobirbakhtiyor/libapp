<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Photo;
use App\Ebook;
use App\Http\Requests;
use App\Like;
use App\Http\Requests\BooksCreateRequest;
use App\Category;
use App\Language;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id')->all();
        $languages = Language::lists('name', 'id')->all();
        return view('admin.books.create', compact('categories','languages'));  
        //return $languages;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $user = Auth::user();
        $input['cataloger'] = $user->name;


        if($file = $request->file('cover_id')){

            $name = time() . $file->getClientOriginalExtension();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['cover_id'] = $photo->id;

        }
        if($file = $request->file('ebook_id')){

            $name = $request['author'] .' - '. $request['title'] . '.pdf';

            $file->move('ebooks', $name);

            $ebook = Ebook::create(['file'=>$name]);

            $input['ebook_id'] = $ebook->id;

        }
        
        $user->books()->create($input);

        return redirect('admin/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        $categories = Category::lists('name', 'id')->all();
        $languages = Language::lists('name', 'id')->all();

        return view('admin.books.edit', compact('book', 'categories', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $input = $request->except('_method', '_token', 'tag');

        $user = Auth::user();
        $input['cataloger'] = $user->name;


        if($file = $request->file('cover_id')){

            $name = time() .'.'. $file->getClientOriginalExtension();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['cover_id'] = $photo->id;

        }
        if($file = $request->file('ebook_id')){

            $name = $request['author'] .' - '. $request['title'] . '.pdf';

            $file->move('ebooks', $name);

            $ebook = Ebook::create(['file'=>$name]);

            $input['ebook_id'] = $ebook->id;

        }
        
        $user->books()->update($input);

        return redirect('admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     
}
