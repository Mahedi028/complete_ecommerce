@extends('frontend.layouts.master')

@section('main')

<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    {{-- image --}}
                    <img
                    src="{{$product->getFirstMediaUrl('products')}}"
                    alt="{{$product->title}}"
                    />
                    {{-- <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
                    </div> --}}
                    {{-- gallary --}}
                    {{-- <ul class="preview-thumbnail nav nav-tabs">
                      <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                    </ul> --}}

                </div>
                <div class="details col-md-6">
                    {{-- title --}}
                    <h3 class="product-title">{{$product->title}}</h3>

                    {{-- <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div> --}}
                    <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">
                        @if($product->selling_price !=null ||$product->selling_price > 0)
                             BDT:<strike>{{$product->selling_price}}</strike>BDT:{{$product->original_price}}
                        @else
                            BDT:{{$product->original_price}}
                        @endif
                    </h4>

                    {{-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> --}}
                    {{-- <h5 class="sizes">sizes:
                        <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                    </h5> --}}
                    {{-- <h5 class="colors">colors:
                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                    </h5> --}}
                    <div class="action">
                        <form action="{{route('cart.add')}}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button class="add-to-cart btn btn-primary" type="submit">add to cart</button>
                        </form>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
