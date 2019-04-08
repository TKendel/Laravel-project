<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
    	return view("welcome")
    	->with("settings",Settings::first())
    	->with("categories",Category::take(4)->get())
    	->with("latest_post",Post::orderBy("created_at","desc")->first())
    	->with("second_post",Post::orderBy("created_at","desc")->skip(1)->take(1)->get()->first())
    	->with("third_post",Post::orderBy("created_at","desc")->skip(2)->take(1)->get()->first())
    	->with("New_category", Category::find(7))
    	->with("Programing_category", Category::find(8));
    }


    public function single($slug)
    {
        $requested_Post = Post::where("slug",$slug)->first();//kad stisnemo ne neki post uzmemo saljemo sa njime njeogv slug kojeg spremamo u ovaj $slug sa kojim zatim trazimo po Post bazi gdje je u tablici "slug"== $slugu

        $nextPostID = Post::where("id",">", $requested_Post->id)->min("id");
        $previousPostID = Post::where("id","<", $requested_Post->id)->max("id");

        return view("single")
        ->with("settings",Settings::first())
        ->with("categories",Category::take(4)->get())
        ->with("Post",$requested_Post)
        ->with("next", Post::find($nextPostID))
        ->with("previous", Post::find($previousPostID));
    }
     
}

