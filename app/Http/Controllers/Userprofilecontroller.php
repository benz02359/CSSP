<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Staff;
use App\Userprofile;
use Session;

class UserprofileController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $userprofile = Userprofile::where('user_id', '=',Auth::user()->id )->first();
        if ($userprofile === null) {
        // user doesn't exist
        if(Auth::user()->role_id == 1){
        $userp = Userprofile::create([
            'user_id'           =>      $user->id,            
            ]);
            $userp->save();
        }
        elseif (Auth::user()->role_id == 2){
            $staff = Staff::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,            
            ]);
            $staff->save();
        }
        elseif (Auth::user()->role_id == 3){
            $agent = Agent::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,       
                ]);
            $agent->save();
        }
        elseif (Auth::user()->role_id == 4){
            $userp = Userprofile::create([
                'user_id'           =>      $user->id,            
                ]);
                $userp->save();
        }
        }
        $user_id = Userprofile::where('user_id','=',Auth()->user()->id )->first();
        
        return view('web.profile.index',compact('user',$user,'user_id',$user_id))->with('user',$user,'user_id',$user_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = Auth::find($id);
        //return view('web.userprofile.edit')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        return view('web.profile.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');  
        $user->email = $request->input('email');  
        $user->save();

        $user_id = Userprofile::where('user_id','=',$id )->first();
        $userprofile = Userprofile::find($user_id)->first();
        //$userprofile = Userprofile::findOrFail($user_id);
        
        //$this->validate($request, ['name' => 'required|max:255']);
        
        
        
        $userprofile->tel = $request->input('tel');  
        //$tel = $request->input('tel');  
        //$userprofile->update(['tel' => $tel]);
        $userprofile->save();
        //$user_id->save();
        Session::flash('success', 'บันทึกการเปลี่ยนแปลง');
        return redirect('/userprofile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
