<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function insert(){
        return view('products.insert');
    }
    function insertSubmit(Request $req){
        $this->validate($req,
            [
                "pname"=>"required",
                "price"=>"required",
                "category"=>"required",
                "quantity"=>"required"
            ],
        
            [
                "pname.required"=>"Please provide name",
                "price.required"=>"Please provide price",
                "category.required"=>"Please provide category",
                "quantity.required"=>"Please provide quantity",
                
            ]);
            
            $prod = new Product();
            $prod->pname = $req->input('pname');
            $prod->price =$req->input('price');
            $prod->category =$req->input('category');
            $prod->quantity =$req->input('quantity');

            $prod->save();
            return redirect()->back()->with('status','Products added');
        
    }
    function list(){
        $list = Product::paginate(10);
        return view('products.list',['products'=>$list]);
    }
    function edit($product_id){
         $prod = Product::where('product_id' ,$product_id)->first();
         return view('products.edit', compact('prod'));
    }
    function update(Request $req,$product_id){
        $prod = Product::where('product_id',$product_id)->first();

        $prod->pname = $req->input('pname');
        $prod->price =$req->input('price');
        $prod->category =$req->input('category');
        $prod->quantity =$req->input('quantity');

        $prod->save();

        return redirect()->route('products.list')->with('status',"Stock Updated");
    }
    function delete($product_id){
        $prod = Product::find($product_id);
        $prod->delete();
        return redirect()->route('products.list')->with('status',"Stock Deleted");
    }
    function delivery(){
        $del = Delivery::all();
        $del = Delivery::orderBy('status')->get();
        return view('products.delivery',['delivery'=>$del]);
    }
    function deledit($id){
        $del = Delivery::where('id' ,$id)->first();
        return view('products.updatedel', compact('del'));
   }
    function delupdate(Request $req,$id){
        $del = Delivery::where('id',$id)->first();

        $del->status = $req->input('status');
        $del->save();

        return redirect()->route('product.delivery')->with('status',"Delivery Updated");
    }
}