@extends('frontend.layouts.master')
@section('main')
<div class="container">
    <div class="row align-items-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h2>Login</h2>
                    @include('frontend.partials.messages')
                </div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group my-2">
                            <label for="email"class="form-lebel">Email</label>
                            <input
                            id="email"
                            type="email"
                            name="email"
                            value=""
                            placeholder="Enter your email"
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
                        <div class="from-group my-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <button class="btn btn-primary">Do not have any account?</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
