<?php  

namespace App\Http\Controllers;

use Auth;

class AccountController extends Controller {

	public function setting() {
		return view('auth.setting');
	}

}

?>