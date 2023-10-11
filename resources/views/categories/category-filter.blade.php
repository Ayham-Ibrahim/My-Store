@extends('layouts.user')

@section('content')

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            !!{{ session('success') }} <strong>...Please visit my cart page to confirm</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
        </div>
    </div>
    <h2 style="text-align:center;color:red;"><b>Our products</b></h2>
        <div class="row" style="margin-top:10px;">

            @foreach($products as $product)

                <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pro-img-box">
                                <div class="d-flex product-sale">
                                    <i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
                                </div>
                                <img class="w-100" src="{{ asset('imgs/'.$product->photo) }}" style="height: 300px;" alt="product-image">
                                <a href="{{ route('add_to_cart', $product->id) }}" class="adtocart"> <i class="las la-shopping-cart "></i>
                                </a>
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
                                <form method="POST" action="{{ route('showforuser') }}">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button class="btn btn-primary" type="submit">View Product</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
@endsection

