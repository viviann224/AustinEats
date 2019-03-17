<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth', ['except'=>["index", "show", "coffee", "event", "resturant"]]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //call a specific title
      //return Post::where("title", "Post Two")->get();
      //mysql
      //$posts= DB::select("SELECT * FROM posts");
        //elequient styling
        //take a specific item
        //$posts= Post::orderBy("title", "dsc")->take(1)->get();
        //$posts= Post::orderBy("title", "asc")->get();
        //pagination 3 per page
        $posts= Post::orderBy("created_at", "asc")->paginate(3);

        return view("posts.index")->with("posts",$posts);
    }

    public function coffee()
    {
        $posts= Post::where("topic", "Local Coffee Shop")->paginate(3);

        return view("posts.index")->with("posts",$posts);
    }

    public function event()
    {
        $posts= Post::where("topic", "Local Event")->paginate(3);

        return view("posts.index")->with("posts",$posts);
    }

    public function resturant()
    {
        $posts= Post::where("topic", "Local Restaurant")->paginate(3);

        return view("posts.index")->with("posts",$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
          'title'=>'required',
          'body'=> 'required',
          'topic'=> 'required',
          'cover_image' => 'image|nullable|max:1999'
        ]);
        //test to make sure validations work (success)


        //handle file upload
        if($request->hasFile("cover_image"))
        {
          //get file name with ext
          $fileNameWithExt = $request->file("cover_image")->getClientOriginalName();
          //get just $fileName
          $filename=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          //get just ext
          $extension= $request->file("cover_image")->getClientOriginalExtension();
          //filename to Store
          $fileNameToStore =$filename.'_'.time().'.'.$extension;
          //upload image
          $path= $request->file("cover_image")->storeAs("public/cover_images",$fileNameToStore);
          //$path = Storage::disk('public')->put('uploads/', $fileNameToStore);

        }else {
          //no img default an image
          $fileNameToStore="noimage.jpg";
        }

        //create post
        $post = new Post;
        $post->title = $request->input("title");
        //removing sizing on img to responsive img
        $output = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $request->input("body"));
        $post->body=$output;
        // $post->body = $request->input("body");
        $post->topic = $request->get("topic");
        $post->user_id = auth()->user()->id;
        $post->cover_image= $fileNameToStore;
        $post->save();

        return redirect("/posts")->with("success", "Post Created");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post=Post::find($id);
        // $output = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $post->body);
        // //echo $output;
        // $post->body=$output;
        //echo strip_tags($post->body, "img");
        return view("posts.show")->with("post", $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::find($id);
        //check for correct user-
        if(auth()->user()->id !== $post->user_id)
        {
          return redirect("/posts")->with("error", "Unauthorized page!");
        }
        return view("posts.edit")->with("post", $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $this->validate($request, [
          'title'=>'required',
          'body'=> 'required',
          'topic'=> 'required',
          'cover_image' => 'image|nullable|max:1999'
        ]);


        //handle file upload
        if($request->hasFile("cover_image"))
        {
          //get file name with ext
          $fileNameWithExt = $request->file("cover_image")->getClientOriginalName();
          //get just $fileName
          $filename=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          //get just ext
          $extension= $request->file("cover_image")->getClientOriginalExtension();
          //filename to Store
          $fileNameToStore =$filename.'_'.time().'.'.$extension;
          //upload image
          $path= $request->file("cover_image")->storeAs("public/cover_images",$fileNameToStore);

        }

        //test to make sure validations work (success)
        //return 123;

        //find and update post
        $post = Post::find($id);
        $post->title = $request->input("title");
        //removing sizing on img to responsive img
        $output = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $request->input("body"));
        $post->body=$output;
        //$post->body = $request->input("body");
        $post->topic = $request->get("topic");
        if($request->hasFile('cover_image'))
        { $post->cover_image=$fileNameToStore;}
        $post->save();

        return redirect("/posts")->with("success", "Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post =Post::find($id);
        //check for correct user-
        if(auth()->user()->id !== $post->user_id)
        {
          return redirect("/posts")->with("error", "Unauthorized page!");
        }

        if($post->cover_image !="noimage.jpg")
        {
          //delete image
          Storage::delete("public/cover_images/".$post->cover_image);
        }
        $post->delete();
        return redirect("/posts")->with("success", "Post Removed");
    }
}
