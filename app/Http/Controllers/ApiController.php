<?php

namespace App\Http\Controllers;

use App\Services\ThietBiService;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $thietBiService;
    public function __construct(
        ThietBiService $thietBiService
    )
    {
        $this->thietBiService= $thietBiService;
    }
    //
    public function getToken(Request $request){
        try {
            
            $idThietBi= $request['idThietBi'];
            $thietBi= $this->thietBiService->find([
                'id'=>$idThietBi
            ]);
            $user = array(
                "id" => $thietBi->id,
                'ten' => $thietBi->ten,
                'loai'=>$thietBi->loai
                
            );
            $key = env('JWT_SECRET', 'XmPgNgxvbROM0z9WhCRXzbwoh3isyTcvpX95221BBT6Pi94t1ebqmqUmSegiJcOC');
            $alg = 'HS256';
            $token = JWT::encode($user, $key, $alg);
            // Trả về token dưới dạng JSON
            return response()->json([
                "status" => "success",
                "token"=>$token
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getAllThietBi(Request $request){
        try {
            //code...
     
            $data= $this->thietBiService->getData(['phuthuoc'=> $request['thietBi']->id??null]);
            return response()->json([
                "status" => "success",
                "data"=>$data
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status" => "failed",
                "error" => $th->getMessage()
            ], 500);
        }
    }
}
