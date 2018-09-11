<?php

namespace App\Http\Controllers\Workshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;

class OrderController extends Controller
{
    //
	public function index(Request $req){
		$user = $req->user();
		
		//da thanh toan
		$paiedOrders = Order::whereDoesntHave('status', function($query){
						$query->whereIn('value', [2, 3, 4, 5]);
					})->whereHas('status', function($query){
						$query->where('value', 1);
					})
					->orderBy('id', 'DESC')
					->paginate(20);
		
					
		//da in ao			
		$proceedOrders = Order::whereDoesntHave('status', function($query){
						$query->whereIn('value', [ 2, 4, 5]);
					})->whereHas('status', function($query) use ($user){
						$query->where('value', 3)
						->where('user_id', $user->id);
					})
					->orderBy('id', 'DESC')
					->paginate(20);			
		
		return view('workshop.order.index', [
			'paiedOrders' => $paiedOrders,
			'proceedOrders' => $proceedOrders
		]);
	}
	
	public function detail($id){
		$order = Order::findOrFail($id);
		
		return view('workshop.order.detail', [
			'order' => $order
		]);
	}
	
	public function status($id, $code, Request $req){
		$order = Order::findOrFail($id);
		
		if($order->currentStatusCode() == $code - 1 || ( $code == 3 && $order->currentStatusCode() == 1 ) ){
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
