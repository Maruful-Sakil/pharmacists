<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    //
    function create(){
        return view('suppliers.register');
    }
    function createSubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|max:15|min:3",
                "email"=>"required|unique:suppliers,email",
                "password"=>"required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
                "conf_password"=>"required|same:password"
            ],
        
            [
                "name.required"=>"Please provide your name",
                "email.required"=>"Please provide your email",
                "password.required"=>"Please provide your password",
                
            ]);
            
            $sp = new Supplier();
            $sp->name = $req->input('name');
            $sp->email =$req->input('email');
            $sp->password =$req->input('password');
            $sp->gender =$req->input('gender');
            $sp->dob =$req->input('dob');
            $requestData = $req->all();
            $fileName = time().$req->file('image')->getClientOriginalName();
            $path = $req->file('image')->storeAs('images', $fileName, 'public');
            $requestData["image"] = '/storage/'.$path; Supplier::create($requestData);
            
            return redirect()->back()->with('status','Suppliers info added');
        
    }
    function login(){
        return view('suppliers.login');
    }
    function loginSubmit(Request $req)
    {
        $this->validate($req,[
            "email"=>"required|exists:suppliers,email",
            "password"=>"required"
        ]);
        $user = Supplier::where('email',$req->email)
                            ->where('password',$req->password)->first();

        if($user){
            session()->put('logged',$user->email);
            return redirect()->route('suppliers.dashboard');

        }
        else {
            session()->flash('msg','User not valid');
        return back();
        }

    }
    function dashboard(){
        $photo = Supplier::all();
        $user = Supplier::where('email',session()->get('logged'))->first();
        return view('suppliers.dashboard',compact('photo'))->with('user',$user);
    }
    function logout(){
        session()->forget('logged');
        session()->flash('msg','Sucessfully Logged out');
        return redirect()->route('suplliers.login');
    }
    function supplieredit($suplliers_id){
        $sp = Supplier::where('suplliers_id' ,$suplliers_id)->first();
        return view('suppliers.update', compact('sp'));
   }
    function supplierupdate(Request $req,$suplliers_id){
        $sp = Supplier::where('suplliers_id',$suplliers_id)->first();

        $sp->name = $req->input('name');
        $sp->email =$req->input('email');

        $sp->save();

        return redirect()->route('suplliers.login')->with('status',"Data Updated");
    }
}
