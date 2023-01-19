<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
    protected $redirectTo = RouteServiceProvider::HOME;
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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
<<<<<<< HEAD
            'l_name' => ['required', 'string', 'max:255'],
            'f_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
=======
            'register_name' => ['required', 'string', 'max:255'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'register_password' => ['required', 'string', 'min:8', 'confirmed'],
>>>>>>> 4c547fb9c77a7245847c725e7c8584dff6a6e9ce
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
<<<<<<< HEAD
        dd($data);
        // $user = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        // $user->assignRole($data['roles']);
        // return $user;
=======
        $user = User::create([
            'name' => $data['register_name'],
            'email' => $data['register_email'],
            'password' => Hash::make($data['register_password']),
        ]);
        $user->assignRole($data['roles']);
        return $user;
>>>>>>> 4c547fb9c77a7245847c725e7c8584dff6a6e9ce
    }

    public function showRegistrationForm($for ="")
    {
      // if($for == "shopper")
      // {
      //   return view("auth.shopper_register");
      // }
      // else
      // {
      //   return view("auth.register");
      // }
    }
    
}
