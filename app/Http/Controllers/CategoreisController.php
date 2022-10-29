<?php

namespace App\Http\Controllers;

use App\Models\Categoreis;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoreisController extends Controller
{
    public function index()
    {
        $categories = Categoreis::all();
        return view('admin.cat.index', compact('categories'),[
            'active' => 'categories',
        ]);
    }


    public function create()
    {
        return view('admin.cat.forms.create',[
            'active' => 'categories'
        ]);
    }
    public function store(Request $request)
    {
        $categories = $request->validate([
            'title' => 'required',
        ]);
        Categoreis::create($categories);
        return redirect()->route('categories.index')->with([
            'message' => 'Created successfully',
            'classes' => 'green rounded'
        ]);
    }




    public function edit(Categoreis $category)
    {
        $active = 'categories';
        return view('admin.cat.forms.edit',compact('category','active'));
    }

    public function update(Request $request, Categoreis $category)
    {
        $data = $request->validate([
            'title' => 'required | string ',

        ]);
        $category->update($data);
        return redirect()->route('categories.index')->with([
            'message' => 'updated Successfully',
            'classes' => 'green rounded'
        ]);
    }


    public function destroy(Categoreis $category)
    {

        $cat = Categoreis::where('id',$category->id)->delete();
        return redirect()->route('categories.index')->with([
            'message' => 'Deleted Successfully',
            'classes' => 'green rounded'
        ]);
    }
}
