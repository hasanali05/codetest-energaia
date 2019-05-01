<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('userLogout');
    }
    public function showLoginForm()
    {
         return view('user.login');
    }
    public function login(Request $request)
    {
          //validate data
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        //attemt to log the user in
        if(Auth::guard('web')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember)){
            //if successful, then redirect to their intended location
            return redirect()->intended(route('user.index'));
        }
        else {
           return redirect('/')->with('message','Username or Password is invalid');
       }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userLogout(Request $request)
    {
        $this->guard('web')->logout();

        return redirect()->route('user.login');
    }
}
