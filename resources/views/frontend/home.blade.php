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
                    <form action="{{route('cart.add')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="add-to-cart btn btn-primary" type="submit">add to cart</button>
                    </form>
                </div>

                  {{-- price --}}
                  <strong class="text-muted">
                    @if($product->selling_price !=null ||$product->selling_price > 0)
                        BDT:<strike>{{$product->selling_price}}</strike>BDT:{{$product->original_price}}
                        @else
                    BDT:{{$product->original_price}}
                    @endif
                </strong>
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

