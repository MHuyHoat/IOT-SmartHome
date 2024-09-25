<?php

namespace App\Http\Controllers;

use App\Services\AuthService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService=$authService;
    }
    public function login()
    {
        //
        try {
            //code...
            if(Auth::guard('admins')->check()){
                return redirect()->route('admin.dashboard');
            }
            return view('pages.login');
        } catch (\Throwable $th) {
            //throw $th;
            abort(500);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function verify(Request $request)
    {
        //
        try {
            //code...
            $params= $request->all();
            $auth= $this->authService->login($params,'admins');
          
            if (!$auth) {
                Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng !');
                return redirect()->back()->withInput();
            }
            return redirect()->route("admin.dashboard");

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function logout(Request $request){
        try {
            Auth::guard('admins')->logout();
            return redirect()->route('auth.login');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

   
}
