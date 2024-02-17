<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\AuthorizationException;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Models\User;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
    public function __construct()
{
    $this->middleware('auth');
    $this->middleware('signed')->only('verify');
    $this->middleware('throttle:6,1')->only('verify', 'resend');
    
    $this->middleware(function ($request, $next) {
        if (auth()->check() && auth()->user()->isAdmin()) {
            auth()->user()->markEmailAsVerified();

        }
        
        return $next($request);
        auth()->check()->user()->update(['active' => 1]); // Update active status to 1

    });

}
/////////////////////////////////////////////////////////////
public function verify(Request $request)
{
    if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
        throw new AuthorizationException;
    }

    if (! $request->user()->hasVerifiedEmail()) {
        $request->user()->markEmailAsVerified();

        $request->user()->update(['active' => 1]);
    }

    return redirect($this->redirectPath())->with('verified', true);
}



}
