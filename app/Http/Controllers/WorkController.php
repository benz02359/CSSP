<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use App\Staff;
use DB;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = post::orderBy('created_at','desc')->paginate(20);
        $user_id = auth()->user()->id;
        $staff = Staff::where('user_id','=',$user_id)->first();
        $posts = Post::where('staff_id','=',$staff->id)->get();
        //$staff = Staff::where('user_id','=',$user)->get();
        //$user = Staff::find($user_id);
        //return view('dashboard')->with('posts', $user->posts);

        $postall = post::all();

        $staffprofile = Staff::where('user_id', '=',Auth::user()->id )->first();
        if ($staffprofile === null) {
        // user doesn't exist
        $st = staff::create([
            'user_id'           =>      $user_id,    
            'name'              =>      auth()->user()->name,
            'email'              =>      auth()->user()->email,
            ]);
            $st->save();
        }
        
        
        return view('cssp.work.index',compact('staff',$staff,'posts',$posts,'postall',$postall))->with('staff',$staff,'posts',$posts);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
