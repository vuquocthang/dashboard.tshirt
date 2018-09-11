<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	protected $table = 'product';
	
	protected $fillable = [
		'price',
		'name',
		'description',
		'design_id',
		'base64_front',
		'base64_behind',
		'img_front',
		'img_back',
		'color_code',
		'user_id'
	];
	
	public function srcFront(){
		return "data:image/png;base64," . $this->base64_front;
	}
	
	public function srcBehind(){
		return "data:image/png;base64," . $this->base64_behind;
	}
	
	public function campaigns(){
		return $this->hasMany("App\ProductCampaign");
	}
	
	
	public function hasCampaign(){
		if( $this->campaigns()->count() == 0 ){
			return false;
		}
		
		$check = $this->campaigns()
					->orderBy('created_at', 'DESC')
					->where('expiry_at', '>', date('Y-m-d') )
					->first();
		
		if( $check ){
			return $check;
		}
		
		return false;
	}
	
	public function startToExpiryCampaign(){
		$check = $this->hasCampaign();
		
		if($check){
			return  fmDate($check->created_at, "Y-m-d H:i:s", "d/m/Y") . " - " . fmDate($check->expiry_at, "Y-m-d H:i:s", "d/m/Y");
		}
		
		return "";
	}
}
