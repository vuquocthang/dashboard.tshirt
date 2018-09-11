<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;

Auth::routes();

Route::namespace('Auth')->group(function(){
	Route::post('login', 'LoginController@myLogin');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/404', function(){
	return view('404');
})->name('404');

Route::middleware('auth')->group(function(){
	
	//Admin role
	Route::middleware('role:Admin')
		->namespace('Admin')
		->prefix('admin')
		->name('admin.')
		->group(function(){
			
			//account
			Route::prefix('account')
				->name('account.')
				->group(function(){
					Route::get('/', 'AccountController@index')->name('index');
					
					Route::get('/create', 'AccountController@createForm')->name('create');
					Route::post('/create', 'AccountController@create')->name('create');
					
					Route::get('/update/{id}', 'AccountController@updateForm')->name('update');
					Route::post('/update/{id}', 'AccountController@update')->name('update');
					
					Route::get('/delete/{id}', 'AccountController@delete')->name('delete');
				});
			
			//order
			Route::prefix('order')
				->name('order.')
				->group(function(){
					Route::get('/', 'OrderController@index')->name('index');
					
					Route::get('/detail/{id}', 'OrderController@detail')->name('detail');
					
					Route::get('/status/{id}/{code}', 'OrderController@status')->name('status');
				});
		
			//setting
			Route::prefix('setting')
				->name('setting.')
				->group(function(){
					Route::get('/', 'SettingController@index')->name('index');
					
					Route::post('/update', 'SettingController@update')->name('update');
				});
	});
	
	//Workshop role
	Route::middleware('role:Workshop')
		->namespace('Workshop')
		->prefix('workshop')
		->name('workshop.')
		->group(function(){
			
			//order
			Route::prefix('order')
				->name('order.')
				->group(function(){
					Route::get('/', 'OrderController@index')->name('index');
					
					Route::get('/detail/{id}', 'OrderController@detail')->name('detail');
					
					Route::get('/status/{id}/{code}', 'OrderController@status')->name('status');
				});
	});
	
	//BusinessStaff role
	Route::middleware('role:BusinessStaff')
		->namespace('BusinessStaff')
		->prefix('business-staff')
		->name('business-staff.')
		->group(function(){
		
	});
	
	//Partner role
	Route::middleware('role:Partner')
		->namespace('Partner')
		->prefix('partner')
		->name('partner.')
		->group(function(){
			//order	
			Route::prefix('order')
				->name('order.')
				->group(function(){
					Route::post('/find', 'PayController@find')->name('find');
					
					Route::get('/process/{id}', 'PayController@process')->name('process');
				});
		
	});
	
	//User role
	Route::middleware('role:User')
		->namespace('User')
		->prefix('user')
		->name('user.')
		->group(function(){
			//product
			Route::prefix('product')
				->name('product.')
				->group(function(){
					Route::get('/', 'ProductController@index')->name('index');
					
					Route::get('/foo', function(Request $req){
						$p = \App\ProductCampaign::find(6);
						dd($p->orderDetailsOfSeller(1)->get());
					});
				});
			//campaign	
			Route::prefix('campaign')
				->name('campaign.')
				->group(function(){
					Route::get('/', 'ProductController@campaigns')->name('index');
					
					Route::post('/create', 'ProductController@createCampaign')->name('create');
					
					Route::get('/detete/{id}', 'ProductController@deleteCampaign')->name('delete');
				});
				
			//order	
			Route::prefix('order')
				->name('order.')
				->group(function(){
					Route::get('/', 'OrderController@index')->name('index');
					
					Route::get('/detail/{id}', 'OrderController@detail')->name('detail');
				});
				
			//payout
			Route::prefix('payout')
				->name('payout.')
				->group(function(){
					Route::get('/', 'PayoutController@index')->name('index');
					
				});	
		
			//setting
			Route::prefix('setting')
				->name('setting.')
				->group(function(){
					Route::get('/', 'SettingController@index')->name('index');
					
					Route::post('/update', 'SettingController@update')->name('update');
				});
	});
	
});
