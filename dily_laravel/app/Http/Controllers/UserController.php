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

    public function getLogin()
    {
        return view('pages/login');
    }

    public function getMyMemories()
    {
        return view('pages/my_memories');
    }

    public function getUpload()
    {
        return view('pages/upload');
    }

    public function getProfile()
    {
        return view('pages/profile',['user'=> Auth::user()]);
    }
    public function getAdvancedSearch()
    {
        return view('pages/advanced_search');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:users',
            'firstName' => 'required|max:100',
            'lastName' =>'required|max:100',
            'password' => 'required|min:4',
            'username' => 'required|unique:users'
        ]);
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
        $this->validate($request,[
            'password' => 'required',
            'username' => 'required'
        ]);

        if (Auth::attempt(['username'=>$request['username'],'password'=>$request['password']]))
        {
            return redirect()->route('home');
        }
        else
            return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}