<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allContent = Post::all();

        return view('auth\posts\index')->with("allContent",$allContent);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = Category::all(); //za prikaz categorija u dropdown menu
        $Tags = Tag::all();

        if($Category->count()==0 || $Tags->count()==0){
            Session::flash("info","You need to make a category and a tag first");
            return redirect()->back();
        }

        return view('auth\posts\content')->with("CategoryTypes",$Category)->with("tags",$Tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'thumbnail'=>'required|image',
            'category_id'=>'required',
            'tags'=>'required',
        ]);

        $thumbnail = $request->thumbnail;
        $thumbnailName = time().$thumbnail->getClientOriginalName();
        $thumbnail->move("public\images\posts",$thumbnailName);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'thumbnail' => "public/images/posts/".$thumbnailName,
            'slug' => str_slug($request->title),
        ]);

        $post->tags()->attach($request->tags);

        $post->save();

        Session::flash("success","Post saved succsessfully");

        return redirect()->route("Content.index");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RequestedPost = Post::find($id);
        $Category = Category::all();
        $Tags = Tag::all();

        $data = ["RequestedPost" => $RequestedPost, "CategoryTypes" => $Category,"tags"=>$Tags];

        return view('auth\posts\edit')->with($data);
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

        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'category'=>'required',
        ]);

        $RequestedPost = Post::find($id);

        if($request->hasFile('thumbnail'))
        {
            $thumbnail = $request->thumbnail;
            $thumbnailName = time().$thumbnail->getClientOriginalName();
            $thumbnail->move("public\images\posts",$thumbnailName);
            $RequestedPost->thumbnail = "public/images/posts/".$thumbnailName;
        }

        $RequestedPost->title = $request->title;
        $RequestedPost->description = $request->description;
        $RequestedPost->category_id = $request->category;

        $RequestedPost->save();

        $RequestedPost->tags()->sync($request->tags);

        Session::flash("success","Post updated succsessfully");

        return redirect()->route("Content.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $RequestedPost = Post::find($id);

        $RequestedPost->delete();

        Session::flash("success","Post deleted succsessfully");

        return redirect()->back();
    }

    public function deleted()
    {
        $DeletedPost = Post::onlyTrashed()->get();

        return view("auth\posts\deleted")->with("allContent",$DeletedPost);
    }

    public function kill($id)
    {
        $DeletedPost = Post::onlyTrashed()->where("id",$id)->first();

        $DeletedPost->forceDelete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $DeletedPost = Post::onlyTrashed()->where("id",$id)->first();

        $DeletedPost->restore();

        return redirect()->back();
    }


}
