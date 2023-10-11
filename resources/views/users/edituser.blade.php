@extends('layouts.admindashboard')

@section('content')
<div class="container mt-4">
    <h2 style="text-align:center;color:red;"><b>edit user's information</b></h2>
    @if($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>whoops!</strong> there were some problems with your input.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    @endif
        <form action="{{ route('updateuser',$user->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">name</label>
                <input type="text" name="name"  class="form-control" value="{{ $user->name }}" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">email</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">usertype</label>
                <input type="text" name="usertype" class="form-control" value="{{ $user->usertype }}" id="exampleFormControlInput1">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">save</button>
            <a href="{{route('allusers')}}" class="btn btn-secondary" style="margin-top: 10px;">cancel</a>
        </form>
    </div>
@stop
