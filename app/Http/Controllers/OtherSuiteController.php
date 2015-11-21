<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class OtherSuiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user_id;
        $profile = User::find($user_id)->profile;
        $user = $profile->user;
        $project = User::find($user_id)->project;
        $favorite = $project->where('favorite', 1)->first();

        return view('others_suite', [
            'profile' => $profile,
            'user' => $user,
            'project' => $project,
            'favorite' => $favorite,
        ]);
    }
}
