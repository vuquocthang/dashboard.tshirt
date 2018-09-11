<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;

class OrderController extends Controller
{
    //
	public function index(){
		$orders = Order::orderBy('id', 'DESC')
					->paginate(20);
		
		return view('admin.order.index', [
			'orders' => $orders
		]);
	}
	
	public function detail($id){
		$order = Order::findOrFail($id);
		
		return view('admin.order.detail', [
			'order' => $order
		]);
	}
	
	public function status($id, $code, Request $req){
		$order = Order::findOrFail($id);
		
		if($order->currentStatusCode() == $code - 1){
			OrderStatus::create([
				'user_id' => $req->user()->id,
				'order_id' => $id,
				'value' => $code
			]);
			
			return redirect()->back();
		}
					
		return redirect()->back();			
	}
}
