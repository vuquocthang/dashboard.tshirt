<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use Validator;
use Illuminate\Validation\Rule;

class PayoutController extends Controller
{
    //
	public function index(){
		return view('user.payout.index');
	}
}
