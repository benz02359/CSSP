<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Spatie\Permission\Traits\HasRoles;


class HomeController extends Controller
{
    use HasRoles;
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
        
        //if(DB::table('users')->where('id','=',$value)->where('status','0')->value('id')){
        //if(DB::select("SELECT * FROM users WHERE status='1'")==true){
        //$id = auth()->user();
        $id = Auth::id();
        
        //$uid = DB::table('users')->where('id','=',$id)->get('status');
        //$uid = DB::select("SELECT status FROM users WHERE id='$id'");
        //$uid = DB::table('users')->where('id',$id)->value('status');
        //$uid = DB::select("SELECT status FROM users WHERE id=$id");
        $uid = DB::table('users')->where('id',$id)->value('status');


        if($uid==1){
        //if((DB::table('users')->where('id',$id)->value('status'))==1){
            auth()->user()->assignRole('admin');
            return view('css.home');
        }
        
        if($uid==2){
        //if((DB::table('users')->where('id',$id)->value('status'))==2){
            auth()->user()->assignRole('staff');
            return view('css.home');
        }
        
        if($uid==3){
        //if((DB::table('users')->where('id',$id)->value('status'))==3){
            auth()->user()->assignRole('agent');
            return view('css.home');
        }
        
        if($uid==4){
        //if((DB::table('users')->where('id',$id)->value('status'))==4){
        
            auth()->user()->assignRole('user');
            return view('css.home');
        }
        
        else{
            return view('css.home');
        }

        
    }
}
