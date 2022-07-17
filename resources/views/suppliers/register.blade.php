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
@extends('layouts.main')
@section('content')
<legend align="center"><h1>Registration</h1></legend>
<table style="width:100%">
<form method="post" action="{{url('suppliers/register')}}" enctype="multipart/form-data">
    <tr>
        <th>
            @if (session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
            @endif

            {{@csrf_field()}}
                Name: <input type="text" name="name" placeholder="Name" value="{{old('name')}}"><br>
                <br>
                @error('name')
                    {{$message}}<br>
                @enderror
                Email: <input type="text" name="email" placeholder="Email"><br>
                <br>
                @error('email')
                    {{$message}} <br>
                @enderror
                Password: <input type="password" name="password" placeholder="password" ><br>
                <br>
                @error('password')
                    {{$message}}<br>
                @enderror
                Confirm Password: <input type="password" name="conf_password" placeholder ="confirm pass"><br>
                <br>
                @error('conf_password')
                    {{$message}}<br>
                @enderror
                Gender: <input type="radio" value="male" name="gender"> Male <input type="radio" value="female" name="gender"> Female<br>
                <br>
                Dob: <input type="date" name="dob"><br>
                <br>
                @error('dob')
                    {{$message}}<br>
                @enderror
                Upload Image: <input type="file" name="image">
                @error('image')
                    {{$message}}<br>
                @enderror
                <br>
                <input class="btn" type="submit" value="Register">
        </th>
    </tr>
        
</form>

</table>
    
@endsection
</body>
</html>