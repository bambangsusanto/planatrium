<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\DesignFormRequest;
use App\RequestDesign;

class RequestController extends Controller {

	public function index() {
		$requests = RequestDesign::where('taken', 0)->get();
        return view('request.index', compact('requests'));
	}

	public function show(Request $request) {
		$slug = $request->view_id;
		$request = RequestDesign::whereSlug($slug)->firstOrFail();
        return view('request.show', [
        	'request' => $request,
        ]);
	}

	public function create() {
		return view('request.create');
	}

	public function store(DesignFormRequest $request) {
		$slug = uniqid();

		$designRequest = new RequestDesign([
			'slug' => $slug,
			'type' => $request->get('type'),
			'type_spec' => $request->get('type_spec'),
			'size_width' => $request->get('size_width'),
			'size_length' => $request->get('size_length'),
			'measurement' => $request->get('measurement'),
			'type_info' => $request->get('type_info'),
			'country' => $request->get('country'),
			'location_info' => $request->get('location_info'),
			'email' => $request->get('email'),
			'phone' => $request->get('phone'),
			'taken' => 0,
		]);

		$designRequest->save();

		return redirect('/request')->with('status', 'Your request has been stored! Waiting for designers to design your project.');

	}

	public function take(Request $request) {
		$slug = $request->request_id;

		$request = RequestDesign::whereSlug($slug)->firstOrFail();
		$request->taken = 1;
		$request->save();

		$user = Auth::user();
		$profile = User::find($user->id)->profile;

		Mail::send('emails.request', ['profile' => $profile, 'user' => $user], function($message) use ($request) {
			$message->from('bambang_susanto@hotmail.com', 'Plan Atrium');
			$message->to($request->email)->subject('Project Request Taken');
		});

		return redirect('/request_view')->with('info', "Immediately inform your potential client about how you will proceed with the project.");
	}

}

?>