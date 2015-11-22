<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile;
use App\Http\Requests;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $profile = new Profile;
        $phone = "+" . $request->phone;
        $id = Auth::user()->id;

        $profile->user_id = $id;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->job = $request->job;
        $profile->phone = $phone;
        $profile->location = $request->location;
        $profile->motto = $request->motto;
        $profile->about = $request->about;

        $profile->save();

        return redirect()->route('suite')->with('info', 'You have completed your profile!');
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
    public function edit(Request $request)
    {
        $profile = Profile::where('id', $request->id)->firstOrFail();

        return view('profile.profile_edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfileRequest $request)
    {
        $user = Auth::user();
        $directory = "images/" . $user["username"] . "/";

        if ($request->image) {
            $file = $request->image;
            $file->move($directory, $file->getClientOriginalName());
        }

        $profile = Profile::where('id', $request->id)->firstOrFail();
        $phone = "+" . $request->phone;

        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->job = $request->job;
        $profile->phone = $phone;
        if ($request->image) {
            $profile->image = $directory . $file->getClientOriginalName();
        }
        $profile->location = $request->location;
        $profile->motto = $request->motto;
        $profile->about = $request->about;

        $profile->save();

        return redirect('suite')->with('info', 'You have successfully updated your profile!');
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
