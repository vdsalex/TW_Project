<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getHome()
    {
        return view('pages/home');
    }

    public function postSignUp(Request $request)
    {
        $username= $request['username'];
        $password= bcrypt($request['password']);
        $email= $request['e-mail'];
        $first_name= $request['firstName'];
        $last_name= $request['lastName'];
        $address=$request['address'];

        $newUser=User::create(['username'=>$username,'password'=>$password,'email'=>$email,'first_name'=>$first_name,'last_name'=>$last_name,'address'=>$address]);
        dd($newUser);

        Auth::login($newUser);

        return redirect()->route('home');
    }

    public function postSignIn(Request $request)
    {
        if (Auth::attempt(['username'=>$request['username'],'password'=>$request['password']]))
        {
            return redirect()->route('home');
        }
        else
            return redirect()->back();
    }
}