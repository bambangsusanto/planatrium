<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SuiteController extends Controller {

	public function index(Request $request)
    {
        $user = Auth::user();
        $user_id = $user['id'];

        $profile = User::find($user_id)->profile;
        $user = User::find($user_id);
        $project = User::find($user_id)->project;
        $favorite = $project->where('favorite', 1)->first();

        return view('suite', [
            'profile' => $profile,
            'user' => $user,
            'project' => $project,
            'favorite' => $favorite,
        ]);

	}

}

?>