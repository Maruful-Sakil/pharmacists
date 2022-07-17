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
<legend align="center"><h1>Edit Supplier</h1></legend>
<table style="width:100%">
<form method="post" action="{{ url('supplier/update/'.$sp->suplliers_id) }}">
    <tr>
        <th>
            @if (session('status'))
                <h2>{{ session('status') }}</h2>
            @endif

            {{@csrf_field()}}
            @method('PUT')
                Name: <input type="text" name="name" placeholder="Name" value="{{ $sp->name }}"><br>
                <br>
                @error('name')
                    {{$message}}<br>
                @enderror
                Email: <input type="text" name="email" placeholder="Email" value="{{ $sp->email }}"><br>
                <br>
                @error('email')
                    {{$message}} <br>
                @enderror
                <br>
                Update Image: <input type="file" name="image">
                @error('image')
                    {{$message}}<br>
                @enderror
                <br>
                <input class="btn" type="submit" value="Update">
        </th>
    </tr>
        
</form>

</table>
    
@endsection
</body>
</html>