<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class LoginController extends Controller
{
    public function Index(): View
    {
        $x = 10;
        return view('LoginPage', ["x" => $x]);
    }

    public function Login(Request $req)
    {
        return [
            "email" => $req->input("email"),
            "password" => $req->input("password"),
            "isSuccess" => true
        ];
    }
}
