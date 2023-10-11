
@extends('layouts.admindashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')
    <div class="container mt-4">
        <h3 style="margin-bottom: 25px;text-align: center;">Users table</h3>
        @if(Session::get('sucsses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('sucsses')}}
            </div>
        @endif
        @if(Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
            </div>
        @endif
        @if(Session::get('del'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('del')}}
            </div>
        @endif
            <div class="row" style="margin-top:10px;">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">usertype</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        <th scope="col">orders</th>
                        <th scope="col">pending orders</th>
                        <th scope="col">accepted orders</th>
                        <th scope="col">rejected orders</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">0</th>
                            <td>admin</td>
                            <td>admin@gmail.com</td>
                            <td>admin</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @foreach($users as $index => $user)
                    @if ($index > 0)
                        <tr>
                            <th scope="row">{{ $loop->index }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->usertype }}</td>
                            <td><a href="{{ route('edituser',$user->id) }}" class="btn btn-primary">edit</a></td>
                            <td><a href="{{ route('deleteuser',$user->id) }}" class="btn btn-danger">deleted</a></td>
                            <td><a href="{{ route('user_orders',$user->id) }}" class="btn btn-secondary">show Orders</a></td>
                            <td>
                                <form action="{{ route('filter_orders',$user->id) }}" method="post">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" name="status" value="pending">
                                    <button type="submit" class="btn btn-secondary">pending orders</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('filter_orders', $user->id) }}" method="post">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" name="status" value="accepted">
                                    <button type="submit" class="btn btn-success">accepted orders</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('filter_orders', $user->id) }}" method="post">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="btn btn-danger">rejected orders</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                      @endforeach
                    </tbody>
                  </table>
            </div>
    </div>
    @endsection
</body>
</html>
