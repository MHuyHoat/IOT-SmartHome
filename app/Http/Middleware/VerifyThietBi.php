<?php

namespace App\Http\Middleware;

use App\Models\ThietBi;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyThietBi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            //code...

            $jwt = $request->bearerToken();
            $decoded = JWT::decode($jwt ?? "", new Key(env('JWT_SECRET', null), 'HS256'));
            $decodedArr = (array) $decoded;
            
             $verify= ThietBi::where('id',$decodedArr['id'])->where('loai',$decodedArr['loai'])->first();
            if (!empty($verify)){
                $request['thietBi']=$verify;
                return $next($request);
            }
              
            else
                return response()->json(['error' => 'Unauthorized'], 401);
        } catch (\Throwable $th) {
            throw $th;
            abort(500);
        }
    }
}
