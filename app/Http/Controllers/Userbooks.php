<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categoreis;
use Illuminate\Http\Request;

class Userbooks extends Controller
{

    public function index()
    {
        return view('user.index',[
            'books' => Books::where('user_name','=',auth()->user()->name),

        ]);
    }
    public function create(){
        return view('user.form.create',[
            'books' => Books::where('user_id','=',auth()->id())->get(),
            'categories' => Categoreis::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'cat_name' => 'sometimes',
            'title' => 'required| string',
            'detail' => 'required|string',
            'photo' => 'required|image|max:10000',
            'file' => 'required|mimes:pdf|max:10000'
        ]);

       $book = Books::create([
            'category' => $request->category,
            'cat_name' => $request->category,
            'title' => $request->title,
            'detail' => $request->detail,
            'user_name' => auth()->user()->name,
            'user_id' => auth()->id(),
        ]);
        if ($request->file('photo')!=null){
            $book->update([
                'photo'=>$request->file('photo')->store('book_photos','public')
            ]);
        }
        if ($request->file('file')!=null){
            $book->update([
                'file'=>$request->file('file')->store('files','public')
            ]);
        }
        return redirect()->route('user.index')->with([
            'message' => 'Created Successfully',
            'classes' => 'green rounded'
        ]);
    }

    public function edit(Books $userbook)
    {
        $categories = Categoreis::all();
        return view('user.form.edit',compact('userbook','categories'));
    }

    public function update(Request $request, Books $userbook)
    {

        $request->validate([
            'category' => 'required',
            'cat_name' => 'sometimes',
            'title' => 'required| string',
            'detail' => 'required|string',
            'photo' => 'sometimes',
            'file' => 'sometimes'
        ]);

         $userbook->update([
            'category' => $request->category,
            'cat_name' => $request->category,
            'title' => $request->title,
            'detail' => $request->detail,
            'user_name' => auth()->user()->name,
            'user_id' => auth()->id(),
        ]);

        if ($request->hasFile('photo'))
        {if (file_exists(public_path('storage/'.$userbook->photo))){
            unlink(public_path('storage/'.$userbook->photo));
        }
            $userbook->update([
                'photo'=> $request->file('photo')->store('book_photos','public')
            ]);
        }
        if ($request->file('file')!=null) {
            if (file_exists(public_path('storage/' . $userbook->file))) {
                unlink(public_path('storage/' . $userbook->file));
            }
            $userbook->update([
                'file' => $request->file('file')->store('files', 'public')
            ]);
        }
        return redirect()->route('user.index')->with([
            'message' => 'Updated Successfully',
            'classes' => 'green rounded'
        ]);
    }
    public function destroy(Books $userbook)
    {

        $userbook->where('id','=',$userbook->id)->delete();
        if (file_exists(public_path('storage/'.$userbook->photo))){
            unlink(public_path('storage/'.$userbook->photo));
        }
        if (file_exists(public_path('storage/'.$userbook->file))){
            unlink(public_path('storage/'.$userbook->file));
        }
        return redirect()->route('user.index')->with([
            'message' => 'Deleted Successfully',
            'classes' => 'green rouned'
        ]);
    }

}
