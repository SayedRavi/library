<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categoreis;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index',[
            'books' => Books::where('user_id','=',auth()->id())->get()
        ]);
    }
    public function create(){
        return view('user.form.create',[
            'books' => Books::all(),
            'categories' => Categoreis::all()
        ]);
    }
}
