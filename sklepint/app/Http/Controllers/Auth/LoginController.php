<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
      
            return redirect('/admin/dashboard');
        } else {
          
            return redirect('/home');
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
