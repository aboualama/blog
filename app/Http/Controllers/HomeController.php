<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Post;
use App\User; 
use Auth; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $num     =  1;
        $userid  = Auth::id();
        // $posts = Post::where('user_id' , $user);

        $user   = User::find($userid);
        $posts  = $user->posts;

        return view('home' , compact('posts' , 'user' , 'num'));
    }


    public function account()
    {

        $userid  = Auth::id();
        // $posts = Post::where('user_id' , $user);

        $user   = User::find($userid); 

        return view('/account' , compact('user'));
    }
 

    public function accountupdate(Request $request)
    {
        $user = Auth::user();
        
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->facebook = $request->facebook;
        $user->twitter  = $request->twitter;

        if ( ! $request->password == '')
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();
 
        return redirect ('/home')->with('succses' , 'Your account has been updated!');
    }
}
