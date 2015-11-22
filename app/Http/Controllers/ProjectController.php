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
        /*Method for displaying each project*/

        $id = $request->project_id;
        $project = Project::where('id', $id)->first();
        $profile = User::find($project['user_id'])->profile;
        $user = Auth::user();

        return view('project.project', [
            'project' => $project,
            'profile' => $profile,
            'user' => $user,
        ]);
    }

    public function upload(Request $request)
    {
        /*Method for updating project image*/
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
        /*Method for updating the favorite status of project of a particular user*/
        $user = Auth::user();
        $project = Project::where('user_id', $user->id)->get();
        for ($i=0; $i<count($project); $i++) {
                $project[$i]->favorite = 0;
                $project[$i]->save();
        }

        $project = Project::where('id', $request->project_id)->firstOrFail();
        $project->favorite = 1;
        $project->save();

        return redirect()->back()->with('info', "This project has been favorited!");
    }

    public function viewEdit(Request $request) {
        return view('project.edit');
    }

    public function update(Request $request) {
        $project = Project::where('id', $request->project_id)->firstOrFail();
        $user = Auth::user();
        $user_id = $user['id'];

        if ($request->image) {
            $directory = "images/" . $user['username'] . "/";

            $file = $request->image;
            $file->move($directory, $file->getClientOriginalName());

            $project->image = $project->image = $directory . $file->getClientOriginalName();
            $project->save();
        }

        if ($request->status) {
            $project->status = $request->status;
            $project->save();
        }

        if ($request->story) {
            $project->story = $request->story;
            $project->save();
        }

        return redirect('/project/?project_id=' . $project['id'])->with('info', 'This project has been updated!');
    }
}
