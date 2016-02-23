<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;

use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function handleLogin(Request $request) {
      $errors = [];

      if (empty($request->email)) {
        $errors[] = 'Email cannot be blank';
      }

      if (empty($request->password)) {
        $errors[] = 'Password cannot be blank';
      }

      // If there are errors, return them for angular to handle
      if (!empty($errors)) {
        return response()->json([
          'status' => 'error',
          'message' => 'Form errors',
          'errors' => $errors
        ]);
      }

      // Otherwise we are good to go to log in the user
      if (Auth::attempt($request->all())) {
        return response()->json([
          'status' => 'success',
          'message' => 'User logged in'
        ]);
      }
    }

    public function handleRegister(Request $request) {
      $errors = [];

      if (empty($request->email)) {
        $errors[] = 'Email cannot be blank';
      }

      if (User::whereEmail($request->email)->exists()) {
        $errors[] = 'Email is already in use';
      }

      if (empty($request->password)) {
        $errors[] = 'Password cannot be blank';
      }

      if (empty($request->password_confirmation)) {
        $errors[] = 'You must confirm your password';
      }

      if ($request->password != $request->password_confirmation) {
        $errors[] = 'Passwords do not match';
      }

      // If there are errors, return them for angular to handle
      if (!empty($errors)) {
        return response()->json([
          'status' => 'error',
          'message' => 'Form errors',
          'errors' => $errors
        ]);
      }

      $user = User::create([
        'email' => $request->email,
        'password' => bcrypt($request->password)
      ]);

      Auth::login($user);

      return response()->json([
        'status' => 'success',
        'message' => 'User registered'
      ]);
    }
}
