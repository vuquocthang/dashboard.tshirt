<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
		if( $req->get('action') === 'kiem-tien'){
			$url = config('services.design_url') . '/design-success';
			
			return redirect( $url );
		}
		
        return view('home');
    }
}
