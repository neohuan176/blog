<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request){
        $post = $request->input();
        if (Auth::attempt(['email' => $post['email'], 'password' => $post['password']])) {
            $user = Auth::user();
            $data = [
                'status' => 200,
                'user' => [
                    'name' => $user['name']
                ],
                'msg' => '登录成功'
            ];
        } else {
            $data = [
                'status' => 403,
                'msg' => '用户名或者密码不正确',
            ];
        }
        return response()->json($data);
    }
    //返回用户登录信息
    public function check(){
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json(['user' => ['name'=>$user['name']],'status' => 200]);
        }
        return ['msg' => 'Unauthenticated'];
    }

    public function logout(){
        Auth::logout();
        $data = [
            'status' => 200,
            'msg' => '退出成功',
        ];
        return response()->json($data);
    }

    public function getAuthInfo(){
        return Auth::user();
    }
}
