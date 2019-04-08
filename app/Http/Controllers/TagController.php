<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allContent = Tag::all();
        return view('auth\tags\index')->with("allContent",$allContent);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth\tags\create');
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
            "tag"=>"required",
        ]);

        $tagInstance = new Tag;

        $tagInstance = Tag::create([
            "tag"=>$request->tag,
        ]);

        $tagInstance->save();

        Session::flash("success","Tag created");

        return redirect()->route("tag.index");

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
        $requestedTag = Tag::find($id);

        return view('auth\tags\edit')->with("requestedTag",$requestedTag);

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
            "tag"=>"required",
        ]);

        $requestedTag = Tag::find($id);

        $requestedTag->tag = $request->tag;

        $requestedTag->save();

        Session::flash("success","Tag updated");

        return redirect()->route("tag.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestedTag = Tag::find($id);

        $requestedTag->delete();

        Session::flash("success","Tag deleted");

        return redirect()->route("tag.index");
    }
}
