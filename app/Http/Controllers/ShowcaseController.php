<?php

namespace App\Http\Controllers;

use App\Project;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShowcaseController extends Controller
{
    public function index() {
        return view('showcase');
    }

    public function store(Request $request) {

        $user = Auth::user();
        $user_id = $user['id'];
        $directory = "images/" . $user["username"] . "/";

        if ($request->image) {
            $file = $request->image;
            $file->move($directory, $file->getClientOriginalName());
        }

        $project = new Project;

        $project->type = $request->type;
        $project->title = $request->title;
        $project->user_id = $user_id;
        if ($request->image) {
            $project->image = $directory . $file->getClientOriginalName();
        }
        $project->size_width = $request->size_width;
        $project->size_length = $request->size_length;
        $project->measurement = $request->measurement;
        $project->location = $request->location;
        $project->status = $request->status;
        $project->story = $request->story;

        $project->save();


        return redirect()->route('showroom')->with('info', 'Your project has been showcased!');
    }
}

?>