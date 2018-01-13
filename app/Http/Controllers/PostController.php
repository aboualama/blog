<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Subcategory; 
use App\User; 
use Auth; 
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $posts  = Post::orderBy('created_at', 'desc')->paginate(4);
        $user   = Post::with('user')->get(); 
        // $new    = Post::with('subcategories')->with('user')->get(); 
        return view('post.posts'  , compact('posts' , 'user' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 

        return view('post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {    


    $this->validate($request, [
        'title'     => 'required',
        'content'   => 'required',
        'img'       => 'required',
    ]);
 

       $post = new post; 

       $cat_name    = $request->cat; 

       $cat_id      = DB::table('subcategories')->where('name' , $cat_name)->value('id');
  
       $user_id     = Auth::user()->id;   //Auth::id() 

       $img_name = time() . '.' . $request->img->getClientOriginalExtension();
       $request->img->move(public_path('upload'), $img_name);

       $post->title           = $request->title;
       $post->content         = $request->content;
       $post->user_id         = $user_id;
       $post->img             = $img_name;
       $now                   = date('YmdHis');
       $post->slug            = str_replace(' ','-', strtolower($request->title)) .'-' . $now;
       $post->subcategory_id  = $cat_id;

       $post->save();

       return redirect ('/post')->with('succses' , 'The Post Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function show($slug)
    { 

        $post   = Post::where('slug' , $slug)->first();
        $userid = $post->user_id;
        $user   = user::where('id' , $userid )->first();
        return view('post.singlepost' , compact('post' , 'user'));
    }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {   
       if( Auth::id() == $post->user_id)  
        {
         return view('post.postedit' , compact('post'));
        } 
    }
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 

    public function update(post $post, Request $request)
    {
        $post->slug            = str_replace(' ','-', strtolower($request->title));
        $post->update($request->all()) ;

        return redirect('post/');
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(post $post)
    {

        $post->delete();

        return back()->with('succses' , 'The Post Deleted Successfully');
    }


    public function category($name)
    { 
        $cat_id = DB::table('subcategories')->where('name' , $name)->value('id');
        
        $posts = DB::table('posts')->orderBy('created_at', 'desc')->where('subcategory_id' , $cat_id)->get();
        
        return view('../categories'  , compact('posts' , 'name'));
    }
}
