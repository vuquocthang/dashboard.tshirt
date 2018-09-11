<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    //
	public function index(){
		$accounts = User::orderBy('id', 'DESC')->paginate(20);
		
		return view('admin.account.index', [
			'accounts' => $accounts
		]);
	}
	
	public function createForm(){
		return view('admin.account.create');
	}
	
	public function create(Request $req){
		$validator = Validator::make($req->all(), [
			'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed'
        ], [
			'email.unique' => 'Email đã tồn tại',
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
		
		$input = $req->all();
		
		$input['password'] = bcrypt($req->password);
		
		User::create($input);
		
		return redirect()
					->back()
					->with('status', 'Tạo tài khoản thành công !');
	}
	
	public function updateForm($id){
		$account = User::findOrFail($id);
		
		return view('admin.account.update')->with('account', $account);
	}
	
	public function update($id, Request $req){
		$account = User::findOrFail($id);
		
		$validator = Validator::make($req->all(), [
			'email' => [
				'required',
				Rule::unique('users')->ignore($id),
			],
            'password' => 'required|min:8|confirmed'
        ], [
			'email.unique' => 'Email đã tồn tại',
			'password.required' => 'Mật khẩu không được để trống',
			'password.min' => 'Mật khẩu dài ít nhất 8 ký tự',
			'password.confirmed' => 'Xác nhận mật khẩu không khớp'
		]);
		
		//$account->fill($req->all());
		
		$input = $req->all();
		$input['password'] = bcrypt($req->password);

        if ($validator->fails()) {
            return redirect()
						->back()
						->with('account', $account)
                        ->withErrors($validator);
        }
		
		$account->fill($input);
		$account->save();
		
		return redirect()
					->back()
					->with('status', 'Cập nhật tài khoản thành công !');
	}
	
	public function delete($id){
		
	}
}
