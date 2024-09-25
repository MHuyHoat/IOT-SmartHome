<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class AuthService
{


    public function login($params, $type)
    {
        $guard = 'admins';
       
        $remember = isset($params['remember']);
        
        $login = Auth::guard($guard)->attempt(
            [
                'user_name' => $params['userName'],
                'password' => $params['password'],
                // 'reference_type' => $type,
            ],
            $remember
        );
        
        return $login;
    }
}
