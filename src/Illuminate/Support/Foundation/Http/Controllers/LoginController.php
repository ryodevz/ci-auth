<?php

namespace Ryodevz\CiAuth\Illuminate\Support\Foundation\Http\Controllers;

use App\Models\User;
use CodeIgniter\Controller;
use Ryodevz\CiAuth\Illuminate\Support\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        var_dump(
            Auth::user()
        );
        return;

        if(Auth::attemp('ytryo789@gmail.com', '123')) {
            var_dump(
                Auth::user()
            );
        }
    }

    private function request()
    {
        return (object) $this->request->getVar();
    }
}
