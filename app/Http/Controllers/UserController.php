<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function getHome()
    {
        return view('pages/home',['user'=> Auth::user()]);
    }

    public function getLogin()
    {
        return view('pages/login',['user'=> Auth::user()]);
    }

    public function getMyMemories()
    {
        return view('pages/my_memories',['user'=> Auth::user()]);
    }

    public function getTeamProject()
    {
        return view('pages/team_project',['user'=> Auth::user()]);
    }

    public function getUpload()
    {
        return view('pages/upload',['user'=> Auth::user()]);
    }

    public function getProfileSettings()
    {
        return view('pages/profile_settings',['user'=> Auth::user()]);
    }

    public function getProfile()
    {
        return view('pages/profile',['user'=> Auth::user()]);
    }

    public function getAdvancedSearch()
    {
        return view('pages/advanced_search',['user'=> Auth::user()]);
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:100',
            'last_name' =>'required|max:100',
            'password' => 'required|min:4',
            'username' => 'required|unique:users'
        ]);
        $username= $request['username'];
        $password= bcrypt($request['password']);
        $email= $request['email'];
        $first_name= $request['first_name'];
        $last_name= $request['last_name'];
        $address=$request['address'];

        $newUser=User::create(['username'=>$username,'password'=>$password,'email'=>$email,'first_name'=>$first_name,'last_name'=>$last_name,'address'=>$address]);

        Auth::login($newUser);

        return redirect()->route('home');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request,[
            'password' => 'required',
            'username' => 'required'
        ]);

        $remember=$request->has('rememberMeCBox');

        if (Auth::attempt(['username'=>$request['username'],'password'=>$request['password']],$remember))
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

    public function postSaveAccount(Request $request)
    {
       /* $this->validate($request,[

        ]);
       */
       $user=Auth::user();
       $user->first_name=$request['first_name'];
       $user->update();
       $file=$request->file('image');

       /*to implement file extention validation */

       $filename=$user->username . '-'.$user->id.'\\'.'profile.jpg';
       if ($file)
       {
           Storage::disk('local')->put($filename, File::get($file));
       }
       return redirect()->route('profile');
    }

    public function getUserImage($filename)
    {
        $file=Storage::disk('local')->get($filename);
        return Response($file, 200);
    }

}