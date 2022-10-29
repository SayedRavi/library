<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categoreis;
use App\Models\User;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public $active = 'books';
    public function index()
    {
        return view('admin.books.index',[
            'active' => 'books',
            'books' => Books::all(),
        ]);
    }


    public function create()
    {
        return view('admin.books.form.create',[
            'active' => 'books',
            'categories' => Categoreis::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'cat_name'=> 'sometimes',
            'title'=>'required|string',
            'detail'=>'required|string',
            'photo'=> 'required|image|max:10000',
            'file'=>'required|mimes:pdf|max:10000'
        ]);

        $book = Books::create([
            'category' => $request->category,
            'cat_name' => $request->category,
            'title' => $request->title,
            'detail' => $request->detail,
            'user_name' => auth()->user()->name,
            'user_id' => auth()->id(),
        ]);
        if ($request->hasFile('photo')){
            $book->update([
                'photo'=>$request->file('photo')->store('book_photos','public')
            ]);
        }
        if ($request->file('file')!=null){
            $book->update([
                'file' => $request->file('file')->store('files','public')
            ]);
        }
        return redirect()->route('books.index')->with([
            'message' => 'Created Successfully',
            'classes'=> 'green rounded'
        ]);
    }

    public function edit(Books $book)
    {
        $active = $this->active;
        $categories = Categoreis::all();
        return view('admin.books.form.edit',compact('book','active','categories'));
    }
    public function show(){
        //
    }

    public function update(Request $request, Books $book)
    {
        $request->validate([
            'category' => 'required',
            'cat_name'=> 'sometimes',
            'title'=>'required|string',
            'detail'=>'required|string',
            'photo'=> 'sometimes',
            'file'=>'sometimes'
        ]);

        $book->update([
            'category' => $request->category,
            'cat_name' => $request->category,
            'title' => $request->title,
            'detail' => $request->detail,
            'user_name' => auth()->user()->name,
        ]);
        if ($request->hasFile('photo'))
        {if (file_exists(public_path('storage/'.$book->photo))){
            unlink(public_path('storage/'.$book->photo));
        }
            $book->update([
                'photo'=> $request->file('photo')->store('book_photos','public')
            ]);
        }
        if ($request->file('file')!=null) {
            if (file_exists(public_path('storage/' . $book->file))) {
                unlink(public_path('storage/' . $book->file));
            }
            $book->update([
                'file' => $request->file('file')->store('files', 'public')
            ]);
        }
        return redirect()->route('books.index')->with([
            'message' => 'Created Successfully',
            'classes'=> 'green rounded'
        ]);
    }

    public function destroy(Books $book)
    {

        $book->delete();
       if (file_exists(public_path('storage/'.$book->photo))){
           unlink(public_path('storage/'.$book->photo));
       }
        if (file_exists(public_path('storage/'.$book->file))){
            unlink(public_path('storage/'.$book->file));
        }
       return redirect()->route('books.index')->with([
           'message' => 'Deleted Successfully',
           'classes' => 'green rouned'
       ]);
    }

}
