<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

// use App\Http\Controllers\CarAdminController;
// use App\Http\Controllers\ImageController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\TestimonialsController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
        public function credentials(Request $request){
            if(is_string($request->email)){
            return ['username'=>$request->email, 'password'=>$request->password];
            }elseif(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return ['email'=>$request->email, 'password'=>$request->password];
            }
            }
 
}
   