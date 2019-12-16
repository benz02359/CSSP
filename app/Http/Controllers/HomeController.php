<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Userprofile;

class HomeController extends Controller
{
    use HasRoles;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        
        $this->middleware('admin',['except' => ['registeruser']]);
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*return Userprofile::create([
            'name' => auth()->user->name(),
            'username' => auth()->user->username(),
            'email' => auth()->user->email(),
            'company_id' => auth()->user->company(),
            ]); */
        
        //if(DB::table('users')->where('id','=',$value)->where('status','0')->value('id')){
        //if(DB::select("SELECT * FROM users WHERE status='1'")==true){
        //$id = auth()->user();
        $id = Auth::id();
        
        //$uid = DB::table('users')->where('id','=',$id)->get('status');
        //$uid = DB::select("SELECT status FROM users WHERE id='$id'");
        //$uid = DB::table('users')->where('id',$id)->value('status');
        //$uid = DB::select("SELECT status FROM users WHERE id=$id");
        $uid = DB::table('users')->where('id',$id)->value('role_id');


        if($uid==1){
        //if((DB::table('users')->where('id',$id)->value('status'))==1){
            auth()->user()->assignRole('admin');
            $role = Role::findById(1);
            $role->givePermissionTo('managestaff','managecustomer','managedepartment','managecompany','program','selling','appointment','post','forum','category','result','regisagent','hq','alluserlist');
            return view('cssp.home');
        }
        
        if($uid==2){
        //if((DB::table('users')->where('id',$id)->value('status'))==2){
            auth()->user()->assignRole('staff');
            $role = Role::findById(2);
            $role->givePermissionTo('work','post','forum');
            return view('cssp.home');
        }
        
        if($uid==3){
        //if((DB::table('users')->where('id',$id)->value('status'))==3){
            auth()->user()->assignRole('agent');
            $role = Role::findById(3);
            $role->givePermissionTo('post','forum','approve','userlist');
            return view('cssp.home');
        }
        
        if($uid==4){
        //if((DB::table('users')->where('id',$id)->value('status'))==4){        
            auth()->user()->assignRole('user');
            $role = Role::findById(4);
            $role->givePermissionTo('program','post','forum');
            
            return view('web.home');
        }
        
        else{
            
            return view('web.home');
        }

        
    }
    public function approval()
    {
        return view('web.approval');
    }
}
