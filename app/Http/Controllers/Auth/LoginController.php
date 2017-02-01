<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        showLoginForm as showLoginForm;
    }

    protected $redirectTo = '/admin';

    public function showLoginForm() {
        return view('admin.auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
