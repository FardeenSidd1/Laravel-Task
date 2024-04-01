<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

        public function loginPage()
        {
            return view ('auth.login');
        }

    public function login(Request $request)
    {
        // let's validate and set our credentials
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))) {
            if (Auth::check()) {
                if (Auth::user()) {
                    return redirect()->route('home');
                } else {
                    Auth::logout();
                    return redirect()->back()->withErrors(['email' => __("message.You can\'t login here.")]);
                }
            }
        }
        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => __('message.Member credentials are wrong.'),
            ]);
    }
}
