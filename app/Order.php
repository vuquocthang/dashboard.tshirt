<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderStatus;

class Order extends Model
{
	protected $table = 'order';
	
	protected $fillable = [
		'id_hash',
		'user_id',
		'seller_id',
		
		'cus_email',
		'cus_name',
		'cus_phone',
		'cus_payment_method',
		'cus_note',
		'cus_address'
	];

    protected $appends = ['total'];
	
	public function details(){
		return $this->hasMany('App\OrderDetail');
	}
	
	public function status(){
		return $this->hasMany('App\OrderStatus');
	}
	
	public function currentStatus(){
		if( !$this->status()->first() ){
			return $this->status2String(0);
		}
		
		return $this->status2String( $this->status()->orderBy('created_at', 'DESC')->first()->value );
	}
	
	public function currentStatusCode(){
		if( !$this->status()->first() ){
			return 0;
		}
		
		return $this->status()->orderBy('created_at', 'DESC')->first()->value;
	}
	
	public function status2String($statusCode){
		switch($statusCode){
			case 0 : return "Chưa Thanh Toán";
			case 1 : return "Đã Thanh Toán";
			case 2 : return "Hủy Đơn Hàng";
			case 3 : return "Đã In Áo";
			case 4 : return "Đã Chuyển Hàng";
			case 5 : return "Đã Hoàn Thành";
			default : return "Chưa Thanh Toán";
		}
	}

	public function switchStatus($status){
	    $currentStatusCode = $this->currentStatusCode();

	    if ($status < $currentStatusCode){
	        return;
        }

        if ($status === $currentStatusCode + 1){
            OrderStatus::create([
                'order_id' => $this->id,
                'value' => $status
            ]);
        }

        return;
    }

    public function total(){
	    return $this->getTotalAttribute();
    }

    public function getTotalAttribute(){
        $total = 0;

        foreach( $this->details()->get() as $item ){
            $campaign = \App\ProductCampaign::find($item->campaign_id);

            if($campaign){
                $total += $campaign->price * $item->product_quantity;
            }else{
                $product = \App\Product::find($item->product_id);

                if($product){
                    $total += $product->price * $item->product_quantity;
                }
            }
        }
        return $total;
    }
}
