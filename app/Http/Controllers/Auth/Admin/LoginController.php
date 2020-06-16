<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Notifications\VerifyRegistration;
use App\User;

use Illuminate\Http\Request;
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
    /* protected $redirectTo = RouteServiceProvider::HOME; */ //Default for Laravel 6.0
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // If you use this line you can directly go to login page by url just write --> http://localhost/Ecom1/admin/login
        // This is ok for Laravel 5.6 to 5.8 but not applied for Laravel 6.x
        /* $this->middleware('guest')->except('logout'); */ 
        
        // If you use this you can't go to login page by just http://localhost/Ecom1/admin/login
        // You must logout then you can.
        $this->middleware('guest:admin')->except('logout'); // customized by developer
        
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
        /* return view('auth.admin.login', ['url' => 'admin']); */ // customized by developer
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email, 
            'password' => $request->password

            ],$request->remember)) {

            // Log Him Now
            return redirect()->intended(route('admin.index'));
        }else {
            session()->flash('sticky_error', 'Invalid Login !!'); // Not errors cz laravel has default errors function
            return redirect()->route('login');
        }

    }

    /* -----------DEFAULT--------------- */
    /* public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    } */
    /* -----------DEFAULT--------------- */

    public function logout(Request $request)
    {

        /* $this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login'); */

        /* You can use up codes or down codes as you like */

        Auth::guard('admin')->logout(); //customized by developer
        $request->session()->invalidate(); //customized by developer
        return redirect()->route('admin.login'); //customized by developer
    }
}