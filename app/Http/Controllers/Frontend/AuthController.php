<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('frontend.auth.register');
    }

    public function processRegister(Request $request)
    {
        //validation
      $validator=Validator::make(request()->all(), [
        'name'=>['required'],
        'email'=>['required', 'email', 'unique:users'],
        'password'=>['required', 'confirmed'],
        'phone_number'=>['required', 'unique:users']
      ]);


      //error
      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
      }

    }

    public function showLogin()
    {
        return view('frontend.auth.login');
    }

    public function processLogin(Request $request)
    {

    }


    public function redirectToFacebook()
    {

    }

    public function handleFacebookCallback()
    {

    }

    public function redirectToGoogle()
    {

    }

    public function handleGoogleCallback()
    {

    }





}
