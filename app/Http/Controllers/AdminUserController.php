<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AdminUserController extends Controller
{
    public $active='users';
    public function index()
    {
        return view('adminuser.index',[
            'active'=>$this->active,
            'adminusers' => User::all()
        ]);
    }
    public function create()
    {
        return view('adminuser.forms.create',[
            'active'=>$this->active,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | min:3 | max:20',
            'last_name' => 'required | string',
            'password' => 'required',
            'address' => 'required',
            'phone' =>'required',
            'profile' => 'sometimes | image | max:5000',
        ]);
        $user =  User::create([
            'name' =>$request->name,
            'last_name' => $request->last_name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'address' => $request->address,
            'phone'=> $request->phone,
        ]);
        if ($request->file('profile')!=null){
            $user->update([
                'profile' => $request->file('profile')->store('user_profiles','public')
            ]);
        }


        return redirect()->route('adminuser.index')->with([
            'message' => 'Created Successfully',
            'classes' => 'green rounded'
        ]);
    }


    public function edit(User $adminuser)
    {
        $active = $this->active;
        return view('adminuser.forms.edit',compact('adminuser','active'));
    }


    public function update(Request $request, User $adminuser)
    {
        $request->validate([
            'name' => 'required | string | min:3 | max:20',
            'last_name' => 'required | string',
            'password' => 'required',
            'address' => 'required',
            'phone' =>'required',
            'profile' => 'sometimes | image | max:5000',
        ]);
         $user =  $adminuser->update([
             'name' =>$request->name,
             'last_name' => $request->last_name,
             'email' =>$adminuser->email,
             'password' => Hash::make($request->password),
             'role' => $request->role,
             'address' => $request->address,
             'phone'=> $request->phone,
        ]);
        if ($request->file('profile')!=null){
            if (file_exists(public_path('storage/'.$adminuser->profile))){
                unlink(public_path('storage/'.$adminuser->profile));
            }
            $adminuser->update([
                'profile'=> $request->file('profile')->store('user_profiles','public')
            ]);
        }
        return redirect()->route('adminuser.index')->with([
            'message' => 'Updated Successfully',
            'classes' => 'green rounded'
        ]);
    }


    public function destroy(User $adminuser)
    {

        User::where('id', $adminuser->id)->delete();
        if (file_exists(public_path('storage/' . $adminuser->profile))) {
            unlink(public_path('storage/' . $adminuser->profile));
        }
        return redirect()->to(route('adminuser.index'))->with([
            'message' => 'Deleted successfully',
            'classes' => 'green rounded'
        ]);
    }
}
