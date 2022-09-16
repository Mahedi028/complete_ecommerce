@extends('frontend.layouts.master')

@section('main')

    @include('frontend.partials.hero')

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($products as $product)
        <div class="col">
            <div class="card shadow-sm">

              {{-- image --}}
              <a href="{{route('product.detail', $product->slug)}}"><img class="card-img-top"
               src="{{$product->getFirstMediaUrl('products')}}"
               alt="{{$product->title}}"
              >
            </a>
              <div class="card-body">

                  {{-- title --}}
                <p class="card-text">
                    {{$product->title}}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                  {{-- add to cart --}}
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Add-to-cart</button>
                  </div>

                  {{-- price --}}
                  <strong class="text-muted">{{$product->original_price}}</strong>
                </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>

      {{$products->render()}}
    </div>
  </div>


@endsection

