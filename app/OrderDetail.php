<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
	protected $table = 'order_detail';
	
	protected $fillable = [
		'order_id',
		'seller_id',
		'product_id',
		'campaign_id',
		'product_size',
		'product_color',
		'product_quantity'
	];
	
	public function order(){
		return $this->belongsTo('App\Order');
	}
	
	public function product(){
		return $this->belongsTo('App\Product');
	}
	
	public function campaign(){
		return $this->belongsTo('App\ProductCampaign');
	}
}
