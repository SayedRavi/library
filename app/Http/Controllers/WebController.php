<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'books' => Books::all()
        ]);
    }

    public function detail(Books $books)
    {
//      $books =  DB::table('books')->where('id',$id)->select('title','category','photo')->get();
//      dd($books);
//        $books = Books::where('id','=',$id)->first();
//        dd($books);
        return view('details',compact('books'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $book = Books::where('title','like','%'.$search.'%')->get();
        return view('welcome',['books'=>$book]);
    }
}
