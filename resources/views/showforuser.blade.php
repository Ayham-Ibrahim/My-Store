@extends('layouts.user')

@section('content')

    <div class="container">

        <div class="row row-sm">
            <div class="col">

                    <div class="card-body h-100">
                        <div class="row row-sm ">
                            <div class=" col-xl-5 col-lg-12 col-md-12">
                                <div class="preview-pic tab-content">
                                  <div class="tab-pane active" id="pic-1"><img src="{{ asset('imgs/'.$product->photo) }}" alt="image"/></div>
                                </div>

                            </div>
                            <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                <h4 class="product-title mb-1">{{ $product->name }}</h4>
                                <p class="text-muted tx-13 mb-1">{{$product->category->name}}</p>
                                <div class="rating mb-1">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star text-muted"></span>
                                        <span class="fa fa-star text-muted"></span>
                                    </div>
                                    <span class="review-no">41 reviews</span>
                                </div>
                                <h6 class="price">current price: <span class="h3 ml-2">{{$product->price}}</span></h6>
                                <p class="product-description">{{ $product->description }}<</p>
                                <div class="sizes d-flex">sizes:
                                    <span class="size d-flex"  data-toggle="tooltip" title="small"><label class="rdiobox mb-0"><input checked="" name="rdio" type="radio"> <span class="font-weight-bold">s</span></label></span>
                                    <span class="size d-flex"  data-toggle="tooltip" title="medium"><label class="rdiobox mb-0"><input name="rdio" type="radio"> <span>m</span></label></span>
                                    <span class="size d-flex"  data-toggle="tooltip" title="large"><label class="rdiobox mb-0"><input name="rdio" type="radio"> <span>l</span></label></span>
                                    <span class="size d-flex"  data-toggle="tooltip" title="extra-large"><label class="rdiobox mb-0"><input name="rdio" type="radio"> <span>xl</span></label></span>
                                </div>

                                <div class="container mb-4">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <ul class="preview-thumbnail nav nav-tabs">
                                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-5.png')}}" alt="image"/></a></li>
                                        <li><a data-target="#pic-2" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-2.png')}}" alt="image"/></a></li>
                                        <li><a data-target="#pic-3" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-3.png')}}" alt="image"/></a></li>
                                        <li><a data-target="#pic-4" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-4.png')}}" alt="image"/></a></li>
                                        <li><a data-target="#pic-5" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-1.png')}}" alt="image"/></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="action">
                                    <a href="{{route('home')}}" class="btn btn-primary mb-2">back to Products page</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop

