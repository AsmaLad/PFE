<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Bestmomo\LaravelEmailConfirmation\Traits\AuthenticatesUsers;
use Illuminate\Http\Request;

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
 protected $redirectTo = '/login';
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated($request ,$user)
    {
       if ($user->isRole('admin'))
        {
            return redirect('/admin');
        }
        elseif($user->isRole('redac')){
            return redirect('/user');
            
        }else{
         
            return view('front.header');
        }
    }
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        return redirect('/login');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'log';
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $logValue = $request->input($this->username());

        $logKey = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        return [
            $logKey => $logValue,
            'password' => $request->input('password'),
        ];
    }
}
