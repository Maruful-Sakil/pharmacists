<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{
    //
    function create(Request $req){
        $validator = Validator::make($req->all(),[
            "name"=>"required|max:15|min:3",
            "email"=>"required|unique:suppliers,email",
            "password"=>"required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
            "conf_password"=>"required|same:password"
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
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
        return response()->json(
            [
                "msg"=>"Added Successfully",
                "data"=>$sp        
            ]
        );
    }
    function get(){
        $data = Supplier::all();
        return response()->json($data);
    }
}
