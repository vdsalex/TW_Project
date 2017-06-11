<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use Illuminate\Pagination\LengthAwarePaginator;


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

    public function getMyMemories(LaravelFacebookSdk $fb,Request $request)
    {
        //get all photos
        $photosArray=array();
        try
        {
            //get albums
            $response=$fb->get('/'. session('provider_user_id') .'/albums', session('provider_access_token'));
            $albumEdge=$response->getGraphEdge();

            foreach($albumEdge as $albumNode)
            {
                //for each album id
                $response=$fb->get('/'. $albumNode['id'].'/photos',session('provider_access_token'));
                $photoEdge=$response->getGraphEdge();

                //get photos in album
                foreach ($photoEdge as $photoNode)
                {
                    //get photos links
                    $response=$fb->get('/'. $photoNode['id'].'?fields=images,name,place' ,session('provider_access_token'));
                    $concretePhoto=$response->getGraphNode();

                    //taking only the highest quality photo URL

                    $photoURL=$concretePhoto['images'][0]['source'];
                    $photoName='';

                    //check if name exists
                    if ($concretePhoto->getField('name'))
                        $photoName=$concretePhoto->getField('name');

                    $photoLocation='';
                    //check if location exists
                    if ($concretePhoto->getField('place'))
                       $photoLocation=$concretePhoto->getField('place')['name'];

                    array_push($photosArray, array('URL'=>$photoURL,'name'=>$photoName,'location'=>$photoLocation));

                   // Storage::put('testPhoto.jpg', fopen($photoURL, 'r'));
                }
            }


            $currentPage = LengthAwarePaginator::resolveCurrentPage();

            $col = new Collection($photosArray);

            $perPage=6;

            $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();

            $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

            if ($request->ajax()) {
                $view = view('includes/memories_facebook',compact('entries'))->render();
                return response()->json(['html'=>$view]);

            }

            $user=Auth::user();
            return view('pages/my_memories',compact('entries','user'));

            //get all videos - NOT WORKING??
            /*$response=$fb->get('/'. session('provider_user_id') .'/videos', session('provider_access_token'));
            $videosEdge=$response->getGraphEdge();

            dd($videosEdge);

*/
        }
        catch (\Facebook\Exceptions\FacebookSDKException $e)
        {
            dd($e->getMessage());
        }
        return view('pages/my_memories',['user'=> Auth::user()]);

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