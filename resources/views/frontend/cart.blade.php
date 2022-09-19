@extends('frontend.layouts.master')

@section('main')


<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                      @if(session()->has('message'))
                      <div class="alert alert-success">
                        {{session()->get('message')}}
                      </div>
                      @endif
                      <h6 class="mb-0 text-muted">3 items</h6>
                    </div>
                    <hr class="my-4">


                    @if(empty($cart))
                    <div class="alert alert-info">
                        Plesae add products in your cart.browe our products<a href="{{route('home')}}">BdShop</a>
                    </div>
                    @else
                    @foreach ($cart as $product)
                    <div class="row mb-4 d-flex justify-content-between align-items-center">


                        <div class="col-md-2 col-lg-2 col-xl-2">

                          {{-- image --}}
                          <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                            {{-- image --}}
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          {{-- title --}}
                          <h6 class="text-muted">{{$product['title']}}</h6>
                          <h6 class="text-black mb-0">Cotton T-shirt</h6>
                        </div>
                        {{-- quantity --}}
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                         <h3>quantity:{{$product['quantity']}}</h3>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                          {{-- orignal_price --}}
                          <h6 class="mb-0">{{$product['original_price']}}</h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <form action="{{route('cart.remove')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product['id']}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="add-to-cart btn btn-primary" type="submit">Remove</button>
                            </form>
                        </div>
                      </div>




                    @endforeach




                    <div class="pt-5">
                      <h6 class="mb-0"><a href="{{route('cart.clear')}}" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Clear-Cart</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">items 3</h5>
                      <h5>€ 132.00</h5>
                    </div>

                    <h5 class="text-uppercase mb-3">Shipping</h5>

                    <div class="mb-4 pb-2">
                      <select class="select">
                        <option value="1">Standard-Delivery- €5.00</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                      </select>
                    </div>

                    <h5 class="text-uppercase mb-3">Give code</h5>

                    <div class="mb-5">
                      <div class="form-outline">
                        <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplea2">Enter your code</label>
                      </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5>BDT:{{number_format($total)}}</h5>
                    </div>
                    <a href="{{route('checkout')}}">
                        <button type="button" class="btn btn-dark btn-block btn-lg"
                      data-mdb-ripple-color="dark">Checkout</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </section>
@endsection
