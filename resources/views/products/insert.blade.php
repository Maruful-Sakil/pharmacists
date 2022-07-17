<!DOCTYPE html>
<html>
<head>
<style>
    .button{
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
<legend align="center"><h1>Add Stock</h1></legend>
<table style="width:100%">
<form method="post" action="">
    <tr>
        <th>
        @if (session('status'))
                <h2>{{ session('status') }}</h2>
            @endif

            {{@csrf_field()}}
                Product Name: <input type="text" name="pname" placeholder="Name" value=""><br>
                <br>
                @error('pname')
                    {{$message}}<br>
                @enderror
                Product Price: <input type="text" name="price" placeholder="Price" value=""><br>
                <br>
                @error('price')
                    {{$message}}<br>
                @enderror
                Product Category: <input type="text" name="category" placeholder="Category" value=""><br>
                <br>
                @error('category')
                    {{$message}}<br>
                @enderror
                <br>
                Product Quantity: <input type="text" name="quantity" placeholder="Quantity" value=""><br>
                <br>
                @error('pname')
                    {{$message}}<br>
                @enderror
                <input class="button" type="submit" value="Insert">
        </th>
    </tr>
        
</form>

</table>
    
@endsection
</body>
</html>