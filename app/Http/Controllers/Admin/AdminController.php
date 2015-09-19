<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Hash;
use Response;

class AdminController extends Controller
{
    
    protected function success($message='',$jumpUrl='',$ajax=false) {
        return $this->dispatchJump($message,1,$jumpUrl,$ajax);
    }


    protected function error($message='',$jumpUrl='',$ajax=false) {
        return $this->dispatchJump($message,0,$jumpUrl,$ajax);
    }

    protected function dispatchJump($message,$status=1,$jumpUrl='',$ajax=false)
    {
        $data           =   [];
        $data['info']   =   $message;
        $data['status'] =   $status;
        $data['url']    =   $jumpUrl;
        if(true === $ajax || request()->ajax()) {// AJAX提交
           return response()->json($data);
        }
        return redirect(jumpUrl)->with($data);
    }

}
