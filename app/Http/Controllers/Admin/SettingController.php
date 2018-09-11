<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class SettingController extends Controller
{
    //
	public function index(){
		return view('admin.setting.index');
	}
	
	public function update(Request $req){
		
		//change information
		if(!$req->change_password){
			$req->user()->fill($req->all())->save();
			
			return redirect()
						->back()
						->with('status', 'Thay đổi thông tin thành công !');
		}
		
		//change password
		$validator = Validator::make($req->all(), [
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ], [
			'password.required' => 'Mật khẩu không được để trống',
			'password.min' => 'Mật khẩu dài ít nhất 8 ký tự',
			'password.confirmed' => 'Xác nhận mật khẩu không khớp'
		]);

        if ($validator->fails()) {
            return redirect()
						->back()
                        ->withErrors($validator)
                        ->withInput();
        }
		
		
		$req->user()->fill([
			'password' => bcrypt($req->password)
		])->save();
		
		return redirect()
					->back()
					->with('status', 'Thay đổi mật khẩu thành công !');
		
	}
}
