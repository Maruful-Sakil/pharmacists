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
.button2 {
  background-color: #cd040b;
  color: white;
  text-align: center;
}
</style>
    </head>
    <body>
        @extends('layouts.content')
        @section('content')
    <h1>Delivery Status</h1>
    <br>
    @if (session('status'))
                <h2 align="center">{{ session('status') }}</h2>
    @endif

<table border="1" align="center">
    <tr>
        <td>Product Id</td>
        <td>Product Name</td>
        <td>Delivery Destination</td>
        <td>Delivery Status</td>
        <td>Action</td>
    </tr>
    @foreach ($delivery as $del)
    <tr>
        <td>{{$del->id}}</td>
        <td>{{$del->name}}</td>
        <td>
        {{$del->destination}}
        </td>
        <td>@if ($del->status=='pending')
                <a href="" class="button2">pending</a>
                @else
                <a href="" class="button">delivered</a>
            @endif
        </td>
        <td>
        <a href="{{ url('delivery/edit/'.$del->id) }}" class="button">Update</a>
        </td>

    </tr>
        
    @endforeach




</table>
@endsection
    </body>
</html>