<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct() {}
    public function index(Request $request) {
        try {
            return view('pages.dashboard');
        } catch (\Throwable $th) {
            //throw $th;
            abort(500);
        }
    }
}
