<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->project_id;
        $project = Project::where('id', $id)->first();
        $profile = User::find($project['user_id'])->profile;
        $user = Auth::user();

        return view('project', [
            'project' => $project,
            'profile' => $profile,
            'user' => $user,
        ]);
    }

    public function upload(Request $request)
    {
        if ($request->image) {
            $user = Auth::user();
            $user_id = $user['id'];
            $directory = "images/" . $user['username'] . "/";


            $file = $request->image;
            $file->move($directory, $file->getClientOriginalName());

            $project = Project::where('id', $request->project_id)->firstOrFail();

            $project->image = $project->image = $directory . $file->getClientOriginalName();

            $project->save();

            return redirect()->back()->with('info', 'Your image has been updated!');
        } else {
            return redirect()->back()->with('info', "Fail to upload image.");
        }

    }

    public function favorite(Request $request)
    {
        $project = Project::all();
        for ($i=0; $i<count($project); $i++) {
            $project[$i]->favorite = 0;
            $project[$i]->save();
        }

        $project = Project::where('id', $request->project_id)->firstOrFail();
        $project->favorite = 1;
        $project->save();

        return redirect()->back()->with('info', "This project has been favorited!");
    }
}
