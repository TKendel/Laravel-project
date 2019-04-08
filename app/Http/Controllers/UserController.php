<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allUsers = User::all();

        return view("auth\users\index")->with("allUsers",$allUsers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("auth\users\create");
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
            'Username'=>"required",
            'email'=>"required|email",
        ]);

        $newUser = User::create([
            'name'=>$request->Username,
            'email'=>$request->email,
            'password'=>bcrypt("password"),
        ]);

        $newProfile = Profile::create([
            'user_id'=>$newUser->id,
            'avatar'=>"public/images/posts/1.png",
        ]);

        return redirect()->route("User.index");

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->profile()->delete();
        $user->delete(); 

        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        return redirect()->back();
    }

    public function remove($id)
    {
        $user = User::find($id);

        $user->admin = 0;

        $user->save();

        return redirect()->back();
    }
}
