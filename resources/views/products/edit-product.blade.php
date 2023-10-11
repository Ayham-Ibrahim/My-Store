@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 style="text-align:center;color:red;"><b>creat your post</b></h2>
    @if($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>whoops!</strong> there were some problems with your input.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    @endif


        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">name</label>
                <input type="text" name="name"  class="form-control" value="{{ $product->name }}" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">price</label>
                <input type="text" name="price" class="form-control" value="{{ $product->price }}" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">description</label>
                <input type="text" name="description" class="form-control" value="{{ $product->description }}" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">quantity</label>
                <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}" id="exampleFormControlInput1">
            </div>


            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">save</button>
            <a href="{{route('products.index')}}" class="btn btn-secondary" style="margin-top: 10px;">cancel</a>
        </form>
    </div>
@stop
