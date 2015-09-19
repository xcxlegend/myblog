<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');

$router->group(['namespace' => 'Admin'], function($router)
{
	Route::get('/admin/public/login',['as' => 'admin.login', 'uses' => 'PublicController@login']);

	Route::post('/admin/public/doLogin', ['as' => 'admin.doLogin', 'uses' =>'PublicController@doLogin']);
});


// Route::get('/mail', function(){
// 	$data = ['code'=> rand(100000, 999999)];
// 	\Mail::queue('mails.validate_code', $data, function($message){
// 		$message->to('xcx_legender@qq.com')->subject('测试邮件');
// 	});
// 	return '发送成功';
// });
