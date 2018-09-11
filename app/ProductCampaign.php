<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCampaign extends Model
{
    //
	protected $table = 'product_campaign';
	
	protected $fillable = [
		'product_id',
		'campaign_id',
		'price',
		'start_at',
		'expiry_at'
	];
	
	public function product(){
		return $this->belongsTo('App\Product');
	}
	
	public function orderDetails(){
		return $this->hasMany('App\OrderDetail', 'campaign_id');
	}
	
	public function orderDetailsOfSeller($sellerId){
		return $this->orderDetails()
				->where('seller_id', $sellerId);
	}
	
	
	public function designProfit(){
		return $this
			->orderDetails()
			->join('order', 'order_detail.order_id', 'order.id')
			->join('order_status', 'order.id', 'order_status.order_id')
			->where('order_status.value', 4)
			->sum('product_quantity') * 25000;
	}
	
	public function sellProfit($sellerId){
		$numberOfProducts = $this->numberOfProductsSelledBy($sellerId);
		
		$profitUnit = $this->price - 195000;
		
		if( $numberOfProducts >=50 ){
			$profitUnit = $this->price - 185000;
		}
		if( $numberOfProducts >=200 ){
			$profitUnit = $this->price - 175000;
		}
		
		
		return  $numberOfProducts * $profitUnit;
	}
	
	public function sellProfitByDate($sellerId, $date){
		$numberOfProducts = $this->numberOfProductsSelledByDate($sellerId, $date);
		
		$profitUnit = $this->price - 195000;
		
		if( $numberOfProducts >=50 ){
			$profitUnit = $this->price - 185000;
		}
		if( $numberOfProducts >=200 ){
			$profitUnit = $this->price - 175000;
		}
		
		
		return  $numberOfProducts * $profitUnit;
	}
	
	public function sellProfitByFromDate($sellerId, $date){
		$numberOfProducts = $this->numberOfProductsSelledByFromDate($sellerId, $date);
		
		$profitUnit = $this->price - 195000;
		
		if( $numberOfProducts >=50 ){
			$profitUnit = $this->price - 185000;
		}
		if( $numberOfProducts >=200 ){
			$profitUnit = $this->price - 175000;
		}
		
		
		return  $numberOfProducts * $profitUnit;
	}
	
	public function numberOfProductsSelled(){
		return $this
			->orderDetails()
			->join('order', 'order_detail.order_id', 'order.id')
			->join('order_status', 'order.id', 'order_status.order_id')
			->where('order_status.value', 4)
			->sum('product_quantity');
	}
	
	public function numberOfProductsSelledBy($sellerId){
		return $this
			->orderDetails()
			->join('order', 'order_detail.order_id', 'order.id')
			->join('order_status', 'order.id', 'order_status.order_id')
			->where('order_status.value', 4)
			->where('order_detail.seller_id', $sellerId)
			->sum('product_quantity');
	}
	
	public function numberOfProductsSelledByDate($sellerId, $date){
		return $this
			->orderDetails()
			->join('order', 'order_detail.order_id', 'order.id')
			->join('order_status', 'order.id', 'order_status.order_id')
			->where('order_status.value', 4)
			->where('order_detail.seller_id', $sellerId)
			->whereDate('order_detail.created_at', $date)
			->sum('product_quantity');
	}
	
	public function numberOfProductsSelledByFromDate($sellerId, $date){
		return $this
			->orderDetails()
			->join('order', 'order_detail.order_id', 'order.id')
			->join('order_status', 'order.id', 'order_status.order_id')
			->where('order_status.value', 4)
			->where('order_detail.seller_id', $sellerId)
			->whereDate('order_detail.created_at', '>=', $date)
			->sum('product_quantity');
	}
	
}
