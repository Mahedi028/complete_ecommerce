<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Interfaces\UserInterface;
use App\Notifications\RegisterEmailNotification;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    protected $user;
    public function __construct(UserInterface $user)
    {
        $this->user=$user;
    }
    public function showRegister()
    {
        return view('frontend.auth.register');
    }

    public function processRegister(Request $request)
    {
                  //validation
      $validator=Validator::make(request()->all(), [
        'email'=>['required', 'email', 'unique:users'],
        'password'=>['required', 'confirmed'],
        'password'=>['required'],
        'phone_number'=>['required', 'unique:users', 'min:11', 'max:15']
      ]);


      //error
      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
      }


        try{
      //create
      $user=User::create([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'password'=>bcrypt($request->input('password')),
        'phone_number'=>$request->input('phone_number'),
        'email_verification_token'=>uniqid(time().$request->input('email').str_random(16))
      ]);

      session()->flash('type', 'success');
      session()->flash('message', 'User Created SuccessFully');

      //Email verification
      $user->notify(new RegisterEmailNotification($user));

      return redirect()->route('login');

        }catch(\Exception $e){
            session()->flash('type', 'warning');
            session()->flash('message', $e->getMessage());

        }

        return redirect()->back();
    }

    public function activate($token=null)
    {
        if($token==null){
            return redirect('/');
        }

        $user=User::where('email_verification_token', $token)->firstOrFail();

        if($user){
            $user->update([
                'email_verified_at'=>Carbon::now(),
                'email_verification_token'=>null
            ]);

            session()->flash('type', 'success');
            session()->flash('message', 'Account activated. you can login now');



            return redirect()->route('login');

        }

        session()->flash('type', 'warning');
        session()->flash('message', 'invalid token');


        return redirect()->route('login');


    }

    public function showLogin()
    {
        return view('frontend.auth.login');
    }

    public function processLogin(Request $request)
    {
                   //validation
      $validator=Validator::make(request()->all(), [
        'email'=>['required', 'email'],
        'password'=>['required'],
      ]);


      //error
      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
      }


      //check credentials
      $credentials=request()->only(['email', 'password']);

      if(auth()->attempt($credentials)){

        // $user=auth()->user();

        if(auth()->user()->email_verified_at==null){
            session()->flash('type', 'warning');
            session()->flash('message', 'your account is not activated');

            return redirect()->route('login');
        }

        session()->flash('type', 'success');
        session()->flash('message', 'User logged in successfully');

        return redirect()->intended();
      }


      session()->flash('type', 'warning');
      session()->flash('message', 'invalid credentials');

      return redirect()->back();

    }

    public function logout()
    {
        auth()->logout();
        session()->flash('type', 'success');
        session()->flash('message', 'User logged out successfully');

        return redirect('/');
    }

    public function profile()
    {
        return view('frontend.profile');
    }




    public function redirectToFacebook()
    {

    }

    public function handleFacebookCallback()
    {

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $userGoogle = Socialite::driver('google')->stateless()->user();

            // $all=dd($userGoogle);

            // return $all;

            $finduser = User::where('google_id', $userGoogle->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('home');

            }else{
                $newUser = User::create([
                    'name'=>$userGoogle->name,
                    'email'=>$userGoogle->email,
                    'password'=>bcrypt('1234'),
                    // 'avatar'=>$userGoogle->user['picture'],
                    'google_id'=>$userGoogle->user['id']
                ]);

                Auth::login($newUser);

                // return redirect()->intended('home');
                return redirect()->route('home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }





}
