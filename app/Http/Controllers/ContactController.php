<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
   public function index(Request $request){
      $user = Auth::user()->id;
      $contacts= Contact::with('emails','phones')->where('user_id',$user)->latest()->paginate('10');
      return view('home',compact('contacts'));
   }
   public function edit(Request $request, $id){
      $contact= Contact::with('emails','phones')->findOrFail($id);
      if($request->isMethod('post')){
         $request->validate([
            'email.*' => ['email'],
            'phone.*' => ['numeric', 'min:11'],
         ]);
        $contact->birthday=$request->birthday;
        $contact->worked_at=$request->worked_at;
        $contact->address=$request->address;
        $contact->update();


        $getPhones=Phone::where('contact_id',$contact->id)->get();
         foreach($getPhones as $p){
            $p->delete();
         }
        foreach($request->phone as $item){
            Phone::create([
               'phone'=>$item,
               'contact_id'=>$contact->id,
            ]);
         }


         $getEmails=Email::where('contact_id',$contact->id)->get();
            foreach($getEmails as $p){
               $p->delete();
         }
         foreach($request->email as $item){
            Email::create([
               'email'=>$item,
               'contact_id'=>$contact->id,
            ]);
         }
        Toastr::success('Data Updated!','Success');
        return redirect()->back();
        }
      return view('edit-contact',compact('contact'));
   }
   public function add(Request $request){
      if($request->isMethod('post')){
          $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['email'],
            'phone' => ['required', 'numeric', 'min:11'],
            'image' => ['image','mimes:jpg,jpeg,png,gif','max:2048'],
        ]);
     
        $data= $request->all();
         // dd($data);
         if($request->hasFile('image')){
            $imageName = time().'.'.$data['image']->extension();  
            $data['image']->move(public_path('assets/images/contacts'), $imageName);
         }else{
            $imageName='default.png';
         }

        $contact = New Contact();
        $contact->name=$data['name'];
        $contact->image=$imageName;
        $contact->address=$data['address'];
        $contact->birthday=$data['birthday'];
        $contact->is_favorite=0;
        $contact->worked_at=$data['worked_at'];
        $contact->user_id=Auth::user()->id;
        if($contact->save()){
         // Save email 
          $email = New Email();
          $email->email= $data['email'];
          $email->contact_id= $contact->id;
          $email->save();
         //  Save number 
          $email = New Phone();
          $email->phone= $data['phone'];
          $email->contact_id= $contact->id;
          $email->save();
          Toastr::success('New contact added!','Success');
          return redirect()->route('home');
        }else{
         Toastr::error('Something went wrong!','Sorry');
         return redirect()->back();
        };
      }
      return view('add-contact');
   }
   public function delete($id){
      Contact::findOrFail($id)->delete();
      return redirect()->route('home');
   }
   public function makeFavorite(Request $request){
      if($request->ajax()){
          $data= $request->all();
          if($data['status']=='Yes'){
              $status=0;
          }else{
              $status=1;
          }
          Contact::where('id',$data['favorite_id'])->update(['is_favorite'=>$status]);
          return response()->json(['status'=>$status, 'id'=>$data['favorite_id']]);
      }
  }
  public function phoneDelete($id){
     Phone::findOrFail($id)->delete();
     Toastr::success('Number Deleted!','Success');
     return redirect()->back();
  }
  public function emailDelete($id){
     Email::findOrFail($id)->delete();
     Toastr::success('Email Deleted!','Success');
     return redirect()->back();
  }
  public function favorites(){
   $user = Auth::user()->id;
   $contacts= Contact::with('emails','phones')->where(['user_id'=>$user,'is_favorite'=>1])->paginate('10');
   return view('favorites',compact('contacts'));
  }
  public function search(Request $request){
   if($request->ajax()){
      $user = Auth::user()->id;
      $data= $request->search;
      $contacts=Contact::query()->with('emails','phones')
      ->where(['user_id'=>$user])
      ->where('name','Like', '%' .$data.'%')
      ->orWhere('birthday','Like', '%' .$data.'%')
      ->orWhere('worked_at','Like', '%' .$data.'%')
      ->orWhere('address','Like', '%' .$data. '%')
      ->orWhere('address','Like', '%' .$data. '%')
      ->orwhereHas('emails', function ($query) use($data)  { $query->where('email','Like', '%' .$data. '%'); })
      ->orwhereHas('phones', function ($query) use($data)  { $query->where('phone','Like', '%' .$data. '%'); })
      ->get();
      return view('contact-ajax-data',compact('contacts'));
   }
  }
}
