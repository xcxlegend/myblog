<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;
use Validator;

class PublicController extends AdminController
{
     
    public function login()
    {
        return View::make('admin.public.login');
    }


    public function doLogin(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'username' => 'required|trim',
            'password' => 'required',
        ],
        [
            'username.required' => '用户名必须',
            'password.required' => '密码必须',
        ]);
        if ($valid->fails())
        {
            return $this->error($valid->errors()->first());
        }

        

    }

}
