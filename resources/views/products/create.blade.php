@extends('layouts.app')

@section('content')
<div class="container" >
    <h2 style="text-align:center;color:red;"><b>creat your post</b></h2>
        @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>whoops!</strong> there were some problems with your input.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
        @endif

        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter product's name">
            </div>
            <label for="exampleFormControlInput1" style="margin-top: 10px;">choose the product's category</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <div class="form-group mt-2">
                <label for="exampleFormControlInput1">price</label>
                <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Enter product's price">
            </div>
            <div class="form-group mt-2">
                <label for="exampleFormControlInput1">quantity</label>
                <input type="text" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="Enter product's quantity">
            </div>
            <div class="form-group mt-2">
                <label for="exampleFormControlTextarea1">description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group mt-4">
                <label for="exampleFormControlFile1">choose product photo</label>
                <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
              </div>
            <button type="submit" class="btn btn-primary mt-2" style="margin-top: 10px;">save</button>
            <a href="{{route('products.index')}}" class="btn btn-secondary mt-2" style="margin-top: 10px;">cancel</a>
        </form>
    </div>
@stop
