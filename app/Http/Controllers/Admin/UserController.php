<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public function showusers(){
        $users = User::all();
        return view('users/allusers',compact('users'));
    }
    public function edituser(string $id){
        $user = User::find($id);
        return view('users/edituser',compact('user'));
    }
    public function updateuser(Request $request,string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;
        $user->save();
        return redirect()->route('allusers')->with('message','your user`s info has been updated successfully');

    }
    public function deleteuser(string $id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('allusers')->with('del','your user  has been deleted successfully');
    }



}
