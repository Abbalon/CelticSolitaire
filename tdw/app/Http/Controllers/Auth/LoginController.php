<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    public function redirectTo(){

    $id = Auth::user()->id;

      if(Auth::user()->isAdmin == 1){
        return '/admin';
      } elseif (
          (Auth::user()->isEnabled == 1) &&
          (Auth::user()->isDelete == 0)
      ) {
          $path = '/user?id='.$id;
          return $path ;
      } else {
          //TODO
          $message = "Access denied";
          echo "<script type='text/javascript'>alert('$message');</script>";
          Auth::logout();
          return '/';
      }
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
