<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;

class BuyerController extends Controller
{
    //
    function blist(Request $req){
        $search = $req['search'] ?? "";
        if ($search != ""){
            $buyers = Buyer::where('name','LIKE', "%$search%")->orWhere('number','LIKE', "%$search%")->get();
        }else {
            $buyers = Buyer::all();
        }
        $data = compact('buyers','search');
        return view('buyers.blist')->with($data);
        // return view('buyers.blist',['buyers'=>$buyers]);
    }
    function bdelete($id){
        $buyer = Buyer::find($id);
        $buyer->delete();
        return redirect()->route('buyers.list')->with('status',"Deliver Complete");
    }
    function search(){

    }
}
