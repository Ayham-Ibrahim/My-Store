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
    @if(Session::get('sucsses'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('sucsses')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <a href="{{route('admin.create')}}" class="btn btn-primary">Add new product</a>


        <div class="container">


            @if(Session::get('message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            @if(Session::get('del'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{Session::get('del')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            @if(Session::get('sucsses'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('sucsses')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif




    @endsection
</body>
</html>
