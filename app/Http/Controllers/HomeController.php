<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function update_profile(Request $request)
    {   
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required',
                'avatar' => 'image|mimes:jpeg,png,jpg,svg|max:1024',
                'phone' => 'required',
                'email' => 'required',
            ]);
            $data= $request->all();

           $user->name=$data['name'];

           if(isset($data['email'])){
            $user->email=$data['email'];
           }

           $user->phone=$data['phone'];

           if(!empty($data['current_password'])){
            if(!Hash::check($data['current_password'],$user['password'])){
                Toastr::error('Current password is incorrect!','Sorry!');
                return redirect()->back();die;
              }else{
                $user->password=bcrypt($data['new_password']);
              }
           }
           if($request->hasFile('avatar')){
            if ($user->avatar){
                Storage::delete('/public/assets/images/'.$user->avatar);
            }
            $imageName = time().'.'.$data['avatar']->extension();
            $data['avatar']->move(public_path('assets/images'), $imageName);
            $user->avatr=$imageName;
           }
           $user->update();
           Toastr::success('User info updated!','Success!');
           return redirect()->back();die;
        }
        return view('edit-profile',compact('user'));
    }
}
