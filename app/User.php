<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\OrderDetail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
		'email', 
		'password', 
		'role',
		'balance',
		
		'phone',
		'bank_name',
		'bank_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function products(){
		return $this->hasMany('App\Product');
	}
	
	public function campaigns(){
		return $this->hasManyThrough('App\ProductCampaign', 'App\Product');
	}
	
	public function orders(){
		return $this->hasMany(
			'App\Order',
			'user_id'
		);
	}
	
	public function orderDetails(){
		return $this->hasManyThrough('App\OrderDetail', 'App\Product');
	}
	
	// ============================ DESIGN PROFIT ========================== //
	public function designProfit(){
		return $this->campaigns()
			->join('order_detail', 'product_campaign.id', 'order_detail.campaign_id')
			->join('order', 'order_detail.order_id', 'order.id')
			->join('order_status', 'order.id', 'order_status.order_id')
			->where('order_status.value', 4)
			->sum('product_quantity') * 25000;
	}
	
	public function designProfitByDate($date){
		return $this->campaigns()
			->join('order_detail', 'product_campaign.id', 'order_detail.campaign_id')
			->join('order', 'order_detail.order_id', 'order.id')
			->join('order_status', 'order.id', 'order_status.order_id')
			->where('order_status.value', 4)
			->whereDate('order_detail.created_at', $date)
			->sum('product_quantity') * 25000;
	}
	
	public function designProfitFromDate($from){
		return $this->campaigns()
			->join('order_detail', 'product_campaign.id', 'order_detail.campaign_id')
			->join('order', 'order_detail.order_id', 'order.id')
			->join('order_status', 'order.id', 'order_status.order_id')
			->where('order_status.value', 4)
			->whereDate('order_detail.created_at', '>=', $from)
			->sum('product_quantity') * 25000;
	}
	
	
	// ============================ SELL PROFIT ========================== //
	public function sellProfit(){
		$campaigns = $this->campaigns()->get();
		
		$profit = 0;
		
		foreach($campaigns as $campaign){
			$profit += $campaign->sellProfit($this->id);
		}
		
		return $profit;
	}
	
	public function sellProfitByDate($date){
		$campaigns = $this->campaigns()->get();
		
		$profit = 0;
		
		foreach($campaigns as $campaign){
			$profit += $campaign->sellProfitByDate($this->id, $date);
		}
		
		return $profit;
	}
	
	public function sellProfitFromDate($from){
		$campaigns = $this->campaigns()->get();
		
		$profit = 0;
		
		foreach($campaigns as $campaign){
			$profit += $campaign->sellProfitByFromDate($this->id, $from);
		}
		
		return $profit;
	}
	
}
