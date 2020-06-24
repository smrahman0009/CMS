<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }

    public function edit(){
        return view('users.edit')->with('user',auth()->user());
    }

    public function update(UpdateUserProfileRequest $request){
        $user = auth()->user();
        
        $user->update(
            [
            'name' => $request->name,
            'about' => $request->about,
            ]
        );

        session()->flash('success','Update Profile successfully');

        return redirect()->back();
    }

    public function changeType($user_id){
       
        $user = User::where('id',$user_id)->update(['role'=>'admin']);

        session()->flash('success','Make this user admin successfully');

        return redirect(route('user-list'));
    }
}
