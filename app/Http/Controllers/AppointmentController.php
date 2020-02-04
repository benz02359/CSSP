<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Staff;
use DB;
use Mail;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::orderBy('created_at','desc')->paginate(20);
        //$pst = post::find(all)->staff;
        //$posts = post::all();
        //$poststaff = post::find('');
        $staff = Staff::pluck('name', 'id');
        /*if(Auth::check()){
            //return view('cssp.appointment.index',compact('posts',$posts,'staff',$staff))->with('posts',$posts,'staff',$staff);
            return view('web.home');
        }
        else {
            return view('cssp.appointment.index',compact('posts',$posts,'staff',$staff))->with('posts',$posts,'staff',$staff);
            //return view('web.home');
        }*/
        
        return view('cssp.appointment.index',compact('posts',$posts,'staff',$staff))->with('posts',$posts,'staff',$staff);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $this->validate($request, [
            'staff' => 'required',
            
        ]);
        
        // Create Post
        $post = Post::find($id);
        $post->staff_id = $request->input('staff');       
        $post->save();

        $email = $post->staff['email'];

        $data = array('name'=>$post->staff['name'],"body"=>"มีงานรอให้จัดการ" );

        Mail::send('cssp.mail',$data,function($message) use ($email){
        $message->to($email,'To Staff')->subject('New Appointment');
        $message->from('CSS@css.com','Customer Support Service');            
        });  
        return redirect('/appointment')->with('success',"มอบหมายงานให้ {$post->staff['name']} เรียบร้อย");
        return view('web.appointment.index');
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
