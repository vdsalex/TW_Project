<?php
namespace App\Http\Controllers;

use App\Letter;
use App\Photo;
use App\SocialProvider;
use App\User;
use App\Video;
use App\Document;
use App\Artefact;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;


class UserController extends Controller
{

    public function getHome()
    {
        if (Auth::user()->username)
        {
            return view('pages/home',['user'=> Auth::user()]);
        }
        else return $this->getMyMemories();
    }

    public function getLogin()
    {
        return view('pages/login',['user'=> Auth::user()]);
    }

    public function getMyMemories()
    {
        //if not logged in with facebook, delete facebook sidenav button
        $user=Auth::user();

        $socialModel=SocialProvider::where('user_id',$user->id)->first();

        if ($socialModel['provider']=='facebook')
            return view('pages/my_memories',['user'=>$user,'sidebutton'=>'true']);
        else return view('pages/my_memories',['user'=>$user,'sidebutton'=>'false']);
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

    public function getFriendsArrayForView()
    {
        $user=Auth::user();
        $acceptedFriends=$user->friends();
        $receivedFriends=$user->incoming_friends();

        $allFriends=$user->any_friends();
        $withoutAccepted=$allFriends->diff($acceptedFriends);
        $sentFriends=$withoutAccepted->diff($receivedFriends);

        return ['acceptedFriends'=>$acceptedFriends,'unconfirmedFriends'=>$sentFriends,'receivedFriends'=>$receivedFriends];
    }

    public function getProfile()
    {
        $userArray=array('user'=> Auth::user());
        $friendsArray=$this->getFriendsArrayForView();
        return view('pages/profile',array_merge($userArray,$friendsArray));
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

        $message = 'Username or password is wrong!';

        if (Auth::attempt(['username'=>$request['username'],'password'=>$request['password']],$remember))
        {
            return redirect()->route('home');
        }
        else
            return redirect()->back()->with(['message' => $message]);
    }

    public function getLogout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }

    public function postSaveAccount(Request $request)
    {
       if ($request['password']!=$request['password_conf'])
           return redirect()->route('profile_settings');

       $user=Auth::user();
        $message = "Profile updated successfully!";
       if ($request['email']!=$user->email)
           $this->validate($request,[ 'email' =>'email|unique:users']);
       if ($request['username']!=$user->username)
           $this->validate($request,[ 'username' =>'unique:users']);

       $this->validate($request,[
            'password' => 'nullable|min:4',
            'first_name' => 'min:1|max:100',
            'last_name' => 'min:1|max:100',
        ] );

       $oldUsername=$user->username;

       $user->first_name=$request['first_name'];
       $user->last_name=$request['last_name'];
       $user->username=$request['username'];
       $user->password=bcrypt($request['password']);
       $user->email=$request['email'];
       $user->gender=$request['gender'];
       $user->address=$request['address'];

       $user->update();

       if ($oldUsername!=$user->username)
           Storage::disk('local')->move($oldUsername . '-'.$user->id,$user->username. '-'.$user->id);
       $file=$request->file('image');

       $filename=$user->username . '-'.$user->id.'\\'.'profile.jpg';
       if ($file)
       {
           Storage::disk('local')->put($filename, File::get($file));
       }
       return redirect()->route('profile_settings')->with(['message' => $message]);
        //SEND successfull message
    }

    public function getUserImage($userId, $username)
    {
        if (Storage::disk('local')->has($username . '-'.$userId.'\\'.'profile.jpg'))
        {

            $file=Storage::disk('local')->get($username . '-'.$userId.'\\'.'profile.jpg');
            return Response($file, 200);
        }
        else
        {
            $file=Storage::disk('local')->get('default_profile_img.jpg');
            return Response($file, 200);
        }
    }

    public function getUserImageNoUsername($userId)
    {
        if (Storage::disk('local')->has('-'.$userId.'\\'.'profile.jpg'))
        {
            $file=Storage::disk('local')->get('-'.$userId.'\\'.'profile.jpg');
            return Response($file, 200);
        }
        else
        {
            $file=Storage::disk('local')->get('default_profile_img.jpg');
            return Response($file, 200);
        }
    }

