<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;

class OrderController extends Controller
{
    //
	public function index(Request $req){
		$orders = $req->user()->orders()->orderBy('id', 'DESC')
					->paginate(20);
		
		return view('user.order.index', [
			'orders' => $orders
		]);
	}
	
	public function detail($id, Request $req){
		$order = $req->user()->orders()->findOrFail($id);
		
		return view('user.order.detail', [
			'order' => $order
		]);
	}
}
