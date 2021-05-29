<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Str;


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

    public function loginGoogle(){
      
      return Socialite::driver('google')->redirect();

  }

  public function loginCallback(){
      
      $user = Socialite::driver('google')->stateless()->user();
      //dd($user);
      $createUser = User::firstOrCreate([
          'email' => $user->getEmail()],[
              'name' => $user->getName(),
              'email_verified_at' => now(),
              'remember_token' => Str::random(10),
              'avatar' => $user->getAvatar(),
              'password' => Hash::make(uniqid(),[
                  'rounds' => 12,
              ]) 
          ]);

          Auth::login($createUser);

          return redirect($this->redirectTo);
      
  }
}
