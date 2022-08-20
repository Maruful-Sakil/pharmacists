<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Token;
use Illuminate\Support\Facades\Validator;
use Datetime;
use Illuminate\Support\Str;


class APIController extends Controller
{
    //
    function create(Request $req){
        $validator = Validator::make($req->all(),[
            "name"=>"required|max:15|min:3",
            "email"=>"required|unique:suppliers,email",
            "password"=>"required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
            "dob"=>"required",
            "gender"=>"required|in:male,female",
            "conf_password"=>"required|same:password"
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        $sp = new Supplier();
        $sp->name = $req->input('name');
        $sp->email =$req->input('email');
        $sp->password =$req->input('password');
        $sp->gender =$req->input('gender');
        $sp->dob =$req->input('dob');
        // $requestData = $req->all();
        // $fileName = time().$req->file('image')->getClientOriginalName();
        // $path = $req->file('image')->storeAs('images', $fileName, 'public');
        // $requestData["image"] = '/storage/'.$path; Supplier::create($requestData);
        $sp->save();
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
    function list(){
        $data = Product::all();
        return response()->json($data);
    }
    function blist(){
        $data = Buyer::all();
        return response()->json($data);
    }
    function delete($product_id){
        $data = Product::find($product_id);
        $data->delete();
        return response()->json(
            [
                "msg"=>"Deleted Successfully",
                "data"=>$data       
            ]
        );
    }
    function bupdate(Request $req,$id){
        $data = Buyer::where('id',$id)->first();
        $data->name = $req->input('name');
        $data->email =$req->input('email');
        $data->number =$req->input('number');
        $data->save();

        return response()->json(
            [
                "msg"=>"Updated Successfully",
                "data"=>$data       
            ]
        );
    }
    function supdate(Request $req,$suplliers_id){
        $data = Supplier::where('suplliers_id',$suplliers_id)->first();
        $data->name = $req->input('name');
        $data->email =$req->input('email');
        $data->save();

        return response()->json(
            [
                "msg"=>"Edited Successfully",
                "data"=>$data       
            ]
        );
    }
    function login(Request $req){
        $validator = Validator::make($req->all(),[
            "email"=>"required|unique:suppliers,email",
            "password"=>"required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/"
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        $user = Supplier::where('email',$req->email)
                        ->where('password',$req->password)->first();
        if($user){
            $key = Str::random(67);
            $token = new Token();
            $token->tkey = $key;
            $token->user_id = 1;
            $token->created_at = new Datetime();
            $token->save();
            return response()->json($token);
        }
        return response()->json(["msg"=>"Email password invalid"],404);
    }
    function logout(Request $req){
        $tk = $req->token;
        $token = Token::where('tkey',$tk)->first();
        $token->expired_at = new Datetime();
        $token->save();
        return response()->json(["msg"=>"Logged out"]);
    }

}
