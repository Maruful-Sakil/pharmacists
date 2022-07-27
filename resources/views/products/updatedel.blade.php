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
<legend align="center"><h1>Edit Delivery</h1></legend>
<table style="width:100%">

<form method="post" action="{{ url('delivery/update/'.$del->id) }}">
    <tr>
        <th>
        @if (session('status'))
                <h2>{{ session('status') }}</h2>
            @endif

            {{@csrf_field()}}

            @method('PUT')
                <label for="status">Status</label>

                <select name="status">
                <option value="pending">Pending</option>
                <option value="delivered">Delivered</option>
                </select>
                    <br>
                    @error('status')
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