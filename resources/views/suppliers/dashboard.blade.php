<!DOCTYPE html>
<html>
        <head>
        </head>
        <body>
        @extends('layouts.content')
        @section('content')
        <p align="right"><a class="button" align="right" href="{{ route('suppliers.dashboard') }}">Welcome {{$user->name}}</a></p>
                <table border="1" align="center">

                        <tr>
                                <td>Supplier Id</td>
                                <td>Supplier Name</td>
                                <td>Supplier Email</td>
                                <td>Photo</td>
                                <td>Acton</td>
                                
                        </tr>
                
                        <tr>
                                <td>{{$user->suplliers_id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                <img src="{{ asset($user->image) }}" width='100' height='100'/>
                                </td>
                                <td>
                                <a href="{{ url('supplier/edit/'.$user->suplliers_id) }}" class="button">Edit</a>
                                </td>
                        </tr>
                        
                
                        <br><br>
                        
                </table>
                <a href="{{route('logout')}}" class="button">Logout</a>
        @endsection
                
        </body>
</html>