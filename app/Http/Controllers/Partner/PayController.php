<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;

class PayController extends Controller
{
    //
	public function find(Request $req){
		//chua thanh toan
		$orders = Order::doesntHave('status')
					->where('id' , 'LIKE', '%' . $req->order_id . '%')
					->orderBy('id', 'DESC')
					->paginate(20);
		
		return redirect()->back()
			->with('orders', $orders)
			->withInput($req->all());
	}
	
	public function process($id, Request $req){
		$order = \App\Order::find($id);
		
		$total = $order->details()->join('product', 'order_detail.product_id', 'product.id')->selectRaw("SUM(product_quantity * product.price ) as total")->get()[0]->total;
		
		if( $req->user()->balance < $total ){
			return redirect()
				->back()
				->with('error', 'Số dư không đủ để thanh toán đơn hàng này !');
		}
		
		$req->user()->balance = $req->user()->balance - $total;
		$req->user()->save();
		
		\App\OrderStatus::create([
			'user_id' => $req->user()->id,
			'value' => 1,
			'order_id' => $id
		]);
		
		return redirect()
				->back()
				->with('status', 'Thanh toán đơn hàng thành công !');
	}
	
}
