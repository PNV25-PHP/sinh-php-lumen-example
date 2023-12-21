<?php


namespace App\Http\Controllers;

use App\Models\Model_User;
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

        $email = $req->input('email');
        $password = $req->input('password');

        $inputData = $req->all();

        $dbCallback = 'db';

        $userModel = new Model_User($dbCallback);

        $user = $userModel->checkCredentials($email, $password);

        return response()->json(['user' => $user, 'requestData' => $inputData]);
    }
}
