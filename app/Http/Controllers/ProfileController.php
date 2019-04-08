<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("auth\users\profile")->with("currentUser", Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'Username'=>"required",
            'email'=>"required|email",
            'link'=>"required|url",

        ]);

        $user = Auth::user();

        if($request->hasFile("avatar"))
        {
            $avatar = $request->avatar;
            $newAvatar = time().$avatar->getClientOriginalName();
            $avatar->move("public/images/posts",$newAvatar);

            $user->profile->avatar = "public/images/posts/".$newAvatar;

            $user->profile->save();
        }

        $user->name = $request->Username;

        $user->email = $request->email;

        $user->profile->link = $request->link;

        $user->profile->about = $request->about;

        $user->save();
        $user->profile->save(); 

        if($request->has("password"))
        {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->back();
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
    }
}
