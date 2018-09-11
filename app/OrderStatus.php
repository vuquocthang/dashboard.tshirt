<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    //
	protected $table = 'order_status';
	
	protected $fillable = [
		'user_id',
		'order_id',
		'value'
	];
	
	public function order(){
		return $this->belongsTo('App\Order');
	}
}
