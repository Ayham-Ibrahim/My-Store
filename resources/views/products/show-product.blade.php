@extends('layouts.admin')

@section('content')

    <div class="container">
        <a href="{{ route('products.index') }}" class="btn btn-primary mb-2">back to Products page</a>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('imgs/'.$product->photo) }}" alt="Product Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <h6 class="card-text" ><strong>{{$product->category->name}}</strong></h6>
                <p><strong style="color: red;">Price: {{$product->price}}</strong></p>
            </div>
        </div>
    </div>
@stop
