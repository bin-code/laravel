<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function __construct()
    {
//        $this->middleware('token');
        $this->middleware('token')->only('show');
        $this->middleware(function($request,$next){
            if (!is_numeric($request->input('id'))){
                throw new NotFoundHttpException();
            }
            return $next($request);
        })->only('show');
    }

    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function test()
    {
        echo 'test';
    }

    public function token()
    {
        echo 'token';
    }
}
