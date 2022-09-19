@extends('frontend.layouts.master')


@section('main')
<div class="container">
  <div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h2>Register</h2>
                @include('frontend.partials.messages')
            </div>
            <div class="card-body">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="form-group my-2">
                        <label for="name"class="form-lebel">Name</label>
                        <input
                        id="name"
                        type="text"
                        name="name"
                        value=""
                        placeholder="Enter your name"
                        class="form-control @error('name') is-invalid @enderror"
                        />
                             @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="email"class="form-lebel">Email Address</label>
                        <input
                        id="email"
                        type="email"
                        name="email"
                        value=""
                        placeholder="Enter your email address"
                        class="form-control @error('email') is-invalid @enderror"
                        />
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="password"class="form-lebel">Password</label>
                        <input
                        id="password"
                        type="password"
                        name="password"
                        value=""
                        placeholder="Enter your password"
                        class="form-control @error('password') is-invalid @enderror"
                        />
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="confirm_password"class="form-lebel">Confirm Password</label>
                        <input
                        id="confirm_password"
                        type="password"
                        name="password_confirmation"
                        value=""
                        placeholder="Enter your confirm password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        />
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="phone_number"class="form-lebel">Phone Number</label>
                        <input
                        id="phone_number"
                        type="text"
                        name="phone_number"
                        value=""
                        placeholder="Enter your phone number"
                        class="form-control @error('phone_number') is-invalid @enderror"
                        />
                        @error('phone_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="from-group my-2">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <button class="btn btn-primary">Already register?</button>
                    </div>
                </div>
                </form>
          </div>
        </div>
          <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h2>Social Login</h2>
                </div>
                <div class="card-body">
                    <div class="from-group my-2">
                        <a href="{{route('login.google')}}">
                            <button class="btn btn-secondary"><i class="fa-brands fa-google mx-2"></i>Sign with Google</button>
                        </a>
                    </div>
                    <div class="from-group my-2">
                        <a href="{{route('login.facebook')}}">
                            <button class="btn btn-secondary"><i class="fa-brands fa-facebook mx-2"></i>Sign with Facebook</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>

@endsection
