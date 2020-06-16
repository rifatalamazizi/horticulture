<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Division;
use App\Models\District;

use Illuminate\Http\Request;
use App\Notifications\VerifyRegistration;

use Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    /* protected $redirectTo = RouteServiceProvider::HOME; */
    protected $redirectTo = '/';    // customized

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @override
     * showRegistrationForm
     *
     * Display the registration form
     *
     * @return void view
     */
    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();   // It comes from DivisionController index()
        $districts = District::orderBy('name', 'asc')->get();   // It comes from DistrictController index()

        return view('auth.register', compact('districts', 'divisions'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /* return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]); */  // Laravel 6.0

        return Validator::make($data, [
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_no' => 'required|max:15',
            'street_address' => 'required|max:150',
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $user = User::create([
            /* 'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), */

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => Str::slug($request->first_name.$request->last_name),
            'division_id' => $request->division_id,
            
            'phone_no' => $request->phone_no,
            'street_address' => $request->street_address,
            'ip_address' => request()->ip(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(50),
            'status' =>  0,
        ]);

        // run this command into gitbash for notification : php artisan make:notification ConfirmRegistration
        //or
        // run this command into gitbash for notification : php artisan make:notification VerifyRegistration
        /* $user->notify(new VerifyRegistration($user, $user->remember_token)); */

        $user->notify(new VerifyRegistration($user));

        session()->flash('success', 'A confirmation email has sent to you.. Please check and confirm your email');

        
        return redirect('/');
    }
}
