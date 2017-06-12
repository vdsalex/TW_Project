<?php

namespace App\Http\Controllers\Auth;

use App\SocialProvider;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->user();
        }
        catch (\Exception $e)
        {
            //to show error massage in case of auth error
            return redirect()->route('home');
        }

        //check if user already logged in with social provider
        $socialUserId=$socialUser->getId();
        $socialProvider=SocialProvider::where('provider_id',$socialUserId)->first();

        if (!$socialProvider)
        {
            //create user
            $splitName=explode(' ', $socialUser->getName(),2);
            $user=User::firstOrCreate(
                ['email' => $socialUser->getEmail(),'first_name'=> $splitName[0],'last_name' => $splitName[1]]);
            $user -> socialProviders() ->create(
                ['provider_id' => $socialUser->getId(),'provider' => $provider]);
        }
        else $user=$socialProvider->user;

        //save token for access to user content from provider
        $accessToken=$socialUser->token;
        session(['provider_access_token' => $accessToken,'provider_user_id'=>$socialUserId]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
