@extends('layouts.admindashboard')

@section('content')
<div class="container mt-4">
    <h2 style="text-align:center;color:red;"><b>edit your category</b></h2>
    @if($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>whoops!</strong> there were some problems with your input.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    @endif


        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="exampleFormControlInput1">name</label>
                <input type="text" name="name"  class="form-control" value="{{ $category->name }}" id="exampleFormControlInput1">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">save</button>
            <a href="{{route('categories.index')}}" class="btn btn-secondary" style="margin-top: 10px;">cancel</a>
        </form>
    </div>
@stop
