<!DOCTYPE html>
<html>
    <head>
    <style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
}
</style>
    </head>
    <body>
        @extends('layouts.content')
        @section('content')
    <h1>Stock</h1>
    <br>
    @if (session('status'))
                <h2 align="center">{{ session('status') }}</h2>
    @endif

<table border="1" align="center">
    <tr>
        <td>Product Id</td>
        <td>Product Name</td>
        <td>Price</td>
        <td>Categiry</td>
        <td>Quantity</td>
        <td>Action</td>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{$product->product_id}}</td>
        <td>{{$product->pname}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->category}}</td>
        <td>{{$product->quantity}}</td>
        <td>
        <a href="{{ url('edit/'.$product->product_id) }}" class="button">Update</a>
        <a href="{{ url('delete/'.$product->product_id) }}" class="button">Delete</a>
        </td>

    </tr>
        
    @endforeach




</table>
<span>
    {{$products->links()}}
</span>
<style>
    .w-5{
        display: none;
    }
</style>
@endsection
    </body>
</html>