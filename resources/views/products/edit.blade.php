<!DOCTYPE html>
<html>
<head>
<style>
    .btn{
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
table{
	border-collapse: collapse;
	width: 100%;
}
</style>
</head>
<body>
@extends('layouts.content')
@section('content')
<legend align="center"><h1>Edit Stock</h1></legend>
<table style="width:100%">

<form method="post" action="{{ url('product/update/'.$prod->product_id) }}">
    <tr>
        <th>
        @if (session('status'))
                <h2>{{ session('status') }}</h2>
            @endif

            {{@csrf_field()}}
            @method('PUT')
                Product Name: <input type="text" name="pname" placeholder="Name" value="{{ $prod->pname }}"><br>
                <br>
                @error('pname')
                    {{$message}}<br>
                @enderror
                Product Price: <input type="text" name="price" placeholder="Price" value="{{ $prod->price }}"><br>
                <br>
                @error('price')
                    {{$message}}<br>
                @enderror
                Product Category: <input type="text" name="category" placeholder="Category" value="{{ $prod->category }}"><br>
                <br>
                @error('category')
                    {{$message}}<br>
                @enderror
                <br>
                Product Quantity: <input type="text" name="quantity" placeholder="Quantity" value="{{ $prod->quantity }}"><br>
                <br>
                @error('pname')
                    {{$message}}<br>
                @enderror
                <input class="btn" type="submit" value="Update">
        </th>
    </tr>
        
</form>

</table>
    
@endsection
</body>
</html>