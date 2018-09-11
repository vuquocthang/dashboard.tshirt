<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\ProductCampaign;
use Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    //
	public function index(Request $req){
		$products = $req->user()
					->products()
					->orderBy('id', 'DESC')
					->paginate(20);
		
		return view('user.product.index', [
			'products' => $products
		]);
	}
	
	public function campaigns(Request $req){
		$campaigns = $req->user()->campaigns()
						->orderBy('id', 'DESC')
						->paginate(20);
		
		return view('user.product.campaigns', [
			'campaigns' => $campaigns
		]);
	}
	
	public function createCampaign(Request $req){
		$campaign = ProductCampaign::create($req->all());
		
		$campaign->expiry_at = \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $campaign->created_at)
									->addDays(7);
		$campaign->save();							
		
		return redirect()
			->back()
			->with('status', 'Tạo campaign thành công !');
	}
	
	public function deleteCampaign($id){
		ProductCampaign::destroy($id);
		
		return redirect()
			->route('user.campaign.index')
			->with('status', 'Xóa campaign thành công !');
	}

}
