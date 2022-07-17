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
    <!-- <a class="button" href="{{route('suppliers.dashboard')}}">Dashboard</a> -->
    <!-- <a class="button" href="{{ route('products.insert') }}">Inser Products</a> -->
    <h1>Buyers List</h1>
    @if (session('status'))
                <h2 align="center">{{ session('status') }}</h2>
    @endif
    <form action="">
        <div>
        <input type="search" name="search" placeholder="Search Buyers" value="{{$search}}">
        </div>
            <button class="button">Search</button>
    </form>
    <br>
    <a href="{{url('/buyers/list')}}">
              <button class="button">Reset</button>  
    </a>
    <br>

<table border="1" align="center">
    <tr>
        <td>Buyer Id</td>
        <td>Buyer Name</td>
        <td>Buyer Email</td>
        <td>Buyer Number</td>
        <td>Destination</td>
        <td>Action</td>
    </tr>
    @foreach ($buyers as $buyer)
    <tr>
        <td>{{$buyer->id}}</td>
        <td>{{$buyer->name}}</td>
        <td>{{$buyer->email}}</td>
        <td>{{$buyer->number}}</td>
        <td>{{$buyer->destination}}</td>
        <td>
        <a href="{{ url('bdelete/'.$buyer->id) }}" class="button">Complete Order</a>
        </td>

    </tr>
        
    @endforeach




</table>
@endsection
    </body>
</html>