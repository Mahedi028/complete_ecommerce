@extends('frontend.layouts.master')

@section('main')
    <h3>{{auth()->user()->name}}</h3>
@endsection