    public function postUploadDocument(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
            'location'=> 'required|max:255',
            'emission_date' =>'required',
            'document' => 'required'
        ]);
        $message = "Uncaught Error!";
        if (!($request->file('document')->isValid()))
        {
            return redirect()->route('home');
        }

        $user=Auth::user();

        $newDocument=Document::create(['user_id'=>$user->id, 'name'=>$request['name'],'location'=>$request['location'],'emission_date'=>$request['emission_date']]);

        $filePath=$user->username . '-'.$user->id.'\\document\\'.$newDocument->id . '.doc';

        if(Storage::disk('local')->put($filePath, File::get($request['document'])))
            $message = "Upload successful!";
        return redirect()->route('upload')->with(['message' => $message]);
        //SEND successfull message

    }

    public function postUploadArtefact(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
            'description'=> 'required|max:255',
            'receive_date' =>'required',
            'artefact' => 'required'
        ]);
        $message = "Uncaught Error!";
        if (!($request->file('artefact')->isValid()))
        {
            return redirect()->route('home');
        }

        $user=Auth::user();

        $newArtefact=Artefact::create(['user_id'=>$user->id, 'name'=>$request['name'],'description'=>$request['description'],'receive_date'=>$request['receive_date']]);

        $filePath=$user->username . '-'.$user->id.'\\artefact\\'.$newArtefact->id . '.jpg';

        if(Storage::disk('local')->put($filePath, File::get($request['artefact'])))
            $message = "Upload successful!";
        return redirect()->route('upload')->with(['message' => $message]);
        //SEND successfull message

    }

    public function postUploadLetter(Request $request)
    {
        $this->validate($request,[
            'sender'=>'required',
            'receiver'=> 'required',
            'message' =>'required',
            'write_date' => 'required'
        ]);
        $message = "Uncaught Error!";
        if (!($request->file('letter')->isValid()))
        {
            return redirect()->route('home');
        }

        $user = Auth::user();

        $newLetter = Letter::create(['user_id'=>$user->id, 'sender'=>$request['sender'],'receiver'=>$request['receiver'], 'message' => $request['message'], 'write_date' => $request['write_date']]);

        $filePath=$user -> username . '-'.$user->id . '\\letter\\'.$newLetter->id . '.txt';
        if(Storage::disk('local')->put($filePath, File::get($request['letter'])))
            $message = "Upload successful!";

        return redirect()->route('upload')->with(['message' => $message]);
        //SEND successfull message

    }

    public function postUploadPhoto(Request $request)
    {
        $this->validate($request,[
            'description'=> 'required|max:255',
            'location'=>'required|max:100',
            'snap_date' =>'required',
            'photo' => 'required'
        ]);
        $message = "Uncaught Error!";
        if (!($request->file('photo')->isValid()))
        {
            return redirect()->route('home');
        }

        $user=Auth::user();

        $newPhoto=Photo::create(['user_id'=>$user->id, 'description'=>$request['description'], 'location'=>$request['location'],'snap_date'=>$request['snap_date']]);

        $filePath=$user->username . '-'.$user->id.'\\photo\\'.$newPhoto->id . '.png';
        if(Storage::disk('local')->put($filePath, File::get($request['photo'])))
            $message = "Upload successful!";

        return redirect()->route('upload')->with(['message' => $message]);
        //SEND successfull message

    }

    public function postUploadVideo(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=> 'required|max:255',
            'record_date' =>'required',
            'video' => 'required'
        ]);
        $message = "Uncaught Error!";
        if (!($request->file('video')->isValid()))
        {
            return redirect()->route('home');
        }

        $user=Auth::user();

        $newVideo=Video::create(['user_id'=>$user->id, 'title'=>$request['title'],'description'=>$request['description'],'record_date'=>$request['record_date']]);

        $filePath=$user->username . '-'.$user->id.'\\video\\'.$newVideo->id . '.mp4';
        if(Storage::disk('local')->put($filePath, File::get($request['video'])))
            $message = "Upload successful!";

        return redirect()->route('upload')->with(['message' => $message]);
        //SEND successfull message

    }

    public function getFacebookContent($currentPage)
    {
        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        $photosArray=array();
        try {
            //get albums
            $response = $fb->get('/' . session('provider_user_id') . '/albums', session('provider_access_token'));
            $albumEdge = $response->getGraphEdge();

            foreach ($albumEdge as $albumNode) {
                //for each album id
                $response = $fb->get('/' . $albumNode['id'] . '/photos', session('provider_access_token'));
                $photoEdge = $response->getGraphEdge();

                //get photos in album
                foreach ($photoEdge as $photoNode) {
                    //get photos links
                    $response = $fb->get('/' . $photoNode['id'] . '?fields=images,name,place', session('provider_access_token'));
                    $concretePhoto = $response->getGraphNode();

                    //taking only the highest quality photo URL

                    $photoURL = $concretePhoto['images'][0]['source'];
                    $photoName = '';

                    //check if name exists
                    if ($concretePhoto->getField('name'))
                        $photoName = $concretePhoto->getField('name');

                    $photoLocation = '';
                    //check if location exists
                    if ($concretePhoto->getField('place'))
                        $photoLocation = $concretePhoto->getField('place')['name'];

                    array_push($photosArray, array('URL' => $photoURL, 'name' => $photoName, 'location' => $photoLocation));

                }
            }

            $col = new Collection($photosArray);

            $perPage = 6;

            $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();

            $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

            $view = view('includes/memories_facebook', compact('entries'))->render();
            return response()->json(['html' => $view]);

        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    public function getAllContent($currentPage)
    {
        $contentCollection=new Collection();

        $photos=Photo::where('user_id','=',Auth::user()->id)->get();
        foreach ($photos as $photo)
            $contentCollection->push($photo);

        $videos=Video::where('user_id','=',Auth::user()->id)->get();

        foreach ($videos as $video)
            $contentCollection->push($video);

        $letters=Letter::where('user_id','=',Auth::user()->id) ->get();

        foreach ($letters as $letter)
            $contentCollection->push($letter);

        $documents=Document::where('user_id','=',Auth::user()->id)->get();

        foreach ($documents as $document)
            $contentCollection->push($document);

        $artefacts=Artefact::where('user_id','=',Auth::user()->id)->get();

        foreach ($artefacts as $artefact)
            $contentCollection->push($artefact);

        $sortedMemories=$contentCollection->sortByDesc(function($memory, $key)
        {
            return $memory['updated_at'];
        });

        $perPage = 6;

        $currentPageSearchResults = $sortedMemories->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $entries = new LengthAwarePaginator($currentPageSearchResults, count($sortedMemories), $perPage);

        $view = view('layouts/memories_content', compact('entries'))->render();
        return response()->json(['html' => $view]);

    }

    public function getPhotoContent($currentPage)
    {
        $entries=Photo::where('user_id','=',Auth::user()->id)->orderBy('updated_at','desc')->paginate(5);

        $view = view('includes/memories_photo', compact('entries'))->render();
        return response()->json(['html' => $view]);
    }

    public function getVideoContent($currentPage)
    {
        $entries=Video::where('user_id','=',Auth::user()->id)->orderBy('updated_at','desc')->paginate(5);

        $view = view('includes/memories_video', compact('entries'))->render();
        return response()->json(['html' => $view]);
    }

    public function getDocumentContent($currentPage)
    {
        $entries=Document::where('user_id','=',Auth::user()->id)->orderBy('updated_at','desc')->paginate(5);

        $view = view('includes/memories_document', compact('entries'))->render();
        return response()->json(['html' => $view]);
    }

    public function getArtefactContent($currentPage)
    {
        $entries=Artefact::where('user_id','=',Auth::user()->id)->orderBy('updated_at','desc')->paginate(5);

        $view = view('includes/memories_artefact', compact('entries'))->render();
        return response()->json(['html' => $view]);
    }

    public function getLetterContent($currentPage)
    {
        $entries=Letter::where('user_id','=',Auth::user()->id)->orderBy('updated_at','desc')->paginate(5);

        $view = view('includes/memories_letter', compact('entries'))->render();
        return response()->json(['html' => $view]);
    }

    public function getContent($content_type)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        if ($content_type=='all')
        {
            return $this->getAllContent($currentPage);
        }
        if ($content_type=='photo')
        {
            return $this->getPhotoContent($currentPage);
        }
        if ($content_type=='video')
        {
            return $this->getVideoContent($currentPage);
        }
        if ($content_type=='letter')
        {
            return $this->getLetterContent($currentPage);
        }
        if ($content_type=='document')
        {
            return $this->getDocumentContent($currentPage);
        }
        if ($content_type=='artefact')
        {
            return $this->getArtefactContent($currentPage);
        }
        if ($content_type=='facebook')
        {
            return $this->getFacebookContent($currentPage);
        }
    }

    //
    //  GET USER FILES ON STORAGE
    //

    public function getUserPhoto($photo_id)
    {
        $photo=Photo::where('id','=',$photo_id)->get()->first();
        $user=User::where('id','=',$photo->user_id)->get()->first();

        $filename=$user->username . '-'.$user->id.'\\photo\\'.$photo_id. '.png';
        $file=Storage::disk('local')->get($filename);
        return Response($file, 200);
    }

    public function getUserVideo($video_id)
    {
        $video=Video::where('id','=',$video_id)->get()->first();
        $user=User::where('id','=',$video->user_id)->get()->first();

        $filename=$user->username . '-'.$user->id.'\\video\\'.$video_id. '.mp4';
        $file=Storage::disk('local')->get($filename);
        return Response($file, 200);
    }

    public function getUserDocument($document_id)
    {
        $document=Document::where('id','=',$document_id)->get()->first();
        $user=User::where('id','=',$document->user_id)->get()->first();

        $filename=$user->username . '-'.$user->id.'\\document\\'.$document_id. '.doc';
        $file=Storage::disk('local')->get($filename);
        return Response($file, 200);
    }

    public function getUserLetter($letter_id)
    {
        $letter=Letter::where('id','=',$letter_id)->get()->first();
        $user=User::where('id','=',$letter->user_id)->get()->first();

        $filename=$user->username . '-'.$user->id.'\\letter\\'.$letter_id. '.txt';
        $file=Storage::disk('local')->get($filename);
        return Response($file, 200);
    }
    
    public function getUserArtefact($artefact_id)
    {
        $artefact=Artefact::where('id','=',$artefact_id)->get()->first();
        $user=User::where('id','=',$artefact->user_id)->get()->first();

        $filename=$user->username . '-'.$user->id.'\\artefact\\'.$artefact_id. '.jpg';
        $file=Storage::disk('local')->get($filename);
        return Response($file, 200);
    }

    //
    // END GET USER FILES ON STORAGE
    //

    public function postImportPhoto(Request $request)
    {
        $img_data = file_get_contents($request['URL']);
        if (!$img_data)
        {
            return redirect()->route('home');
            //SEND ERROR MESSAGE
        }

        $current_time = Carbon::now()->toDayDateTimeString();
        $user=Auth::user();

        $newPhoto=Photo::create(['user_id'=>$user->id, 'description'=>$request['name'], 'location'=>$request['location'],'snap_date'=>$current_time]);

        $filePath=$user->username . '-'.$user->id.'\\photo\\'.$newPhoto->id . '.png';

        Storage::disk('local')->put($filePath, $img_data);

        return redirect()->route('memories');
        //SEND successfull message
    }

    /*
     * DELETE CONTENT API
     */

    public function postDeleteUserPhoto(Request $request)
    {
        Photo::destroy($request['id']);
        $message = "Deletion failed!";
        $user=Auth::user();
        $filePath=$user->username . '-'.$user->id.'\\photo\\'.$request['id'] . '.png';
        if(Storage::disk('local')->delete($filePath))
            $message = "Memory successfully deleted!";

        return redirect()->route('memories')->with(['message' => $message]);

        //have to return alert or smthing that the photo has been deleted
    }

    public function postDeleteUserVideo(Request $request)
    {
        Video::destroy($request['id']);
        $message = "Deletion failed!";
        $user=Auth::user();
        $filePath=$user->username . '-'.$user->id.'\\video\\'.$request['id'] . '.mp4';
        if(Storage::disk('local')->delete($filePath))
            $message = "Memory successfully deleted!";

        return redirect()->route('memories')->with(['message' => $message]);

        //have to return alert or smthing that the photo has been deleted
    }

    public function postDeleteUserDocument(Request $request)
    {
        Document::destroy($request['id']);
        $message = "Deletion failed!";
        $user=Auth::user();
        $filePath=$user->username . '-'.$user->id.'\\document\\'.$request['id'] . '.doc';
        if(Storage::disk('local')->delete($filePath))
            $message = "Memory successfully deleted!";

        return redirect()->route('memories')->with(['message' => $message]);

        //have to return alert or smthing that the photo has been deleted
    }

    public function postDeleteUserLetter(Request $request)
    {
        Letter::destroy($request['id']);
        $message = "Deletion failed!";
        $user=Auth::user();
        $filePath=$user->username . '-'.$user->id.'\\letter\\'.$request['id'] . '.txt';
        if(Storage::disk('local')->delete($filePath))
            $message = "Memory successfully deleted!";

        return redirect()->route('memories')->with(['message' => $message]);

        //have to return alert or smthing that the photo has been deleted
    }

    public function postDeleteUserArtefact(Request $request)
    {
        Artefact::destroy($request['id']);
        $message = "Deletion failed!";
        $user=Auth::user();
        $filePath=$user->username . '-'.$user->id.'\\artefact\\'.$request['id'] . '.jpg';
        if(Storage::disk('local')->delete($filePath))
            $message = "Memory successfully deleted!";

        return redirect()->route('memories')->with(['message' => $message]);

        //have to return alert or smthing that the photo has been deleted
    }
    /*
     * END OF DELETE API
     */

    /*
     * FRIENDSHIP API
     */

    public function postSendFriendRequest(Request $request)
    {
        $sendingUser=Auth::user();

        if (!$sendingUser->username)
        {
            $message='You must setup a username in order to make friends.';
            return redirect()->route('profile')->with(['message' => $message]);
        }

        $receivingUser=User::where('username','=',$request['username'])->first();

        if (!$receivingUser)
        {
           $message='Username does not exist!';
            return redirect()->route('profile')->with(['message' => $message]);
        }

        if($sendingUser->sendFriendRequestTo($receivingUser))
            $message = 'Request sent!';
        else $message='Request error!';

        return redirect()->route('profile')->with(['message' => $message]);

    }

    public function postAcceptFriendRequest(Request $request)
    {
        $sendingUser=User::where('username','=',$request['username'])->first();
        $message = 'Something went wrong...';
        $receivingUser=Auth::user();
        if($receivingUser->acceptFriendRequestFrom($sendingUser))
            $message = 'Request accepted!';

        return redirect()->route('profile')->with(['message' => $message]);
    }

    public function postDenyFriendRequest(Request $request)
    {
        $sendingUser=User::where('username','=',$request['username'])->first();
        $message = 'Something went wrong...';
        $receivingUser=Auth::user();
        if($receivingUser->denyFriendRequestFrom($sendingUser))
            $message = 'Request denied!';

        return redirect()->route('profile')->with(['message' => $message]);

    }

    public function postRemoveFriend(Request $request)
    {
        $selectedUser=User::where('username','=',$request['username'])->first();
        $message = 'Something went wrong...';
        $loggedUser=Auth::user();
        if($loggedUser->deleteFriend($selectedUser))
            $message = 'Unfriended!';

        return redirect()->route('profile')->with(['message' => $message]);

    }

    /*
     * END OF FRIENDSHIP API
     */

    public function getAllHomeContent()
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $contentCollection=new Collection();

        //get user friends id's
        $friends=Auth::user()->friends();
        $friendsIds=array();
        foreach ($friends as $friend)
            array_push($friendsIds,$friend['id']);

        $photos=Photo::whereIn('user_id',$friendsIds)->get();

        //get first_name, last_name and username for each memory
        foreach ($photos as $photo)
        {
            $photoUser=User:: where('id',$photo['user_id'])->first();
            $userInfo=collect(['username'=>$photoUser->username, 'first_name'=>$photoUser->first_name,'last_name'=>$photoUser->last_name,'memory_type'=>'photo']);
            $photoWithUser=$userInfo->merge($photo);

            $contentCollection->push($photoWithUser);
        }

        $videos=Video::whereIn('user_id',$friendsIds)->get();

        foreach ($videos as $video)
        {
            $videoUser=User:: where('id',$video['user_id'])->first();
            $userInfo=collect(['username'=>$videoUser->username, 'first_name'=>$videoUser->first_name,'last_name'=>$videoUser->last_name,'memory_type'=>'video']);
            $videoWithUser=$userInfo->merge($video);

            $contentCollection->push($videoWithUser);
        }

        $letters=Letter::whereIn('user_id',$friendsIds) ->get();

        foreach ($letters as $letter)
        {
            $letterUser=User:: where('id',$letter['user_id'])->first();
            $userInfo=collect(['username'=>$letterUser->username, 'first_name'=>$letterUser->first_name,'last_name'=>$letterUser->last_name,'memory_type'=>'letter']);
            $letterWithUser=$userInfo->merge($letter);

            $contentCollection->push($letterWithUser);
        }

        $documents=Document::whereIn('user_id',$friendsIds)->get();

        foreach ($documents as $document)
        {
            $documentUser=User:: where('id',$document['user_id'])->first();
            $userInfo=collect(['username'=>$documentUser->username, 'first_name'=>$documentUser->first_name,'last_name'=>$documentUser->last_name,'memory_type'=>'document']);
            $documentWithUser=$userInfo->merge($document);

            $contentCollection->push($documentWithUser);
        }

        $artefacts=Artefact::whereIn('user_id',$friendsIds)->get();

        foreach ($artefacts as $artefact)
        {
            $artefactUser=User:: where('id',$artefact['user_id'])->first();
            $userInfo=collect(['username'=>$artefactUser->username, 'first_name'=>$artefactUser->first_name,'last_name'=>$artefactUser->last_name,'memory_type'=>'artefact']);
            $artefactWithUser=$userInfo->merge($artefact);

            $contentCollection->push($artefactWithUser);
        }

        $sortedMemories=$contentCollection->sortByDesc(function($memory, $key)
        {
            return $memory['updated_at'];
        });

        $perPage = 6;

        $currentPageSearchResults = $sortedMemories->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $entries = new LengthAwarePaginator($currentPageSearchResults, count($sortedMemories), $perPage);

        $view = view('layouts/home_content', compact('entries'))->render();
        return response()->json(['html' => $view]);

    }

    /*
     *  SEARCH API
     */

    public function getSimpleSearchResults()
    {
        return view('pages/search_results',['user'=> Auth::user(),'text'=>Input::get('text')]);
    }
    public function getSearchContent($search_text)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $contentCollection=new Collection();

        //get user friends id's
        $friends=Auth::user()->friends();
        $friendsIds=array();
        foreach ($friends as $friend)
            array_push($friendsIds,$friend['id']);

        // also include user's id
        array_push($friendsIds,Auth::user()->id);

        $photos=Photo::whereIn('user_id',$friendsIds)->where('description','LIKE','%'.$search_text.'%') ->orWhere('location','LIKE','%'.$search_text.'%')->get();

        //get first_name, last_name and username for each memory
        foreach ($photos as $photo)
        {
            $photoUser=User:: where('id',$photo['user_id'])->first();
            $userInfo=collect(['username'=>$photoUser->username, 'first_name'=>$photoUser->first_name,'last_name'=>$photoUser->last_name,'memory_type'=>'photo']);
            $photoWithUser=$userInfo->merge($photo);

            $contentCollection->push($photoWithUser);
        }

        $videos=Video::whereIn('user_id',$friendsIds)->where('description','LIKE','%'.$search_text.'%') ->orWhere('title','LIKE','%'.$search_text.'%')->get();

        foreach ($videos as $video)
        {
            $videoUser=User:: where('id',$video['user_id'])->first();
            $userInfo=collect(['username'=>$videoUser->username, 'first_name'=>$videoUser->first_name,'last_name'=>$videoUser->last_name,'memory_type'=>'video']);
            $videoWithUser=$userInfo->merge($video);

            $contentCollection->push($videoWithUser);
        }

        $letters=Letter::whereIn('user_id',$friendsIds)->where('sender','LIKE','%'.$search_text.'%') ->orWhere('receiver','LIKE','%'.$search_text.'%')
                ->orWhere('message','LIKE','%'.$search_text.'%')->get();

        foreach ($letters as $letter)
        {
            $letterUser=User:: where('id',$letter['user_id'])->first();
            $userInfo=collect(['username'=>$letterUser->username, 'first_name'=>$letterUser->first_name,'last_name'=>$letterUser->last_name,'memory_type'=>'letter']);
            $letterWithUser=$userInfo->merge($letter);

            $contentCollection->push($letterWithUser);
        }

        $documents=Document::whereIn('user_id',$friendsIds)->where('name','LIKE','%'.$search_text.'%') ->orWhere('location','LIKE','%'.$search_text.'%')->get();

        foreach ($documents as $document)
        {
            $documentUser=User:: where('id',$document['user_id'])->first();
            $userInfo=collect(['username'=>$documentUser->username, 'first_name'=>$documentUser->first_name,'last_name'=>$documentUser->last_name,'memory_type'=>'document']);
            $documentWithUser=$userInfo->merge($document);

            $contentCollection->push($documentWithUser);
        }

        $artefacts=Artefact::whereIn('user_id',$friendsIds)->where('description','LIKE','%'.$search_text.'%') ->orWhere('name','LIKE','%'.$search_text.'%')->get();

        foreach ($artefacts as $artefact)
        {
            $artefactUser=User:: where('id',$artefact['user_id'])->first();
            $userInfo=collect(['username'=>$artefactUser->username, 'first_name'=>$artefactUser->first_name,'last_name'=>$artefactUser->last_name,'memory_type'=>'artefact']);
            $artefactWithUser=$userInfo->merge($artefact);

            $contentCollection->push($artefactWithUser);
        }

        $sortedMemories=$contentCollection->sortByDesc(function($memory, $key)
        {
            return $memory['updated_at'];
        });

        $perPage = 6;

        $currentPageSearchResults = $sortedMemories->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $entries = new LengthAwarePaginator($currentPageSearchResults, count($sortedMemories), $perPage);

        $view = view('layouts/home_content', compact('entries'))->render();
        return response()->json(['html' => $view]);
    }

    public function postAdvancedSearch(Request $request)
    {
        if ($request['memory_type_radio']=='Photo')
        {
            $friends=Auth::user()->friends();
            $friendsIds=array();

            if ($request['friend_username'])
            {
                //check if is friend
                $isFriend=false;
                foreach ($friends as $friend)
                {
                    if ($friend['username'] == $request['friend_username'])
                    {
                        $inputFriend=$friend;
                        $isFriend = true;
                    }
                }
                if ($isFriend==false)
                {
                    return redirect()->route('home');
                }
                else array_push($friendsIds,$inputFriend['id']);
                //username is friend

            }
            else //get all id's (friends + user)
            {
                foreach ($friends as $friend)
                    array_push($friendsIds,$friend['id']);

                // also include user's id
                array_push($friendsIds,Auth::user()->id);
            }

            $photos=Photo::whereIn('user_id',$friendsIds);

            //take location if set
            if ($request['photosLocation'])
            {
                $photos=$photos->where('location','LIKE', '%'. $request['photosLocation'] .'%');
            }

            if ($request['photosDescription'])
            {
                $photos=$photos->where('description','LIKE', '%'. $request['photosDescription'] .'%');
            }

            if ($request['photosCreationDate'])
            {
                $photos=$photos->whereDate('snap_date','=',$request['photosCreationDate']);
            }

            if ($request['between_one'])
            {
                $photos=$photos->whereDate('snap_date','>=',$request['between_one']);
            }

            if ($request['between_two'])
            {
                $photos=$photos->whereDate('snap_date','<=',$request['between_two']);
            }

            $photos=$photos->get();

            $entries=new Collection();
            //get first_name, last_name and username for each memory
            foreach ($photos as $photo)
            {
                $photoUser=User:: where('id',$photo['user_id'])->first();
                $userInfo=collect(['username'=>$photoUser->username, 'first_name'=>$photoUser->first_name,'last_name'=>$photoUser->last_name,'memory_type'=>'photo']);
                $photoWithUser=$userInfo->merge($photo);

                $entries->push($photoWithUser);
            }

            $user=Auth::user();
            return view('pages/advanced_search_results',compact('entries','user'));

        }

        if ($request['memory_type_radio']=='Video')
        {
            $friends=Auth::user()->friends();
            $friendsIds=array();

            if ($request['friend_username'])
            {
                //check if is friend
                $isFriend=false;
                foreach ($friends as $friend)
                {
                    if ($friend['username'] == $request['friend_username'])
                    {
                        $inputFriend=$friend;
                        $isFriend = true;
                    }
                }
                if ($isFriend==false)
                {
                    return redirect()->route('home');
                }
                else array_push($friendsIds,$inputFriend['id']);
                //username is friend

            }
            else //get all id's (friends + user)
            {
                foreach ($friends as $friend)
                    array_push($friendsIds,$friend['id']);

                // also include user's id
                array_push($friendsIds,Auth::user()->id);
            }

            $videos=Video::whereIn('user_id',$friendsIds);

            //take location if set
            if ($request['videosTitle'])
            {
                $videos=$videos->where('title','LIKE', '%'. $request['videosTitle'] .'%');
            }

            if ($request['videosDescription'])
            {
                $videos=$videos->where('description','LIKE', '%'. $request['videosDescription'] .'%');
            }

            if ($request['videosRecordDate'])
            {
                $videos=$videos->whereDate('record_date','=',$request['videosRecordDate']);
            }

            if ($request['between_one'])
            {
                $videos=$videos->whereDate('record_date','>=',$request['between_one']);
            }

            if ($request['between_two'])
            {
                $videos=$videos->whereDate('record_date','<=',$request['between_two']);
            }

            $videos=$videos->get();

            $entries=new Collection();
            //get first_name, last_name and username for each memory
            foreach ($videos as $video)
            {
                $videoUser=User:: where('id',$video['user_id'])->first();
                $userInfo=collect(['username'=>$videoUser->username, 'first_name'=>$videoUser->first_name,'last_name'=>$videoUser->last_name,'memory_type'=>'video']);
                $videoWithUser=$userInfo->merge($video);

                $entries->push($videoWithUser);
            }

            $user=Auth::user();

            return view('pages/advanced_search_results',compact('entries','user'));
        }

        if ($request['memory_type_radio']=='Document')
        {
            $friends=Auth::user()->friends();
            $friendsIds=array();

            if ($request['friend_username'])
            {
                //check if is friend
                $isFriend=false;
                foreach ($friends as $friend)
                {
                    if ($friend['username'] == $request['friend_username'])
                    {
                        $inputFriend=$friend;
                        $isFriend = true;
                    }
                }
                if ($isFriend==false)
                {
                    return redirect()->route('home');
                }
                else array_push($friendsIds,$inputFriend['id']);
                //username is friend

            }
            else //get all id's (friends + user)
            {
                foreach ($friends as $friend)
                    array_push($friendsIds,$friend['id']);

                // also include user's id
                array_push($friendsIds,Auth::user()->id);
            }

            $documents=Document::whereIn('user_id',$friendsIds);

            //take location if set
            if ($request['documentsEmissionLocation'])
            {
                $documents=$documents->where('location','LIKE', '%'. $request['documentsEmissionLocation'] .'%');
            }

            if ($request['documentsName'])
            {
                $documents=$documents->where('name','LIKE', '%'. $request['documentsName'] .'%');
            }

            if ($request['documentsEmissionDate'])
            {
                $documents=$documents->whereDate('emission_date','=',$request['documentsEmissionDate']);
            }

            if ($request['between_one'])
            {
                $documents=$documents->whereDate('emission_date','>=',$request['between_one']);
            }

            if ($request['between_two'])
            {
                $documents=$documents->whereDate('emission_date','<=',$request['between_two']);
            }

            $documents=$documents->get();

            $entries=new Collection();
            //get first_name, last_name and username for each memory
            foreach ($documents as $document)
            {
                $documentUser=User:: where('id',$document['user_id'])->first();
                $userInfo=collect(['username'=> $documentUser->username, 'first_name'=> $documentUser->first_name,'last_name'=> $documentUser->last_name,'memory_type'=>'document']);
                $documentWithUser=$userInfo->merge($document);

                $entries->push( $documentWithUser);
            }

            $user=Auth::user();
            return view('pages/advanced_search_results',compact('entries','user'));

        }

        if ($request['memory_type_radio']=='Letter')
        {
            $friends=Auth::user()->friends();
            $friendsIds=array();

            if ($request['friend_username'])
            {
                //check if is friend
                $isFriend=false;
                foreach ($friends as $friend)
                {
                    if ($friend['username'] == $request['friend_username'])
                    {
                        $inputFriend=$friend;
                        $isFriend = true;
                    }
                }
                if ($isFriend==false)
                {
                    return redirect()->route('home');
                }
                else array_push($friendsIds,$inputFriend['id']);
                //username is friend

            }
            else //get all id's (friends + user)
            {
                foreach ($friends as $friend)
                    array_push($friendsIds,$friend['id']);

                // also include user's id
                array_push($friendsIds,Auth::user()->id);
            }

            $letters=Letter::whereIn('user_id',$friendsIds);

            //take location if set
            if ($request['lettersSender'])
            {
                $letters=$letters->where('sender','LIKE', '%'. $request['lettersSender'] .'%');
            }

            if ($request['lettersReceiver'])
            {
                $letters=$letters->where('receiver','LIKE', '%'. $request['lettersReceiver'] .'%');
            }

            if ($request['lettersMessage'])
            {
                $letters=$letters->where('message','LIKE', '%' . $request['lettersMessage'] . '%');
            }

            if ($request['lettersWritingDate'])
            {
                $letters=$letters->whereDate('write_date','=',$request['lettersWritingDate']);
            }

            if ($request['between_one'])
            {
                $letters=$letters->whereDate('write_date','>=',$request['between_one']);
            }

            if ($request['between_two'])
            {
                $letters=$letters->whereDate('write_date','<=',$request['between_two']);
            }

            $letters=$letters->get();

            $entries=new Collection();
            //get first_name, last_name and username for each memory
            foreach ($letters as $letter)
            {
                $letterUser=User:: where('id',$letter['user_id'])->first();
                $userInfo=collect(['username'=> $letterUser->username, 'first_name'=>$letterUser->first_name,'last_name'=>$letterUser->last_name,'memory_type'=>'letter']);
                $letterWithUser=$userInfo->merge($letter);

                $entries->push( $letterWithUser);
            }

            $user=Auth::user();
            return view('pages/advanced_search_results',compact('entries','user'));

        }

        if ($request['memory_type_radio']=='Artefact')
        {
            $friends=Auth::user()->friends();
            $friendsIds=array();

            if ($request['friend_username'])
            {
                //check if is friend
                $isFriend=false;
                foreach ($friends as $friend)
                {
                    if ($friend['username'] == $request['friend_username'])
                    {
                        $inputFriend=$friend;
                        $isFriend = true;
                    }
                }
                if ($isFriend==false)
                {
                    return redirect()->route('home');
                }
                else array_push($friendsIds,$inputFriend['id']);
                //username is friend

            }
            else //get all id's (friends + user)
            {
                foreach ($friends as $friend)
                    array_push($friendsIds,$friend['id']);

                // also include user's id
                array_push($friendsIds,Auth::user()->id);
            }

            $artefacts=Artefact::whereIn('user_id',$friendsIds);

            //take location if set
            if ($request['artifactsName'])
            {
                $artefacts=$artefacts->where('name','LIKE', '%'. $request['artifactsName'] .'%');
            }

            if ($request['artifactsDescription'])
            {
                $artefacts=$artefacts->where('description','LIKE', '%'. $request['artifactsDescription'] .'%');
            }

            if ($request['artifactsRecDate'])
            {
                $artefacts=$artefacts->whereDate('receive_date','=',$request['artifactsRecDate']);
            }

            if ($request['between_one'])
            {
                $artefacts=$artefacts->whereDate('write_date','>=',$request['between_one']);
            }

            if ($request['between_two'])
            {
                $artefacts=$artefacts->whereDate('write_date','<=',$request['between_two']);
            }

            $artefacts=$artefacts->get();

            $entries=new Collection();
            //get first_name, last_name and username for each memory
            foreach ($artefacts as $artefact)
            {
                $artefactUser=User:: where('id',$artefact['user_id'])->first();
                $userInfo=collect(['username'=>  $artefactUser->username, 'first_name'=> $artefactUser->first_name,'last_name'=> $artefactUser->last_name,'memory_type'=>'artefact']);
                $artefactWithUser=$userInfo->merge($artefact);

                $entries->push(  $artefactWithUser);
            }

            $user=Auth::user();
            return view('pages/advanced_search_results',compact('entries','user'));

        }
    }

    /*
     *  END OF SEARCH API
     */

}