<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
       public function index()
    {
        
        if(Auth::user()->role_id == 1){
            $Things = DB::table('things')->get(); 
        }else{
            $Things = DB::table('things')->where('master', Auth::user()->id)->get(); 
        } 

        return view('things.index',['things' => $Things]);
    }
}
