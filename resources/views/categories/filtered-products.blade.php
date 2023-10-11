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
        @if(Session::get('restore'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('restore')}}
            </div>
        @endif
            <a href="{{route('products.create')}}" class="btn btn-primary">Add new product</a>
            <a href="{{ route('deletedproduct') }}" class="btn btn-secondary">show deleted product</a>

                <div class="row row-sm mt-2">

                    @foreach($products as $product)
                    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="pro-img-box">
                                    <div class="d-flex product-sale">
                                        <i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
                                    </div>
                                    <img class="w-100" src="{{ asset('imgs/'.$product->photo) }}" style="height: 300px;" alt="product-image">
                                    {{-- <a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
                                    </a> --}}
                                </div>
                                <div class="text-center pt-3">
                                    <h3 class="h6 mb-2 mt-4 font-weight-bold">{{$product->name}}</h3>
                                    <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$product->category->name}}</h3>
                                    <span class="tx-15 ml-auto">
                                        <i class="ion ion-md-star text-warning"></i>
                                        <i class="ion ion-md-star text-warning"></i>
                                        <i class="ion ion-md-star text-warning"></i>
                                        <i class="ion ion-md-star-half text-warning"></i>
                                        <i class="ion ion-md-star-outline text-warning"></i>
                                    </span>
                                    <h4 class="h5 mb-3 mt-2 text-center font-weight-bold"> quantity: {{$product->quantity}}<span class="text-secondary font-weight-normal tx-13 ml-1 prev-price"></span></h4>
                                    <h4 class="h5 mb-3 mt-2 text-center font-weight-bold text-danger">{{$product->price}} ل.س <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price"></span></h4>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('products.show',$product->id) }}" class="btn btn-secondary">show</a>
                                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">edit</a>
                                        <button type="submit" class="btn btn-danger">SoftDelete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>


    @endsection
</body>
</html>
