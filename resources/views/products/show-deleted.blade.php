@extends('layouts.admin')

    @section('content')

    <div class="container">

        @if(Session::get('del'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('del')}}
            </div>
        @endif
        <a href="{{ route('products.index') }}" class="btn btn-primary">back to Products page</a>

            <div class="row" style="margin-top:10px;">
                @foreach($products as $product)
                    <div class="col-sm-4" style="margin-top: 10px;margin-bottom: 10px;">
                        <div class="card h-100 my-card-style">
                        <img class="card-img-top" src="{{ asset('imgs/'.$product->photo) }}" style="height: 300px;" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"> {{$product->name}}</h5>
                            <h6 class="card-text" ><strong style="display: contents;color: red;">price: </strong>{{$product->price}}</h6>
                            <h6 class="card-text" ><strong>{{$product->category->name}}</strong></h6>
                            <p class="card-text text-truncate">{{$product->description}}</p>

                            <form action="{{ route('forcedelete',$product->id) }}" method="GET">
                                @csrf
                                <a href="{{ route('restore',$product->id) }}" class="btn btn-success">restore</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>

    </div>


    @endsection
