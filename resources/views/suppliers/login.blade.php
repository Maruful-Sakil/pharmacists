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
<h1>{{Session::get('msg')}}</h1>
@extends('layouts.main')
@section('content')
<legend align="center"><h1>Login</h1></legend>
<table style="width:100%"><form method="post" action="">
    <tr>
        <th>
        {{@csrf_field()}}
        Email: <input type="text" name="email" placeholder="Email"><br>
        @error('email')
            {{$message}} <br>
        @enderror
        Password: <input type="password" name="password" placeholder="password" ><br>
        @error('password')
            {{$message}}<br>
        @enderror
        <br>
        <input class="btn" type="submit" value="Login"></th>
    </tr>    
    </form>
</table>
    
@endsection


</body>
</html>